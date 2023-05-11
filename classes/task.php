<?php
class Task {
  private $db;

  public function __construct($db) {
    $this->db = $db;
  }

  public function get_tasks_by_employee($employee_id) {
    $stmt = $this->db->prepare('CALL Procedure_GetTasksByEmployeeId (:employee_id);');
    $stmt->bindParam(':employee_id', $employee_id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function add_task_to_employee($employee_id, $dep_head_id, $description, $deadline) {
    $stmt = $this->db->prepare('CALL Procedure_InsertTask(:assigned_emp_id, :created_by_emp_id, :description, :due_date)');
    $stmt->bindParam(':assigned_emp_id', $employee_id);
    $stmt->bindParam(':created_by_emp_id', $dep_head_id);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':due_date', $deadline);
    $stmt->execute();
    return $this->db->lastInsertId();
  }


  public function update_task_status($task_id, $status) {
    $stmt = $this->db->prepare('CALL Procedure_UpdateTaskByTaskId(:TaskId, :Status)');
    $stmt->bindParam(':TaskId', $task_id);
    $stmt->bindParam(':Status', $status);
    $stmt->execute();
    return $stmt->rowCount();
  }

  public function get_tasks_by_department_head($dh_id){
    $stmt = $this->db->prepare('CALL Procedure_GetTasksByDepHeadId (:dh_id);');
    $stmt->bindParam(':dh_id', $dh_id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function get_task_by_task_id($task_id){
    $stmt = $this->db->prepare('CALL Procedure_GetTaskByTaskId (:dh_id);');
    $stmt->bindParam(':dh_id', $task_id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}

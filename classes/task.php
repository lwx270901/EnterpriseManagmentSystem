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

  public function assign_task($description, $deadline, $employee_id) {
    $stmt = $this->db->prepare('INSERT INTO tasks (description, deadline, employee_id) VALUES (:description, :deadline, :employee_id)');
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':deadline', $deadline);
    $stmt->bindParam(':employee_id', $employee_id);
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
}

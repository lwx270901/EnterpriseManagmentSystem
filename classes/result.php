<?php
// class for managing task results
class Result {
  private $db;

  public function __construct($db) {
    $this->db = $db;
  }

  public function get_results_by_task($task_id) {
    $stmt = $this->db->prepare('SELECT * FROM results WHERE task_id = :task_id');
    $stmt->bindParam(':task_id', $task_id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function create_result($task_id, $employee_id, $result_text, $result_file) {
    $stmt = $this->db->prepare('INSERT INTO results (task_id, employee_id, result_text, result_file) VALUES (:task_id, :employee_id, :result_text, :result_file)');
    $stmt->bindParam(':task_id', $task_id);
    $stmt->bindParam(':employee_id', $employee_id);
    $stmt->bindParam(':result_text', $result_text);
    $stmt->bindParam(':result_file', $result_file);
    $stmt->execute();
    return $this->db->lastInsertId();
  }

  public function update_result($result_id, $result_text, $result_file) {
    $stmt = $this->db->prepare('UPDATE results SET result_text = :result_text, result_file = :result_file WHERE id = :id');
    $stmt->bindParam(':result_text', $result_text);
    $stmt->bindParam(':result_file', $result_file);
    $stmt->bindParam(':id', $result_id);
    $stmt->execute();
    return $stmt->rowCount();
  }
}
?>
<?php
// class for managing task results
class Result {
  private $db;

  public function __construct($db) {
    $this->db = $db;
  }

  public function get_results_by_task($task_id) {
    $stmt = $this->db->prepare('SELECT * FROM results WHERE TaskId = :task_id');
    $stmt->bindParam(':task_id', $task_id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function create_result($task_id, $employee_id, $attachment, $comment) {
    $stmt = $this->db->prepare('CALL Procedure_InsertResult (:assignee_id, :task_id, :attachment, :comment)');
    $stmt->bindParam(':assignee_id', $employee_id);
    $stmt->bindParam(':task_id', $task_id);
    $stmt->bindParam(':attachment', $attachment);
    $stmt->bindParam(':comment', $comment);
    $stmt->execute();
    return $this->db->lastInsertId();
  }

  public function update_result($result_id, $attachment, $comment) {
    // Procedure_UpdateResult(IN result_id INT, IN attachment VARCHAR(500), IN comment VARCHAR(5000))
    $stmt = $this->db->prepare('CALL Procedure_UpdateResultById (:result_id, :attachment, :comment)');
    $stmt->bindParam(':result_id', $result_id);
    $stmt->bindParam(':attachment', $attachment);
    $stmt->bindParam(':comment', $comment);
    $stmt->execute();
    return $stmt->rowCount();
  }
}

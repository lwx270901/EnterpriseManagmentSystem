<!-- (class for managing task reviews) -->
<?php
class Review {
  private $db;

  public function __construct($db) {
    $this->db = $db;
  }

  public function get_reviews_by_employee($employee_id) {
    $stmt = $this->db->prepare('SELECT * FROM reviews WHERE employee_id = :employee_id');
    $stmt->bindParam(':employee_id', $employee_id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function create_review($task_id, $status, $comment = '') {
    $stmt = $this->db->prepare('INSERT INTO reviews (task_id, status, comment) VALUES (:task_id, :status, :comment)');
    $stmt->bindParam(':task_id', $task_id);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':comment', $comment);
    $stmt->execute();
    return $this->db->lastInsertId();
  }

  public function update_review($review_id, $status, $comment = '') {
    $stmt = $this->db->prepare('UPDATE reviews SET status = :status, comment = :comment WHERE id = :id');
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':comment', $comment);
    $stmt->bindParam(':id', $review_id);
    $stmt->execute();
    return $stmt->rowCount();
  }
}
?>
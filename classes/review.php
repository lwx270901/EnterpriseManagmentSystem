<?php
// class for managing task reviews
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

  public function create_review($reviewer_id, $result_id, $outcome, $comment = '') {
    $stmt = $this->db->prepare('INSERT INTO Reviews (ReviewerId, ResultId, ReviewOutcome, ReviewComment) VALUES (:reviewer_id, :result_id, :outcome, :comment)');
    $stmt->bindParam(':reviewer_id', $reviewer_id);
    $stmt->bindParam(':result_id', $result_id);
    $stmt->bindParam(':outcome', $outcome);
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

  public function get_review_by_result_id($result_id){
    $stmt = $this->db->prepare("SELECT * FROM Reviews WHERE Reviews.ResultId = :result_id");
    $stmt->bindParam(":result_id", $result_id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}

<?php
// class for managing departments
class Department {
  private $db;

  public function __construct($db) {
    $this->db = $db;
  }

  public function get_all_departments() {
    $stmt = $this->db->prepare('SELECT * FROM departments');
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function get_department_by_id($id) {
    $stmt = $this->db->prepare('SELECT * FROM departments WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function create_department($name, $description) {
    $stmt = $this->db->prepare('INSERT INTO departments (name, description) VALUES (:name, :description)');
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    $stmt->execute();
    return $this->db->lastInsertId();
  }

  public function update_department($id, $name, $description) {
    $stmt = $this->db->prepare('UPDATE departments SET name = :name, description = :description WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    $stmt->execute();
    return $stmt->rowCount();
  }

  public function delete_department($id) {
    $stmt = $this->db->prepare('DELETE FROM departments WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->rowCount();
  }
}
?>
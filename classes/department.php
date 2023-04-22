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
    $stmt = $this->db->prepare('SELECT * FROM departments WHERE DepartmentId = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function get_department_head($dep_id) {
    $stmt = $this->db->prepare('SELECT * FROM departmentheads WHERE DepartmentId = :dep_id');
    $stmt->bindParam(':dep_id', $dep_id);
    $stmt->execute();
    $dep_head = $stmt->fetch(PDO::FETCH_ASSOC);
    $dep_head_id = $dep_head['DepartmentHeadId'];
    $stmt->closeCursor();
    return $dep_head_id;
  }

  public function get_department_by_name($inpText) {
    $stmt = $this->db->prepare('SELECT * FROM departments WHERE DepartmentName  LIKE :input');
    $stmt->execute(['input' => '' . $inpText . '%']);
    $allDep = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $allDep;
  }

  public function create_department($name, $description) {

    $stmt = $this->db->prepare('INSERT INTO departments (DepartmentName, DepartmentDescription) VALUES (:name, :description)');
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    $stmt->execute();
    return $this->db->lastInsertId();
  }

  public function add_dep_head($dep_id, $dep_head_id) {
    $stmt = $this->db->prepare('INSERT INTO departmentheads (DepartmentId, DepartmentHeadId) VALUES (:dep_id, :dep_head_id)');
    $stmt->bindParam(':dep_id', $dep_id);
    $stmt->bindParam(':dep_head_id', $dep_head_id);
    $stmt->execute();
    $stmt->closeCursor();
  }

  public function update_department($id, $name, $description) {
    $stmt = $this->db->prepare('UPDATE departments SET DepartmentName = :name, DepartmentDescription = :description WHERE DepartmentId = :id');
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    $stmt->execute();
    return $stmt->rowCount();
  }

  public function delete_department($id) {
    $stmt = $this->db->prepare('DELETE FROM departments WHERE DepartmentId = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->rowCount();
  }

  public function delete_department_head($id) {
    $stmt = $this->db->prepare('SELECT * FROM departmentheads WHERE DepartmentId = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $dep_id = $result['DepartmentHeadId'];
    $stmt->closeCursor();
    $stmt = $this->db->prepare('DELETE FROM departmentheads WHERE DepartmentId = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $stmt->closeCursor();
    return $dep_id;
  }
}
?>
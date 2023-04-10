<!-- (class for managing employees) -->
<?php
class Employee {
  private $db;

  public function __construct($db) {
    $this->db = $db;
  }

  public function get_all_employees() {
    $stmt = $this->db->prepare('SELECT * FROM employees');
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function get_employee_by_id($id) {
    $stmt = $this->db->prepare('SELECT * FROM employees WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function get_employees_by_department($department_id) {
    $stmt = $this->db->prepare('SELECT * FROM employees WHERE department_id = :department_id');
    $stmt->bindParam(':department_id', $department_id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function create_employee($name, $email, $department_id) {
    $stmt = $this->db->prepare('INSERT INTO employees (name, email, department_id) VALUES (:name, :email, :department_id)');
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':department_id', $department_id);
    $stmt->execute();
    return $this->db->lastInsertId();
  }

  public function update_employee($id, $name, $email, $department_id) {
    $stmt = $this->db->prepare('UPDATE employees SET name = :name, email = :email, department_id = :department_id WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':department_id', $department_id);
    $stmt->execute();
    return $stmt->rowCount();
  }

  public function delete_employee($id) {
    $stmt = $this->db->prepare('DELETE FROM employees WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->rowCount();
  }
}

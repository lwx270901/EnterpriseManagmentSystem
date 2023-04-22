<?php
//class for managing employees
class Employee {
  private $db;

  public function __construct($db) {
    $this->db = $db;
  }

  public function get_all_employees() {
    $stmt = $this->db->prepare('SELECT * FROM employees ORDER BY RoleId');
    $stmt->execute();
    $allemp = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $allemp;
  }

  public function get_employee_by_id($id) {
    if (!$id) {
      return "No employee with this id!";
    }
    $stmt = $this->db->prepare('SELECT * FROM employees WHERE EmployeeId = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $emp = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $emp;
  }

  public function get_employee_by_name($inpText) {
    $stmt = $this->db->prepare('SELECT * FROM employees WHERE CONCAT(FirstName," ",LastName)  LIKE :input');
    $stmt->execute(['input' => '' . $inpText . '%']);
    $allemp = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // if (!is_null($inpText) && is_null($allemp)) {
    //   return "No employee with this name!";
    // }
    $stmt->closeCursor();
    return $allemp;
  }

  public function get_employee_by_full_name($name) {
    $stmt = $this->db->prepare('SELECT * FROM employees WHERE CONCAT(FirstName," ",LastName)  LIKE :name');
    $stmt->execute(['name' => '' . $name . '%']);
    $emp = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $emp;
  }

  public function get_employees_by_department($department_id) {
    $stmt = $this->db->prepare('SELECT * FROM employees WHERE DepartmentId = :department_id');
    $stmt->bindParam(':department_id', $department_id);
    $stmt->execute();
    $allempperdep = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $allempperdep;
  }

  public function create_employee($name, $email, $department_id) {
    $stmt = $this->db->prepare('INSERT INTO employees (name, email, department_id) VALUES (:name, :email, :department_id)');
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':department_id', $department_id);
    $stmt->execute();
    $stmt->closeCursor();
    return $this->db->lastInsertId();
  }

  public function update_employee($id, $name, $email, $department_id) {
    $stmt = $this->db->prepare('UPDATE employees SET name = :name, email = :email, DepartmentId = :department_id WHERE EmployeeId = :id');
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':department_id', $department_id);
    $stmt->execute();
    $row = $stmt->rowCount();
    $stmt->closeCursor();
    return $row;
  }

  public function update_employee_to_dep_head($id, $department_id) {
    $stmt = $this->db->prepare('UPDATE employees SET RoleId = :roleId, Level = :lv, DepartmentId = :department_id WHERE EmployeeId = :id');
    $stmt->bindParam(':id', $id);
    $roleId = 2;
    $level = -1;
    $stmt->bindParam(':roleId', $roleId);
    $stmt->bindParam(':lv', $level);
    $stmt->bindParam(':department_id', $department_id);
    $stmt->execute();
    $stmt->closeCursor();
  }

  public function delete_employee($id) {
    $stmt = $this->db->prepare('DELETE FROM employees WHERE EmployeeId = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $row = $stmt->rowCount();
    $stmt->closeCursor();
    return $row;
  }
}
?>
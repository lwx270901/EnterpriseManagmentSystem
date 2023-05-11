<?php
// class for managing employees
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
    $stmt = $this->db->prepare('CALL Procedure_GetUsersLikeName(:inpText)');
    $stmt->bindParam(':inpText', $inpText);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
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

  public function get_null_dep_employees_like_input($inpText) {
    $stmt = $this->db->prepare("CALL Procedure_GetUsersLikesNameWithoutDep(:inpText)");
    $stmt->bindParam(':inpText', $inpText);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    $stmt = $this->db->prepare('UPDATE employees SET RoleId = :roleId, DepartmentId = :department_id WHERE EmployeeId = :id');
    $stmt->bindParam(':id', $id);
    $roleId = 2;
    $level = -1;
    $stmt->bindParam(':roleId', $roleId);
    $stmt->bindParam(':department_id', $department_id);
    $stmt->execute();
    $stmt->closeCursor();
  }

  public function update_employee_to_normal($id) {
    $stmt = $this->db->prepare('UPDATE employees SET RoleId = :roleId, DepartmentId = :department_id WHERE EmployeeId = :id');
    $stmt->bindParam(':id', $id);
    $roleId = 3;
    $level = 1;
    $department_id = NULL;
    $stmt->bindParam(':roleId', $roleId);
    $stmt->bindParam(':department_id', $department_id);
    $stmt->execute();
    $stmt->closeCursor();
  }

  public function remove_employee_from_department($dep_id) {
    $stmt = $this->db->prepare('UPDATE employees SET RoleId = :roleId, DepartmentId = NULL WHERE DepartmentId = :department_id');
    $roleId = 3;
    $level = 1;
    $stmt->bindParam(':roleId', $roleId);
    $stmt->bindParam(':department_id', $dep_id);
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

  public function remove_employee_from_department($id){
    $stmt = $this->db->prepare('UPDATE Employees SET Employees.DepartmentId = NULL WHERE Employees.EmployeeId = :emp_id');
    $stmt->bindParam(':emp_id', $id);
    $stmt->execute();
    $stmt->closeCursor();
  }

  public function add_employee_to_department($emp_id, $dep_id){
    $stmt = $this->db->prepare('
    UPDATE Employees 
    SET Employees.DepartmentId = :dep_id 
    WHERE Employees.EmployeeId = :emp_id');
    $stmt->bindParam(':emp_id', $emp_id);
    $stmt->bindParam(':dep_id', $dep_id);
    $stmt->execute();
    $stmt->closeCursor();
  }
}
?>
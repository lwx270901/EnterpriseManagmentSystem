<?php
// class for managing user accounts
class User {
  private $db;

  public function __construct($db) {
    $this->db = $db;
  }

  public function login($username, $password) {
    // Prepare and execute the SQL query to check if the username and password are valid
    $stmt = $this->db->prepare('CALL Procedure_HandleEmployeeLogin (?, ?);');
    $stmt->execute(array($username, $password));

    // Fetch the results and return the user's ID and role if the username and password are valid
    if ($stmt->rowCount() == 1) {
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      return array('user_id' => $row['EmployeeId'], 'role_id' => $row['RoleId'], 'username' => $row['UserName']);
    } else {
      return false;
    }
  }

  public function is_logged_in() {
    // Check if the user is logged in by checking if the user ID is set in the session
    return isset($_SESSION['user_id']);
  }

  public function get_user_role() {
    // Get the user's role by querying the database with the user ID from the session
    $stmt = $this->db->prepare('SELECT role FROM users WHERE id = ?');
    $stmt->execute(array($_SESSION['user_id']));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row['role'];
  }

  public function get_name_by_id($user_id) {
    
  }
}
?>

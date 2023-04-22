<?php
include($_SERVER['DOCUMENT_ROOT'] .'/includes/config.php');
if (isset($_POST['query'])) {
    $inpText = $_POST['query'];
    // $result = $employee_control->get_all_employees();
    $result = $employee_control->get_employee_by_name($inpText);
    $employees = array();
    if ($result) {
      $i=0;
      foreach ($result as $row) {
        $employees[$i] = array();
        $employees[$i]['id'] = $row['EmployeeId'];
        $employees[$i]['name'] = $row['FirstName'].' '.$row['LastName'];
        $i = $i+1;
      }
    }
  header('Content-Type: application/json');
  echo json_encode($employees);
}
?>
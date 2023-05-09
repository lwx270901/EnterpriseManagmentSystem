<?php
include($_SERVER['DOCUMENT_ROOT'] .'/includes/config.php');
if (isset($_POST['query'])) {
    $inpText = $_POST['query'];
    $result = $department_control->get_department_by_name($inpText);
    $departments = array();
    if ($result) {
      $i=0;
      foreach ($result as $row) {
        $departments[$i] = array();
        $departments[$i]['id'] = $row['DepartmentId'];
        $departments[$i]['name'] = $row['DepartmentName'];
        $i = $i+1;
      }
    }
  header('Content-Type: application/json');
  echo json_encode($departments);
}
?>
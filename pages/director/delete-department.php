<?php 
include($_SERVER['DOCUMENT_ROOT'] .'/includes/config.php');
$departments = array();
if (isset($_POST['department_id'])) {
    $id =  $_POST["department_id"];
    $dep_head_id = $department_control->delete_department_head($id);
    if (is_null($dep_head_id) == FALSE){
      $employee_control->update_employee_to_normal($dep_head_id);
    }

    $employee_control->remove_employee_from_department($id);
    $department_control->delete_department($id);
    $result = $department_control->get_all_departments();
    
    if ($result) {
      $i=0;
      foreach ($result as $row) {
        $departments[$i] = array();
        $departments[$i]['id'] = $row['DepartmentId'];
        $departments[$i]['name'] = $row['DepartmentName'];
        $i = $i+1;
      }
    }
}
  header('Content-Type: application/json');
  header('Refresh: 1; url=index.php');
  echo json_encode($departments);
?>
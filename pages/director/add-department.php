<?php
include($_SERVER['DOCUMENT_ROOT'] .'/includes/config.php');
if (isset($_POST['department']) && isset($_POST['employee'])) {
    $department = $_POST['department'];
    $description = $_POST['description'];
    $employee = $_POST['employee'];
    $employee_id = $employee_control->get_employee_by_full_name($employee)['EmployeeId'];
    $dep_id = $department_control->create_department($department, $description);
    $department_control->add_dep_head($dep_id, $employee_id);
    $row = $employee_control->update_employee_to_dep_head($employee_id, $dep_id);
    
    $result = $department_control->get_department_by_name($department);
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
  header('Refresh: 1; url=index.php');
  echo json_encode($departments);
}
?>
<?php
include_once '../../includes/config.php';

if (isset($_POST['dep_id']) && isset($_POST['dep_desc'])) {
	$dep_id = $_POST['dep_id'];
    $department_name = $_POST['dep_name'];
	$description = $_POST['dep_desc'];
	$new_dep_head_id = $_POST['dep_head_id'];

    $department  = $department_control->get_department_by_id($dep_id);

    if (!is_numeric($new_dep_head_id) and !is_null($new_dep_head_id)){
        $dep_head_id = $employee_control->get_employee_by_full_name($new_dep_head_id)['EmployeeId'];
        $updated_dep_id = $department_control->update_department_without_head($dep_id, $department_name, $description);
    }
    else{
        $employee_control->update_employee_to_dep_head($new_dep_head_id, $dep_id);
        $dep_head_id = $department_control->delete_department_head($dep_id);
        if (!is_null($dep_head_id)){
            $employee_control->update_employee_to_normal($dep_head_id);
        } 
        $updated_dep_id = $department_control->update_department($dep_id, $department_name, $description, $new_dep_head_id);
    }

	echo 'Success fully update department with id ' . $updated_dep_id;
}

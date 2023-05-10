<?php
include_once '../../includes/config.php';

if (isset($_POST['dep_name']) && isset($_POST['dep_desc'])) {
	$department_name = $_POST['dep_name'];
	$description = $_POST['dep_desc'];
	$new_dep_head_id = $_POST['dep_head_id'];

    $department  = $department_control->get_single_department_by_name($department_name);
    $dep_id = $department['DepartmentId'];
    
    if (is_numeric($new_dep_head_id) == FALSE){
        $new_dep_head_id = NULL;
    }
    else{
        $employee_control->update_employee_to_dep_head($new_dep_head_id, $dep_id);

    }
    $dep_head_id = $department_control->delete_department_head($dep_id);
    if (is_null($dep_head_id) == FALSE){
        $employee_control->update_employee_to_normal($dep_head_id);
    } 

	$updated_dep_id = $department_control->update_department($dep_id, $department_name, $description, $new_dep_head_id);

	echo 'Success fully update department with id ' . $updated_dep_id;
}

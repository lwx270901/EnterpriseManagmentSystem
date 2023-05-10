<?php 
include_once '../../includes/config.php';

$userList = $employee_control->get_null_dep_employees_like_input($_POST['query']);
echo json_encode($userList);
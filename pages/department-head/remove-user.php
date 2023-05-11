<?php
include_once '../../includes/config.php';

$user_id = $_POST['user_id'];
$employee_control->remove_employee_from_department($user_id);

$_SESSION['message'] = "Successfully removed user with ID ". $user_id . " from the department";
<?php 
include_once '../../includes/config.php';

$employee_control->add_employee_to_department($_POST['user_id'], $_SESSION['dep_id']);
?>
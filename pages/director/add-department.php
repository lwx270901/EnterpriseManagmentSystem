<?php
include_once '../../includes/config.php';

if (isset($_POST['dep_name']) && isset($_POST['dep_desc'])) {
	$department_name = $_POST['dep_name'];
	$description = $_POST['dep_desc'];
	$dep_head_id = $_POST['dep_head_id'];

	// Retrieve last inserted deparment id
	$inserted_dep_id = $department_control->insert_department($department_name, $description, $dep_head_id);

	echo 'Success fully added a new department named ' . $department_name;
}

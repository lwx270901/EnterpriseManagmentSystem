<?php
include($_SERVER['DOCUMENT_ROOT'] . '/includes/config.php');
if (isset($_POST['query'])) {
	$inpText = $_POST['query'];
	$result = $employee_control->get_employee_by_name($inpText);
	print_r(json_encode($result));
}
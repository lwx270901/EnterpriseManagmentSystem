<?php
include_once '../../includes/config.php';

$tasksList = $task->get_tasks_by_employee($_SESSION['user_id']);
echo json_encode($tasksList);

<?php
include_once '../../includes/config.php';

$tasksList = $task->get_tasks_by_employee($_SESSION['user_id']);
$_SESSION['tasks_list'] = $tasksList ;
echo json_encode($tasksList);

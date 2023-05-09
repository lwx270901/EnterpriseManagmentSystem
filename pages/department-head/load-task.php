<?php
include_once '../../includes/config.php';

$tasksList = $task_control->get_tasks_by_department_head($_SESSION['user_id']);
$_SESSION['tasks_list'] = $tasksList;
echo json_encode($tasksList);
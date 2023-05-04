<?php
include_once '../../includes/config.php';
$task_result = $result->get_results_by_task($_POST['task_id']);
echo json_encode($task_result);

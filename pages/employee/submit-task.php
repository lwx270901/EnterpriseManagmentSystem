<?php
include_once '../../includes/config.php';

// Procedure for submitting a task:
// 1. Update or create a new result record
$task_result = $result_control->get_results_by_task($_POST['task_id']);

// 1.1. If the result is not exist, create a new one.
// 1.2. If the result already exists (previously submitted task), then update that result based on its ResultId.
if (count($task_result) == 0) {
    $result_control->create_result($_POST['task_id'], $_SESSION['user_id'], $_POST['file'], $_POST['comment']);
    $_SESSION['message'] = "Task submitted successfully";
} else {
    $prevResultId = intval($task_result[0]['ResultId']);
    $result_control->update_result($prevResultId, $_POST['file'], $_POST['comment']);
    $_SESSION['message'] = "Task updated successfully";
}

// 2. Update the status of submitted task
$task_control->update_task_status($_POST['task_id'], 3);

header('Location: /index.php?task-view&id=' . $_POST['task_id']);

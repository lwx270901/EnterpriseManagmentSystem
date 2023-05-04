<?php
include_once '../../includes/config.php';

// Procedure for submitting a task:
// 1. Update or create a new result record
$task_result = $result->get_results_by_task($_POST['task_id']);

// 1.1. If the result is not exist, create a new one.
// 1.2. If the result already exists (previously submitted task), then update that result based on its ResultId.
if (count($task_result) == 0) {
    $result->create_result($_POST['task_id'], $_SESSION['user_id'], $_POST['filename'], $_POST['comment']);
} else {
    $prevResultId = intval($task_result[0]['ResultId']);
    $result->update_result($prevResultId, $_POST['filename'], $_POST['comment']);
}

// 2. Update the status of submitted task
$task->update_task_status($_POST['task_id'], $_POST['status']);

// 3. (Optionally), return the form data back to jquery page.
print_r($_POST);

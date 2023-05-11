<?php
include_once '../../includes/config.php';
$comment = $_POST["comment"];
$outcome = $_POST["review-outcome"];
$result_id = $_POST["result-id"];
$reviewer_id = $_SESSION["user_id"];

$review_control->create_review($reviewer_id, $result_id, $outcome, $comment);

// set new task deadline
if ($_POST["new-deadline"]) {
    $new_deadline = $_POST["new-deadline"];
    $task_id = $_POST["task-id"];
    $task_control->update_task_deadline($task_id, $new_deadline);
}
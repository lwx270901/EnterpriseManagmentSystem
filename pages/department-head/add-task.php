<?php
include_once '../../includes/config.php';

$status = $task->add_task_to_employee($_POST['employee'], $_SESSION['user_id'], $_POST['description'], $_POST['deadline']);
echo $status;

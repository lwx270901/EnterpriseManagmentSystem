<?php
include_once '../../includes/config.php';

echo $_POST['comment'];

$task->update_task_status('', 3, '');
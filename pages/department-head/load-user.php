<?php 
include_once '../../includes/config.php';

$userList = $user->get_name_like_input($_SESSION['dep_id'], $_SESSION['user_id']);

echo json_encode($userList);
<!-- this is index file -->
<?php
// Start the session
session_start();

$_SESSION['user'] = 'linh';
$_SESSION['role'] = 'director';
// $_SESSION['role'] = 'department_head';
// $_SESSION['role'] = 'employee';

// Include the configuration file
include_once 'includes/config.php';

// Include the functions file
include_once 'includes/functions.php';


// Check if the user is logged in
// // $_SESSION['USER']
// if (isset($_SESSION['user'])) {
//   header('Location: login.php');
//   exit;
// }

// Get the user's role
$user_role = $_SESSION['role'];

// Include the header template
include_once 'templates/header.php';

// Display the appropriate page based on the user's role
// switch ($user_role) {
//   case 'director':
//     include_once 'pages/dashboard.php';
//     break;
//   case 'department_head':
//     include_once 'pages/task_assign.php';
//     break;
//   case 'employee':
//     include_once 'pages/task_submit.php';
//     break;
// }

// Include the footer template

include_once 'templates/footer.php';
?>

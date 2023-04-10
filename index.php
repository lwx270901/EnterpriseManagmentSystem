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

// Display the appropriate page based on the user's role

// Include the footer template

?>
<!-- this is index file -->
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/css/main.css">
  <link rel="stylesheet" href="./bootstrap-5.3.0-alpha3-dist/js/bootstrap.js">
  <link rel="stylesheet" href="./bootstrap-5.3.0-alpha3-dist/css/bootstrap.css">
  <title>Document</title>
</head>

<body>
  <?php
  include_once 'templates/header.php';
  ?>
  <section>
    <?php
    switch ($user_role) {
      case 'director':
        include_once 'pages/dashboard.php';
        break;
      case 'department_head':
        include_once 'pages/task_assign.php';
        break;
      case 'employee':
        include_once 'pages/task_submit.php';
        break;
    }
    ?>
  </section>
  <section>
    <?php
    include_once 'templates/footer.php';

    ?>
  </section>



</body>

</html>
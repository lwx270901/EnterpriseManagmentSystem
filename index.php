<?php
// Start the session
include_once 'includes/config.php';
include_once 'includes/functions.php';

$_SESSION['user'] = 'linh';
$_SESSION['role'] = '';
$_SESSION['role'] = 'director';
// $_SESSION['role'] = 'department_head';
// $_SESSION['role'] = 'employee';
$user_role = $_SESSION['role']
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
    if (!isset($_SESSION['user'])) {
      header('Location:  pages/login.php');
    } else {
      switch ($user_role) {
        case 'director':
          include_once 'pages/director.php';
          break;
        case 'department_head':
          include_once 'pages/department.php';
          break;
        case 'employee':
          include_once 'pages/employee.php';
          break;
      }
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

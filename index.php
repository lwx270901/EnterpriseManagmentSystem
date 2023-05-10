<?php
// Start the session
include_once 'includes/config.php';
include_once 'includes/functions.php';


$user_role = $_SESSION['role']
?>
<!-- this is index file -->
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/css/main.css">
  <script src="jquery/jquery-3.6.4.min.js"></script>
  <!-- <link rel="stylesheet" href="./bootstrap-5.3.0-alpha3-dist/js/bootstrap.min.js">
  <link rel="stylesheet" href="./bootstrap-5.3.0-alpha3-dist/css/bootstrap.min.css"> -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>	
  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/b15b05a753.js" crossorigin="anonymous"></script>
  <title>iTask</title>
</head>
<header>
  <?php include_once 'templates/header.php';?>
</header>
<body>
  <section>
    <?php
    if (!isset($_SESSION['user'])) {
      header('Location:  pages/login.php');
    } else if (isset($_GET['task-view'])) {
      include 'pages/components/task-view.php';
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
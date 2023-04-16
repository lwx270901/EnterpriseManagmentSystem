<!-- login page -->

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-5.3.0-alpha3-dist/js/bootstrap.js">
    <link rel="stylesheet" href="../bootstrap-5.3.0-alpha3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/login.css">
    <title>Document</title>
</head>

<?php
include_once '../includes/config.php';

$loginFailedMsg = "";

function saveSessionInfoOnLoginSuccess($queryResult) {
    $_SESSION['user_id'] = $queryResult['user_id'];
    $_SESSION['user'] = $queryResult['username'];
    $_SESSION['role'] = $queryResult['role_id'];
}

if (isset($_POST['submit'])) {
    //fetch data from login form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // $user->login() returns an array for success operation and a false value for failed operation
    $loginQueryResult = $user->login($username, md5($password));

    if (!is_array($loginQueryResult)) {
        $loginFailedMsg = "Login failed, check your username and password!";
    } else {
        saveSessionInfoOnLoginSuccess($loginQueryResult);
        header('Location: /index.php');
    }
}
?>

<body>
    
    <div class="big-card row px-0">
        <div class="login-card  col-lg-4 col-sm-12 px-0">
            <div class="top-login-text">
                <h1> LOGIN </h1>
                <h7> Welcome back! Let's get working </h7>
            </div>
            <div class="line">
                <hr>
            </div>

            <form action="" id="loginForm" method="POST">
                <h4 class="text-danger">
                    <?php echo $loginFailedMsg; ?>
                </h4>
                Username: <input class="login" id="username" type="text" name="username" placeholder="Username" autofocus required>
                <br>
                Password: <input class="login" id="password" type="password" name="password" placeholder="Password" required>
                <br>
                <button class="login-button" type="submit" name="submit"> Login to start working!</button>
            </form>
        </div>
        <div class="back-card col-lg-8 col-sm-0 px-0"> </div>
    </div>


</body>

</html>


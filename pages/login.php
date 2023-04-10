<!-- login page -->

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-5.3.0-alpha3-dist/js/bootstrap.js">
    <link rel="stylesheet" href="../bootstrap-5.3.0-alpha3-dist/css/bootstrap.css">
    <title>Document</title>
</head>

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
                Username: <input class="login" id="username" type="text" name="username" placeholder="Username"
                    autofocus required>
                <br>
                Password: <input class="login" id="password" type="password" name="password" placeholder="Password"
                    required>
                <br>
                <button class="login-button" type="submit"> Login to start working!</button>
            </form>
        </div>
        <div class="back-card col-lg-8 col-sm-0 px-0"> </div>
    </div>


</body>

</html>

<style>
    @import "../assets/css/main.css";

    :root {
        --login-element-width: 80%;
        --login-button-background: #2bd14e;
        --login-button-text: #ffffff;
        --login-button-border-radius: 12px;
    }

    .big-card {
        width: 100%;
        height: 100vh;
        margin: 0;
        padding: 0;
    }

    .login-card {
        height: 100vh;
        background-color: var(--section-gray);

    }

    .back-card {
        height: 100vh;
        border-style: dashed;
        background: #0f2027;
        background: -webkit-linear-gradient(to right, #0f2027, #203a43, #2c5364);
        background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
    }

    #loginForm {
        display: flex;
        flex-direction: column;
        text-align: center;
        align-items: center;
        justify-content: center;
        vertical-align: middle;
        height: 60vh;
        font-size: 1.5em;
    }

    .login-button {
        background-color: var(--login-button-background);
        border-radius: var(--login-button-border-radius);
        color: var(--login-button-text);
        width: var(--login-element-width);
    }

    .login {
        width: var(--login-element-width);
    }

    .top-login-text {
        padding: 35px 0px 8px;
        text-align: center;
    }
</style>
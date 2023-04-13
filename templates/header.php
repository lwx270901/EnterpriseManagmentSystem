<!-- header template for each page -->
<!-- <section>
            <ul class="nav-bar row px-0 g-0">
                <li class="col-3 px-0"><a href="?page=home">Home</a></li>
                <li class="col-3 px-0"><a href="?page=products">Products</a></li>
                <li class="col-3 px-0"><a href="?page=register">Register</a></li>
                <li class="col-3 px-0"><a href="?page=login">Login</a></li>
            </ul>

        </section> -->
<?php if ($_SESSION['role'] == 'director') : ?>

    <div class="header">
        <div class="row g-0">
            <div class="col-lg-2 col-sm-0">
            </div>
            <div class="col-lg nav-bar-container">
                <ul class="nav-bar row g-0 px-0  ">
                    <li class="col-6 px-0"><a href="?func=director-dashboard">Dashboard</a></li>
                    <li class="col-6 px-0"><a href="?func=logout">Logout</a></li>

                </ul>
            </div>
            <div class="user col-lg-2 col-sm-0">
                <div class="row gx-0 px-0">
                    <div class="col-2 px-0">
                        <img width="60px" height="60px" src="./assets//images/user.png" alt="">
                    </div>
                    <span class="user-text col px-0">
                        <span id="user-name">Username</span>
                        <br>
                        <span id="user-role">User role</span>
                        <br>
                        <span id="user-level">User level</span>
                    </span>
                </div>
            </div>

        </div>
    </div>

<?php elseif ($_SESSION['role'] == 'department_head') : ?>
    <div class="header">
        <div class="row g-0">
            <div class="col-lg-2 col-sm-0">
            </div>
            <div class="col-lg nav-bar-container">
                <ul class="nav-bar row g-0 px-0  ">
                    <li class="col-6 px-0"><a href="?func=deparment-dashboard">Dashboard</a></li>
                    <li class="col-6 px-0"><a href="?func=logout">Logout</a></li>

                </ul>
            </div>
            <div class="user col-lg-2 col-sm-0">
                <div class="row gx-0 px-0">
                    <div class="col-2 px-0">
                        <img width="60px" height="60px" src="./assets//images/user.png" alt="">
                    </div>
                    <span class="user-text col px-0">
                        <span id="user-name">Username</span>
                        <br>
                        <span id="user-role">User role</span>
                        <br>
                        <span id="user-level">User level</span>
                    </span>
                </div>
            </div>

        </div>
    </div>

<?php elseif ($_SESSION['role'] == 'employee') : ?>
    <div class="header">
        <div class="row g-0">
            <div class="col-lg-2 col-sm-0">
            </div>
            <div class="col-lg nav-bar-container">
                <ul class="nav-bar row g-0 px-0  ">
                    <li class="col-6 px-0"><a href="?func=employee-dashboard">Dashboard</a></li>
                    <li class="col-6 px-0"><a href="?func=logout">Logout</a></li>

                </ul>
            </div>
            <div class="user col-lg-2 col-sm-0">
                <div class="row gx-0 px-0">
                    <div class="col-2 px-0">
                        <img width="60px" height="60px" src="./assets//images/user.png" alt="">
                    </div>
                    <span class="user-text col px-0">
                        <span id="user-name">Username</span>
                        <br>
                        <span id="user-role">User role</span>
                        <br>
                        <span id="user-level">User level</span>
                    </span>
                </div>
            </div>

        </div>
    </div>
<?php endif; ?>
<hr>
<?php
$page = isset($_GET["func"]) ? $_GET["func"] : 0;
switch ($page) {
    case "logout":
        logout();
}

?>
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
        <div class="header-content">
            <div class="user-info"></div>
            <div class="nav-bar-container">
                <ul class="nav-bar row px-0     ">
                    <li class="col-6 px-0"><a href="?func=deparment-dashboard">Dashboard</a></li>
                    <li class="col-6 px-0"><a href="?func=logout">Logout</a></li>
            </div>
            </ul>
        </div>
    </div>

<?php elseif ($_SESSION['role'] == 'department_head') : ?>

    <div class="header">
        <div class="header-content">
            <div class="user-info"></div>
            <div class="nav-bar-container">
                <ul class="nav-bar row px-0 g-0">
                    <li class="col-3 px-0"><a href="?func=emp-dashboard">Dashboard</a></li>
                    <li class="col-3 px-0"><a href="?func=assignEmployee">Assign Employee</a></li>
                    <li class="col-3 px-0"><a href="?func=assignTask">Assign Task</a></li>
                    <li class="col-3 px-0"><a href="?func=logout">Logout</a></li>
                </ul>
            </div>
        </div>

    </div>

<?php elseif ($_SESSION['role'] == 'employee') : ?>
    <div class="header">
        <div class="header-content">
            <div class="user-info"></div>
            <div class="nav-bar-container">
                <ul class="nav-bar row px-0 g-0">
                    <li class="col-4 px-0"><a href="?func=viewTask">viewTask</a></li>
                    <li class="col-4 px-0"><a href="?func=submitTask">submit Task</a></li>
                    <li class="col-4 px-0"><a href="?func=logout">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>

<?php else : ?>
    <div class="header">
        <div class="header-content">
            <div class="user-info"></div>
            <div class="nav-bar-container">
                <ul class="nav-bar row px-0 g-0">
                    <li class="col-12 px-0"><a href="?func=login">Login</a></li>
                </ul>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php 
$page = isset($_GET["page"]) ? $_GET["page"] : 0;
switch ($page) {
    case "logout":
        logout();
}

?>
<!-- header template for each page -->
<!-- 
            <ul class="nav-bar row px-0 g-0">
                <li class="col-3 px-0"><a href="?page=home">Home</a></li>
                <li class="col-3 px-0"><a href="?page=products">Products</a></li>
                <li class="col-3 px-0"><a href="?page=register">Register</a></li>
                <li class="col-3 px-0"><a href="?page=login">Login</a></li>
            </ul>

         -->
<?php if ($_SESSION['role'] == Role::Director->value): ?>


    <ul class="nav-bar row px-0     ">
        <li class="col-4 px-0"><a href="?page=dashboard">Dashboard</a></li>
        <li class="col-4 px-0"><a href="?page=assignDH">Assign deparment heads</a></li>
        <li class="col-4 px-0"><a href="?page=logout">Logout</a></li>

    </ul>



<?php elseif ($_SESSION['role'] == Role::DepartmentHead->value): ?>


    <ul class="nav-bar row px-0">
        <li class="col-3 px-0"><a href="?page=dashboard">Dashboard</a></li>
        <li class="col-3 px-0"><a href="?page=assignEmployee">Assign Employee</a></li>
        <li class="col-3 px-0"><a href="?page=assignTask">Assign Task</a></li>
        <li class="col-3 px-0"><a href="?page=logout">Logout</a></li>
    </ul>


<?php elseif ($_SESSION['role'] == Role::Employee->value): ?>

    <ul class="nav-bar row px-0">
        <li class="col-4 px-0"><a href="?page=viewTask">viewTask</a></li>
        <li class="col-4 px-0"><a href="?page=submitTask">submit Task</a></li>
        <li class="col-4 px-0"><a href="?page=logout">Logout</a></li>
    </ul>
<?php else: ?>

    <ul class="nav-bar row px-0">
        <li class="col px-0"><a href="?page=home">Home</a></li>

        <li class="col px-0"><a href="?page=login">Login</a></li>
    </ul>
<?php endif; ?>
<?php
$page = isset($_GET["page"]) ? $_GET["page"] : 0;
switch ($page) {
    case "logout":
        logout();
}

?>
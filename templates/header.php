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

    <section>
        <ul class="nav-bar row px-0 g-0">
            <li class="col-4 px-0"><a href="?func=dashboard">Dashboard</a></li>
            <li class="col-4 px-0"><a href="?func=assignDH">Products</a></li>
            <li class="col-4 px-0"><a href="?func=logout">Logout</a></li>
        </ul>

    </section>

<?php elseif ($_SESSION['role'] == 'department_head') : ?>

    <section>
        <ul class="nav-bar row px-0 g-0">
            <li class="col-3 px-0"><a href="?func=dashboard">Dashboard</a></li>
            <li class="col-3 px-0"><a href="?func=assignEmployee">Assign Employee</a></li>
            <li class="col-3 px-0"><a href="?func=assignTask">Assign Task</a></li>
            <li class="col-3 px-0"><a href="?func=logout">Logout</a></li>
        </ul>

    </section>
<?php elseif ($_SESSION['role'] == 'emlpoyee') : ?>
    <section>
        <ul class="nav-bar row px-0 g-0">
            <li class="col-4 px-0"><a href="?func=viewTask">viewTask</a></li>
            <li class="col-4 px-0"><a href="?func=submitTask">submit Task</a></li>
            <li class="col-4 px-0"><a href="?func=logout">Logout</a></li>
        </ul>
<?php else : ?>
    <section>
        <ul class="nav-bar row px-0 g-0">
            <li class="col-12 px-0"><a href="?func=logout">Login</a></li>
        </ul>
<?php endif; ?>
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
                <li class="col-4 px-0"><a href="?func=department-dashboard">Dashboard</a></li>
                <li class="col-4 px-0"><a href="?func=assign-task">Assign task</a></li>
                
                <li class="col-4 px-0"><a href="?func=logout">Logout</a></li>

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

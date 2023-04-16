<?php if ($_SESSION['role'] == Role::Director->value): ?>

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

<?php elseif ($_SESSION['role'] == Role::DepartmentHead->value): ?>

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
<hr>

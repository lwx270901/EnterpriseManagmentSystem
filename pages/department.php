<?php
if (isset($_GET['func'])) {
    $func = $_GET['func'];
    switch ($func) {
        case 'department-dashboard':
            include_once 'components/department-dashboard.php';
            break;
        case 'assign-task':
            include_once 'components/task-assign.php';
            break;
        case 'department-employees':
            include_once 'components/department-employees.php';
            break;
        case 'profile':
            include_once 'profile.php';
            break;
        case 'logout':
            logout();
            break;
    }
}

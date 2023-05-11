<?php
if (isset($_GET['func'])) {
    $func = $_GET['func'];
    switch ($func) {
        case 'employee-dashboard':
            include_once 'components/employee-dashboard.php';
            break;
        case 'task-result':
            include_once 'components/task-result.php';
            break;
        case 'profile':
            include_once 'profile.php';
            break;
        case 'logout':
            logout();
            break;
    }
}

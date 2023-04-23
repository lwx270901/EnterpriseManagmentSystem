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
        case 'logout':
            logout();
            break;

    }
}
?>
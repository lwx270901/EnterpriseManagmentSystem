<?php
if (isset($_GET['func'])) {
    $func = $_GET['func'];
    switch ($func) {
        case 'director-dashboard':
            include_once 'components/director-dashboard.php';
            break;
        case 'profile':
            include_once 'profile.php';
            break;
        case 'logout':
            logout();
            break;

    }
} else {
    include_once 'components/director-dashboard.php';

}
?>
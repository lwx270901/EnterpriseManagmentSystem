<!-- (file for reusable functions used throughout the application) -->
<?php
function logout()
{
    session_destroy();
    unset($_SESSION['user']);
    unset($_SESSION['user_id']);
    unset($_SESSION['role']);
    header('Location: index.php');
}
?>
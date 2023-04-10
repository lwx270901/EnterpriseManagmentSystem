<!-- (file for reusable functions used throughout the application) -->
<?php
function logout()
{
    session_destroy();
    unset($_SESSION['user']);
    header('Location: index.php');
}
?>
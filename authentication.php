<?php session_start();
// user can't access to dashboard until user logged in:
if(!isset($_SESSION['authentication'])) {
    $_SESSION['authentication_status'] = 'Login to Access Dashboard';
    header("Location: index.php");
    exit(0);
}

?>
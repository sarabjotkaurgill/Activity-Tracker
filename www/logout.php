<?php
session_start(); /* Starts the session */

unset($_SESSION['userid']);
//session_destroy(); /* Destroy started session */

header("location:index.php");  /* Redirect to login page */
exit;


?>
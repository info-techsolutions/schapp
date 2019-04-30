<?php
session_start(); //Start the current session
session_name('Parent');
include_once('../inc/config.php'); //Initiate the MySQL connection
session_destroy(); //Destroy it! So we are logged out now
header("location:../public/?msg=Successfully Logged out"); // Move back to login.php with a logout message
?>

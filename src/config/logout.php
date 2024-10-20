<?php
session_start(); // Start the session
session_unset(); // Unset all session variables
session_destroy(); // Destroy the session
header("Location: ../pages/auth/user/login.php"); // Redirect to homepage
exit();
?>
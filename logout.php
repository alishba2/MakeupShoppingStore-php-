<?php
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the desired page after logout
header('Location: home.php'); // Replace "home.php" with the desired page

exit();
?>

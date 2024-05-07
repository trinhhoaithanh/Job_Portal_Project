<?php
session_start();
session_unset(); // Unset all session variables
session_destroy(); // Destroy the session

// Redirect to login page or any other page after logout
header("Location: ./index.php?page=login");
exit();
?>
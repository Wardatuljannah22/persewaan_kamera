<?php
session_start();

$_SESSION["user_id"] = $row['user_id'];
// $_SESSION["username"] = $Username;
// $_SESSION["level"] = $level;
unset($_SESSION["user_id"]);
session_unset();
session_destroy();
header("location:login.php")
?>
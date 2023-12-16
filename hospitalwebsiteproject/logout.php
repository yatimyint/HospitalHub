<?php
session_start();

session_destroy();

header("Location: patients-login.php");
exit();
?>
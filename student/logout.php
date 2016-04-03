<?php
session_start();
$_SESSION["ID"] = 0000000;
session_destroy();
header("Location: login.html"); 
?>

<?php
session_start();
$_SESSION["test"] = "test";
header("Location: session_test_g.php");
exit;
 ?>

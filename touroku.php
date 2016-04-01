<?php
session_start();
if(empty($_SESSION["ID"]))
{
  header("Location: login.html");
}
require_once ("../db_connect.php");
$id = $_SESSION["ID"];
$lab_code = $_POST["hope_lab_id"];
$std_pr = $_POST["std_pr"];

$sql_code = "UPDATE assignment SET hope_lab_id = $lab_code,reason = $std_pr WHERE $id = stu_id;";
$result = mysqli_query($link, $sql_code);
if($result){
    print "登録成功";
}
else{
    print "ERROR!";
}
?>

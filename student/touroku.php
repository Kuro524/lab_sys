<?php
session_start();
if(empty($_SESSION["ID"]))
{
  header("Location: login.html");
}
require_once ("../db_connect.php");
$id = $_SESSION["ID"];
$lab_code = $_POST["hope_lab_id"];
$std_pr = $_POST["stu_pr"];

$sql_code = "UPDATE assignment SET hope_lab_id = '$lab_code',reason = '$std_pr' WHERE stu_id = '$id';";
$result = mysqli_query($link, $sql_code);
if($result){
    print "<h1>登録成功</h1>";
    print "3秒後に画面が遷移します。お待ち下さい。";
    print '<meta http-equiv="refresh" content="3;URL=system.php">';
    exit;
}
else{
    print "<h1>ERROR!</h1>";
    print "管理者@神林研究室 小西航太までお問い合わせ下さい！<br />";
    print 'お問い合わせは<a href="mailto:c1145217@cstu.nit.ac.jp">こちら</a>';
    exit;
}
?>

<?php
require_once ("../../../data/db_info.php");
$link = mysqli_connect($server, $user, $password, $dbname);  //ここでDBへのアクセスを試みている(mysql_connect関数による)

if ( mysqli_connect_errno() > 0 ) {
    die("接続失敗\n");
    exit;
}
else{
  //print "<h1>接続に成功しました</h1>";                      //デバッグに時に使用
}
mysqli_set_charset($link, "utf8");
?>

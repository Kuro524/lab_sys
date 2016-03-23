<?php
header("Content-type: text/html; charset=UTF-8");
require_once ("../db_connect.php");
$id = mysqli_real_escape_string($link, $_POST["prf_id"]);
$passwd = mysqli_real_escape_string($link, $_POST["passwd"]);

$sql_code = "SELECT professor.id FROM professor WHERE $id = professor.id AND $passwd = professor.passwd;"
$result = mysqli_query($link, $sql_code);

if (mysqli_affected_rows($link) < 1 OR mysqli_affected_rows($link) > 2){
    echo '<meta http-equiv="refresh" content="0;URL=login.html">';
}
else{
    //結局セッションにしました。各phpプログラムでは必ずsession_start()関数を利用して前画面での$_SESSION["hoge"]値の作成を確認し、もしsession切れならば必ずログイン画面まで戻してしまってください。また、ログイン画面に戻す前にかならずセッションは明示的に破棄(→session_destroy()関数による)してください
    session_start();
    $_SESSION["ID"] = $id;
    header("Location: 学生採用画面.php");
    exit;
    //ここでプロフィール登録画面に向けてsessionidとして学籍番号を送信。プロフィール登録画面側では$_SESSION["ID"]から学籍番号を受け取って利用すること。なお、$_SESSION["ID"]に値がない場合にはログイン画面にリダイレクト。
}
 ?>

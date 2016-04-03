<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>日本工業大学 工学部情報工学科 研究室配属システム</title>
    <META http-eqiuv="Content-Type" content="text/html; charset=Shift_JIS">
    <link href="system.css" rel="stylesheet" type="text/css" media="screen">
    <?php
      error_reporting(E_ALL);
      header("Content-type: text/html; charset=UTF-8");
      require_once ("../db_connect.php");
      session_start();
      if(empty($_SESSION["ID"]))
      {
        //header("Location: login.html");
      }
    ?>
  </head>
  <body>
    <div id="wrapper">
      <!--===============▼ ヘッダー ===============-->
      <div id="header">
        <h1>情報工学科 研究室配属システム</h1>
        <h2>Computer and Information Engineering Laboratory Registration System</h2>
        <!-- 画像にするかもしれないね
        <img src="XXX" alt="XXX"> -->
      </div>
      <!--===============▲ ヘッダー以上 ===============-->

      <!--===============▼ メイン ===============-->
      <div id="main">

        <!--===============▼ ナビゲーションバー ===============-->
        <!-- main_right とかのがいいか？ -->
        <div id="nav">
          <h3>リンク</h3>
          <ul>
            <li><a href="">linux-dash</a></li>
            <li><a href="">バグ報告リンク</a></li>
          </ul>
        </div>
        <!--===============▲ ナビゲーションバー以上 ===============-->

        <!--===============▼ メイン左側 ===============-->
        <div id="main_left">
          <h3>現在募集中の研究室</h3>

        </div>
        <!--===============▲ メイン左側以上 ===============-->

      </div>


    <div id="footer">
      <p>&copy 2015-2016 team NULL with OWADA,Kana All Rights Reserved.<p>
    </div>
  </body>
</html>

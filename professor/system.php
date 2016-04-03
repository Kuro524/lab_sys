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
        header("Location: prf_login.html");
      }
      if(strlen($_SESSION["ID"]) != 2)
      {
        header("Location: prf_login.html");
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

      <!--===============▼ ログイン状況 ===============-->
      <div id="user">
        <p>
          ユーザー : <!--ログインしてる人の名前とか-->
          <?php
            //session_start();
            $id = $_SESSION["ID"];
            $sql_code = "SELECT professor.name,lab.name FROM professor,lab WHERE $id = professor.id AND $id = lab.prf_id;";
            $result = mysqli_query($link, $sql_code);
            while ($data = mysqli_fetch_array($result)){
                print " " . $data[0] . "@" . $data[1];
            }
          ?>
        </p>
        <p>
          <a href="logout.php">ログアウト</a>
        </p>
      </div>
      <!--===============▲ ログイン状況以上 ===============-->

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
          <h3>登録</h3>
          <p>
            採用学生の登録
          </p>
          <a href="appointment.php" class="button">登録する</a>

          <h3>応募状況</h3>
          <p>
            <!--（例）<br>
            名前  ： 山田花子<br>
            配属先： ○○研究室<br>-->
            <?php
              //$sql_code = "SELECT assignment.stu_id,student.name,student.name_ruby,course.name FROM student,assignment,course WHERE $id = assignment.hope_lab_id AND student.id = assignment.stu_id AND (student.s_course_cd = course.code OR student.s_course_cd is NULL);";
              $sql_code = "SELECT assignment.stu_id,student.name,student.name_ruby,course.name FROM (student,assignment) LEFT OUTER JOIN course ON student.s_course_cd = course.code WHERE $id = assignment.hope_lab_id AND student.id = assignment.stu_id;";
              $result = mysqli_query($link, $sql_code);

              if(mysqli_affected_rows($link) < 1){
                print "<br />" . "現在の応募者はいません。";
              }
              else{
                while ($data = mysqli_fetch_array($result)){
                    if (is_null($data[3])){
                      print $data[0] . " ： " . $data[1] . " (". $data[2] .")" . " @ " . "コース未配属" ."<br />";
                    }
                    else{
                      print $data[0] . " ： " . $data[1] . " (". $data[2] .")" . " @ " . $data[3] ."<br />";
                    }
                }
                print "<br />" . "以上 " . mysqli_affected_rows($link) . "名が当研究室へ応募しています。";
              }
            ?>
          </p>

          <h3>採用状況</h3>
          <p>
            <?php
              $sql_code = "SELECT assignment.stu_id,student.name,student.name_ruby,course.name FROM (student,assignment) LEFT OUTER JOIN course ON student.s_course_cd = course.code WHERE $id = assignment.judge_lab_id AND student.id = assignment.stu_id;";
              $result = mysqli_query($link, $sql_code);

              if(mysqli_affected_rows($link) < 1){
                print "<br />" . "現在、採用した学生はいません。";
              }
              else{
                while ($data = mysqli_fetch_array($result)){
                    if (is_null($data[3])){
                      print $data[0] . " ： " . $data[1] . " (". $data[2] .")" . " @ " . "コース未配属" ."<br />";
                    }
                    else{
                      print $data[0] . " ： " . $data[1] . " (". $data[2] .")" . " @ " . $data[3] ."<br />";
                    }
                }
                print "<br />" . "以上 " . mysqli_affected_rows($link) . "名を採用しています。";
              }
            ?>
          </p>

          <h3>Topics</h3>

          <!--===============▼ コンテンツ ===============-->
            <!--<div id="contents">

              <div class="contents_box">
                <a href=""><img src="img/CN_img.jpg" class="contents_img" alt="CN">
                <div class="contents_text"><p>○○研究室</p></div></a>
              </div>

              <div class="contents_box">
                <a href=""><img src="img/SD_img.jpg" class="contents_img" alt="SD">
                <div class="contents_text"><p>○○研究室</p></div></a>
              </div>

              <div class="contents_box">
                <a href=""><img src="img/HM_img.jpg" class="contents_img" alt="HM">
                <div class="contents_text"><p>○○研究室</p></div></a>
              </div>

              <div class="contents_box">
                <a href=""><img src="img/CN_img.jpg" class="contents_img" alt="CN">
                <div class="contents_text"><p>○○研究室</p></div></a>
              </div>

              <div class="contents_box">
                <a href=""><img src="img/SD_img.jpg" class="contents_img" alt="SD">
                <div class="contents_text"><p>○○研究室</p></div></a>
              </div>

              <div class="contents_box">
                <a href=""><img src="img/HM_img.jpg" class="contents_img" alt="HM">
                <div class="contents_text"><p>○○研究室</p></div></a>
              </div>

          </div>-->
            <!--===============▲ コンテンツ ===============-->

        </div>
        <!--===============▲ メイン左側以上 ===============-->

      </div>
      <!--===============▲ メイン以上 ===============-->

    </div>

    <!-- フッター -->
    <div id="footer">
      <p>&copy 2015-2016 team NULL with OWADA,Kana All Rights Reserved.<p>
    </div>
  </body>
</html>

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <title>登録情報確認結果</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">

    <!-- bootstrap.min.css -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <style>
      table {
        border-collapse: collapse;
        margin-left:         auto;
        margin-right:        auto;
        margin-bottom:       15px;
        width: 1000px;
        height: 250px;
        font-size: 29pt;
      }
      th {
        font-weight: normal;
        color: #FFFFFF;
        background-color: #ff9220;
        border:1px dashed  #c7c7c7;
        text-align: center;
        padding: 5px;
      }
      td {
        color: #787878;
        border: dashed 1px #c7c7c7;
        padding: 5px;
        text-align: center;
      }
    </style>

    <script src="js/vendor/modernizr-2.6.2.min.js"></script>
  </head>
  <body>
    <div id="header">
        <!--サイトのヘッダーとかはここに書こう-->
    </div>
    <div class="container">
      <?php
        header("Content-type: text/html; charset=UTF-8");
        require_once ("../db_connect.php");

        session_start();
        $id=$_SESSION[ID];

        $sql_code="SELECT student.name, student.s_course_cd, student.photo, student.email, assignment.hope_lab_id, assignment.judge_lab_id FROM student LEFT OUTER JOIN assignment ON student.id = assignment.stu_id WHERE student.id =  '$id';"
        $result=mysqli_query($link, $sql_code);

        if (mysqli_affected_rows($link) < 1){
            echo '<meta http-equiv="refresh" content="0;URL=login.html">';
        }
        else{
            print "<table>\n";
            print "<tr><th>学籍番号</th><th>氏名</th><th>ﾌﾘｶﾞﾅ</th><th>所属コース</th></tr>\n";
            while ($data = mysqli_fetch_array($result)) {
                if (is_null($data[3])){
                    print "<tr><td>" . $data[0] . "</td><td>" . $data[1] . "<td>" .
                    $data[2] . "</td><td>未配属</td></tr>\n";
                }
                else{
                    print "<tr><td>" . $data[0] . "</td><td>" . $data[1] . "<td>" .
                    $data[2] . "</td><td>" . $data[3] . "</td></tr>\n";
                }
            }
            print "</table>";
        }

        mysqli_free_result($result);
        mysqli_close($link);
      ?>

      <a href="mailto:c1145217@cstu.nit.ac.jp" class="btn btn-danger btn-lg col-md-offset-9">間違いを報告する</a>
      <footer style="padding: 20px 0;">
        <div class="container" style="text-align: center;">
            Copyright © 2015 Team /* NULL */ All Rights Reserved
        </div>
      </footer>
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
      <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
      <script src="js/plugins.js"></script>
      <script src="js/main.js"></script>
      <script src="bootstrap/js/bootstrap.min.js"></script>
    </div>
  </body>
</html>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <title>Bootstrap3 Componets Tutorial</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">

    <!-- bootstrap.min.css -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
      /* Navbarを固定しているので、その分空ける */
      body{
        padding-top: 70px;
      }

      hr{
        margin: 60px 0;
      }

      /* オリジナルボタンスタイル */
      .btn-origin {
        color: #fff;
        background-color: #FF5295;
        border-bottom: 2px solid #BA3D6D;
        -webkit-border-radius: 0;
        -moz-border-radius: 0;
        border-radius: 0;
      }
      .btn-origin:hover{
        color: #fff;
        border-bottom: none;
        margin-top: 2px;
      }

      /* Navbarのオリジナルスタイル */
      .navbar-default {
        border: none;
      }
      .navbar-origin {
        background: none;
        border-top: 1px solid #eee;
        border-bottom: 1px solid #eee;
      }
      .navbar-origin .navbar-brand {
        padding: 0 15px;
        line-height: 90px;
        height: 90px;
        font-size: 28px;
        font-weight: 100;
      }
      .navbar-origin .navbar-nav>li>a {
        padding-top: 0;
        padding-bottom: 0;
        line-height: 90px;
        font-weight: 200;
        color: #A5A5A5;
      }
      .navbar-origin .navbar-nav>li>a:hover{
        color: #E42121;
        border-bottom: 1px solid #E42121;
        line-height: 89px;
      }
      .navbar-origin .navbar-nav>.open>a,
      .navbar-origin .navbar-nav>.open>a:hover,
      .navbar-origin .navbar-nav>.open>a:focus {
        background: none;
        color: #E42121;
      }
      .navbar-origin .navbar-nav>li>.dropdown-menu {
        margin-top: 0;
        border-top-center-radius: 0;
        border-top-left-radius: 0;
        border-top: 1px solid #E42121;
      }
      .navbar-origin .dropdown-menu {
        padding: 0;
      }
      .navbar-origin .dropdown-menu li a {
        padding: 15px;
        color: #777;
      }
      .navbar-origin .dropdown-menu li.divider {
        padding: 0;
        margin: 0;
      }

      .controls input{
        margin-bottom: 10px;
      }
    </style>

    <script src="js/vendor/modernizr-2.6.2.min.js"></script>
  </head>
  <body>
    <div class="container">
      <!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
      <![endif]-->

      <?php
        header("Content-type: text/html; charset=UTF-8");
        require_once ("db_connect.php");

        session_start();
        $id=$_SESSION["ID"];

        $sql_code="SELECT student.photo,student.id,student.name,student.name_ruby,assignment.reason FROM student LEFT OUTER JOIN assignment ON student.id = assignment.stu_id WHERE assignment.hope_lab_id = ( SELECT lab.code FROM lab WHERE lab.prf_id = '$id');";
        $result=mysqli_query($link, $sql_code);


        if(mysqli_affected_rows($link) < 1){
            echo '<meta http-equiv="refresh" content="0;URL=check_id.html">';
        }
        else{
            print "<form action="Detail_check.php" method="post">";
            while ($data = mysqli_fetch_array($result)) {
              //data[0]画像,data[1]学籍番号,data[2]名前,data[3]ｶﾅ読み,data[4]自己PR
              print "<table><tbody><tr>
                    <td rowspan=2><label><input type="checkbox" name="stu_id[]" value="$data[1]"></label></td>
                    <td rowspan=2><div class="form-group">\n";
              if (is_null($data[0])){ //画像が無い時
                print "<img src="NoImage.jpg">\n";
              }
              else{
                print "<img src=" . $data[0] . ">\n";
              }
              print "</div></td>
                    <td><div class="form-group" align="center"><label>" . $data[1] . "</label></div></td>
                    <td><div class="form-group" align="center"><label>" . $data[2] . "</label></div></td>
                    <td><div class="form-group" align="center"><label>" . $data[3] . "</label></div></td>
                    </tr><tr>
                    <td colspan=3><div class="form-group"><label>" . $data[4] . "</label></div></td>
                    </tr></tbody></table>\n";
              /*print "<table><tbody>\n";
              if (is_null($data[0])){ //画像が無い時
                print "<tr>
                      <td rowspan=2><label><input type="checkbox" value="$data[1]"></label></td>
                      <td rowspan=2><div class="form-group"><img src="NoImage.jpg"></div></td>
                      <td><div class="form-group" align="center"><label>" . $data[1] . "</label></div></td>
                      <td><div class="form-group" align="center"><label>" . $data[2] . "</label></div></td>
                      <td><div class="form-group" align="center"><label>" . $data[3] . "</label></div></td>
                      </tr><tr>
                      <td colspan=3><div class="form-group"><label>". $data[4] . "</label></div></td></tr>\n";
              }
              else{
                print "<tr>
                      <td rowspan=2><label><input type="checkbox" value="$data[1]"></label></td>
                      <td rowspan=2><div class="form-group"><img src=". $data[0] ."></div></td>
                      <td><div class="form-group" align="center"><label>" . $data[1] . "</label></div></td>
                      <td><div class="form-group" align="center"><label>" . $data[2] . "</label></div></td>
                      <td><div class="form-group" align="center"><label>" . $data[3] . "</label></div></td>
                      </tr><tr>
                      <td colspan=3><div class="form-group"><label>". $data[4] . "</label></div></td></tr>\n";
              }
              print "</tbody></table>\n";*/
            }
            print "<br><div align="center"><div class="form-group"><button type="submit" class="btn btn-default">確認</button></div></div>\n";
            print "</form>\n";
        }
            mysqli_free_result($result);
            mysqli_close($link);
      ?>



    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>

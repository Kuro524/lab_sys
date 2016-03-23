<!DOCTYPE html>
<html class="no-js">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <title>Bootstrap3 Componets Tutorial</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    <script type="text/javascript" src="js/test.js"></script>
    <!--<div class="head_img"></div>-->
  </head>
  <body>
    <div class="container">
<?php

  $link = mysql_connect('localhost', 'user', 'pass');
  $db_selected = mysql_select_db('database_name', $link);

?>
<h1>確認画面</h1>
    <div class="form-group">
      <body>
        <div class="container">

<!--            <div class="jumbotron col-md-6 col-md-offset-3">-->
          <form role="form" method="post" action="test_id.php">

          <?php
            /*SELECT id,name,name_ruby
            FROM student;*/
            require_once ("db_connect.html");

            $id=$_SESSION[id];

            $sql_code="SELECT student.id, student.name, student.ruby FROM student WHERE $id = student.id;"
            $result=mysqli_query($link, $sql_code);

            if(mysql_affected_rows($link) < 1){
              header("Location: login.html");
            }
            else{
              while($data=mysqli_fetch_array($result)){
                print $data[0] ."  ". $data[1] ." ". $data[2];
              }
            }
            ?>

            <div class="form-group">
              <b>ファイルのプレビュー(.gif .png .jpg .jpeg のみ):</b>
              <div id="preview_field">
                <form>
                  <input type="file" name="file"  onchange="preview(this)" />
                </form>
              </div>


              <div class="form-group">
                <label>自己PR</label><br>
                <?php echo htmlspecialchars($_GET['stu_pr']);?>
                <!--
                <tr>
                  <td><php echo $_POST["stu_pr"] ></td>
                </tr>
              -->
              </div>


              <div class="form-group">
                <label>希望する研究室</label><br>
                <!--選んだやつをここで表示させる-->
                <td><?php echo $_POST["hope_lab_id"] ?></td>


              </div>

              <!--どこへ送信するのか-->
              <div class="form-group">
                <button type="submit" class="btn btn-default">送信</button>
              </div>

              <form action="Registration.html">
                <input type="submit" value="修正">
              </form>
            </div>
          </div>
        </div>
      </form>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>

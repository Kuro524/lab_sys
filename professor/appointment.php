<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <title>学生採用画面</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    <script type="text/javascript" src="js/test.js"></script>
    <?php
      error_reporting(E_ALL);
      header("Content-type: text/html; charset=UTF-8");
      require_once ("../db_connect.php");
      session_start();
      if(empty($_SESSION["ID"]))
      {
        header("Location: prf_login.html");
      }
      $id = $_SESSION["ID"];
    ?>
  </head>
  <body>
    <br />
    <div class="container">
      <?php
        $sql_code = "SELECT assignment.stu_id,student.name,student.name_ruby,course.name,assignment.reason FROM (student,assignment) LEFT OUTER JOIN course ON student.s_course_cd = course.code WHERE $id = assignment.hope_lab_id AND student.id = assignment.stu_id;";
        $result = mysqli_query($link, $sql_code);

        echo '<form role="form" action="check.php" method="post">';
        while ($data = mysqli_fetch_array($result)){
          echo '<div class="jumbotron col-md-8 col-md-offset-2">';
          if (is_null($data[3])){
            print '<label for="exampleInputEmail1">' .$data[0] . " ： " . $data[1] . " (". $data[2] .")" . " @ " . " 未配属 " . '</label>';
          }
          else{
            print '<label for="exampleInputEmail1">' .$data[0] . " ： " . $data[1] . " (". $data[2] .")" . " @ " . $data[3] . '</label>';
          }
          echo '<div class="form-group">';
          echo '<label for="exampleInputEmail1">自己PR</label>';
          if (empty($data[4])){
            echo '<textarea class="form-control" rows="3" type="text" readonly>' . "未記入" . '</textarea>';
          }
          else{
            echo '<textarea class="form-control" rows="3" type="text" readonly>' . $data[4] . '</textarea>';
          }
          echo '</div>';
          echo '<div class="form-group">';
          echo '<label for="exampleInputEmail1">この学生を採用する　</label>';
          echo '<input type="checkbox" name="ap_stu_id[]" value="' . $data[0] . '">';
          echo '</div>';
          echo '</div>';
        }
        echo '<div class="form-group">';
        echo '<div class="col-sm-offset-2 col-sm-10">';
        echo '<button type="submit" class="btn btn-info">登録内容を確認する</button>';
        echo '</div>';
        echo '</div>';
        echo '</form>';
      ?>
    </div>
  </body>
</html>

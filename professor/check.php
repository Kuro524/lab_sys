<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <title>採用確認画面</title>
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
      $stu_id = $_POST["ap_stu_id"];
    ?>
  </head>
  <body>
    <br />
    <div class="container">
      <form role="form" action="prf_touroku.php" method="post">
        <?php
          for($i = 0; $i < sizeof($stu_id); $i++){
            $sql_code = "SELECT assignment.stu_id,student.name,student.name_ruby,course.name FROM (student,assignment) LEFT OUTER JOIN course ON student.s_course_cd = course.code WHERE $stu_id[$i] = student.id AND student.id = assignment.stu_id;";
            $result = mysqli_query($link, $sql_code);
            while ($data = mysqli_fetch_array($result)){
              echo '<div class="jumbotron col-md-8 col-md-offset-2">';
              if (is_null($data[3])){
                print '<label for="exampleInputEmail1">' . $data[0] . " ： " . $data[1] . " (". $data[2] .")" . " @ " . "コース未配属" ."</label>";
              }
              else{
                print '<label for="exampleInputEmail1">' . $data[0] . " ： " . $data[1] . " (". $data[2] .")" . " @ " . $data[3] ."</label>";
              }
              print '<input type="hidden" name="stu_id[]" value="' . $stu_id[$i] . '">';
              echo '</div>';
            }
          }
        ?>
        <div class="form-group col-md-8 col-md-offset-2">
            <label for="exampleInputEmail1">採用学生への連絡事項</label>
            <textarea class="form-control" rows="3" type="text" name="memo" placeholder="採用した学生への連絡事項がある場合にはご記入下さい。(空白も可)"></textarea>
        </div>
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-info">この情報を登録する</button>
          <a href=""><button class="btn btn-danger">この情報を修正する</button></a>
        </div>
      </form>
    </div>
  </body>
</html>

<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="chrome=1">
      <title>情報確認画面</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <link rel="stylesheet" href="css/normalize.css">
      <link rel="stylesheet" href="css/main.css">

      <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
      <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
      <script src="js/vendor/modernizr-2.6.2.min.js"></script>
      <script type="text/javascript" src="js/test.js"></script>
      <?php
        session_start();
        if(empty($_SESSION["ID"]))
        {
          header("Location: login.html");
        }
        require_once ("../db_connect.php");
        $id = $_SESSION["ID"];
      ?>
    </head>
    <body>
      <div class="container">
        <div class="jumbotron col-md-8 col-md-offset-2">
          <form role="form" action="Confirmation.php" method="post">
            <div class="form-group">
              <label for="exampleInputEmail1">自己PR</label>
              <textarea class="form-control" rows="3" type="text" name="stu_pr" readonly><?php echo $_POST["stu_pr"]; ?></textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">配属を希望する研究室</label>
              <textarea class="form-control" type="text" name="hope_lab_id" readonly>
                <?php
                  $lab_code = $_POST["hope_lab_id"];
                  $sql_code = "SELECT lab.name FROM lab WHERE $lab_code = lab.code;";
                  $result = mysqli_query($link, $sql_code);
                  while ($data = mysqli_fetch_array($result)){
                      print $data[0];
                  }
                ?>
              </textarea>
            </div>
            <button type="submit" class="btn btn-info">この情報で登録する</button>
            <a href=""><button class="btn btn-danger">この情報を修正する</button></a>
          </form>
        </div>
      </div>
    </body>
</html>

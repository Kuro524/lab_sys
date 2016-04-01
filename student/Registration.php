<!DOCTYPE html>
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
        <?php
          session_start();
          if(empty($_SESSION["ID"]))
          {
            header("Location: login.html");
          }
         ?>
        <body>
          <div class="container">

<!--            <div class="jumbotron col-md-6 col-md-offset-3">-->
            <form role="form" method="post" action="test_id.php">

            <?php
              /*SELECT id,name,name_ruby
              FROM student;*/
              require_once ("../db_connect.php");
              $id=$_SESSION["ID"];

              $sql_code="SELECT student.id, student.name, student.name_ruby FROM student WHERE $id = student.id;";
              $result=mysqli_query($link, $sql_code);

              if(mysqli_affected_rows($link) < 1){
                //header("Location: login.html");
                echo $id;
                exit;
              }
              else{
                while($data=mysqli_fetch_array($result)){
                  print $data[0] ."  ". $data[1] ." ". $data[2];
                }
              }
              ?>


            <!--次のページに画像を表示したい。進行率0%-->
            <div class="form-group">
              <b>ファイルのプレビュー(.gif .png .jpg .jpeg のみ):</b>
              <div id="preview_field">
                <form>
                  <input type="file" name="stu_photo"  onchange="preview(this)" />
                </form>
              </div>

              <form action="Confirmation.php" method="get">
                <div class="form-group">
                  <label>自己PR</label><br>
                  <input type="text" name="stu_pr">
                </div>
              </form>
                  <!--
                  テキストエリアでやりたい(願望)
                    <textarea name="stu_pr" class="form-control" rows="3"placeholder="記述は自由"></textarea>
                </div>
              -->

                <!--post関数を使う。一応進行率100%。完成-->
                <form action="Confirmation.php" method="post">
                  <div class="form-group">
                    <label class=exampleInputtext>希望する研究室</label>
                    <select name="hope_lab_id" class="form-control" required>
                      <option value="">選択してください</option>
                      <option value="01">高瀬研究室</option>
                      <option value="02">神林研究室</option>
                      <option value="03">粂野研究室</option>
                      <option value="04">山地研究室</option>
                      <option value="05">江藤研究室</option>
                      <option value="06">橋浦研究室</option>
                      <option value="07">松浦研究室</option>
                      <option value="08">勝間田研究室</option>
                      <option value="09">辻村研究室</option>
                      <option value="10">北久保研究室</option>
                      <option value="11">新藤研究室</option>
                      <option value="12">松田研究室</option>
                      <option value="13">石原研究室</option>
                      <option value="14">中村研究室</option>
                      <option value="15">大橋研究室</option>
                      <option value="16">佐藤研究室</option>
                      <option value="17">丹羽研究室</option>
                      <option value="18">正道寺研究室</option>
                      <option value="19">市川研究室</option>
                      <option value="20">丸山研究室</option>
                    </select>
                  </div>
                </form>
                  <div class="form-group">
                  <!--<button type="submit" class="btn btn-info">送信</button>-->
                  <!--確認画面へ遷移-->
                  <form action="Confirmation.html">
                    <input type="submit" value="確認画面へ">
                  </form>
                </div>
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

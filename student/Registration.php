<!DOCTYPE html>
 <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <title>情報登録画面</title>
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
     ?>
  </head>
  <body>
    <div class="container">
     <div class="jumbotron col-md-8 col-md-offset-2">
       <form role="form" action="Confirmation.php" method="post">
         <div class="form-group">
           <label for="exampleInputEmail1">自己PR</label>
           <textarea class="form-control" rows="3" type="text" name="stu_pr" placeholder="日本語か英語で150字まで程度(記述自由。空白も可。)"></textarea>
         </div>
         <div class="form-group">
           <label for="exampleInputEmail1">配属を希望する研究室</label>
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
         <button type="submit" class="btn btn-info">送信内容を確認する</button>
       </form>
     </div>
    </div>
  </body>
 </html>

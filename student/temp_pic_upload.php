<?php
//htmlのフォーム側の指定では、name をupfileにしている場合の例です。
if (is_uploaded_file($_FILES["upfile"]["tmp_name"])) {
  if (move_uploaded_file($_FILES["upfile"]["tmp_name"], "files/" . $_FILES["upfile"]["name"])) {
    chmod("files/" . $_FILES["upfile"]["name"], 0644);  //←これのnameをきちんとした（？）名前にしよう。アップロードファイルの名前になるよ。
    //echo $_FILES["upfile"]["name"] . "をアップロードしました。"; //debug用
  }
  else {
    //echo "ファイルをアップロードできません。";                   //debug用
  }
}
else {
  //echo "ファイルが選択されていません。";                         //このphp自体、そもそもファイルなしでは呼べない用にしよう。
}
 ?>

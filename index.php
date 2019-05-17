<?php
// セッションを開始する
session_start();
// トークンを発行する
$token = md5(uniqid(rand(), true));
// トークンをセッションに保存
$_SESSION['token'] = $token;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
  <div class="container">
  <div class="content">
  <h2 class="top-title">ファイルアップロードツール</h2>
    <form class="form-area" action="fileTransfer.php" method="post" enctype="multipart/form-data">
     <input type="hidden" name="token" value="<?=$token?>">
      <div id="drag-drop-area">
      <!-- ここから -->
        <div class="drag-drop-inside">
              <div class="drag-drop-area" id="dropArea">
              <p>ここにファイルをドロップ</p>
                <p class="atencion-text">本サイトにアップロードしたデータへの責任は一切負いかねます。</p>
                <p class="atencion-text">再度ファイルを選択またはドロップするとリセットされてしまいます。<br>
              改善に努めます。ご容赦ください。</p>
              </div>
        </div>
        <!-- ここまでがドロップ範囲　要css適用 -->
        <input name="upload[]" id="fileInput" type="file" value="ファイルを選択"  onChange="printfile(),printDragFiles()" multiple >
        <div class="pre-uploadList" id="result"></div>
            <div class="submit-btn-area">
            <input class="submit-btn" type="submit" value="アップロード">
          </div>
      </div>
    </form>
  </div>
  </div>
  </body>
  <script src="js/drag_and_drop.js"></script>
  <script src="js/multiFile.js"></script>
</html>

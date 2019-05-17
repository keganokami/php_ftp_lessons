<?php
 require "session.php";
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
  <p class="atencion-text">以下のリンクからファイルをダウンロードできます。<br>
  ※共有する場合はリンクのアドレスのコピーを使用してください。</p>
  <table class="fileLinkList">
    <tr><th>ダウンロードリスト</th><!-- <th>サイズ</th> --></tr>
    <?php
    // $directory_path = "upload/md5(uniqid(microtime(),1))";
    $directory_path = "upload/";
    if (is_array($_FILES["upload"]["tmp_name"])) {
      // mkdir($directory_path,0777)
        for ( $i=0; $i<count($_FILES["upload"]["tmp_name"]); $i++ ) {
          $file_name = $_FILES['upload']['name'][$i];
          $extension = pathinfo($file_name, PATHINFO_EXTENSION); //拡張子取得
          $tmp_path = $_FILES['upload']['tmp_name'][$i];
          $file_dir_path = $directory_path;
          $uniq_name = date("YmdHis").md5(uniqid(microtime(),1)).session_id() . "." . $extension;
          if (is_uploaded_file($tmp_path)) {
            if(move_uploaded_file( $tmp_path, $file_dir_path . $uniq_name)) {
              chmod($file_dir_path . $uniq_name, 0644);
            } else {
              echo "Error:アップロードできませんでした。";
            }
          }
      
    clearstatcache();//キャッシュクリア
    //ディレクトリの取得(ディレクトリのオープンに失敗したら終了(@はエラーを出力しないようにする))
    $dir=@opendir($file_dir_path) or die('フォルダが開けませんでした。');
    //ディレクトリの走査
    while($file=readdir($dir)){
      //ファイルか？（.や..やディレクトリが除外される）
      if($uniq_name === $file){
        $path=$file_dir_path.$file;
        ?>
        <tr>
          <!-- aタグ　GET fileにディレクトリー内のファイルリンクを格納する。クリックでgetパラメータで取得する。 -->
          <td><a href="script/download.php?file=<?=$file?>"><?=$file?></a></td></td>
          <!-- <td><?=round(filesize($path)/1024)?>kb</td> -->
        </tr>
        <?php
      }
    }
    closedir($dir);
  }
}
  
    ?>
  </table>
  <a class="backLInk" href="index.php">アップロードページに戻る</a>
  </div>
  </div>
  </body>
</html>

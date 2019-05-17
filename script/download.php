<?php

// ファイルをダウンロードする機能
const DOC_ROOT='../upload/';
$isContain=false; //フラグ
/*
ホワイトリストとなるディレクトリを指定
(このディレクトリ以外のファイルはダウンロードさせない)
*/
$dir=opendir(DOC_ROOT);
//ディレクトリの走査
// readdir関数を使用：ポインター走査する。
while($file=readdir($dir)){
  if(is_file(DOC_ROOT.$file)){
    // ファイルがあれば・・・
    $path=DOC_ROOT.$file;//対象となったパスを保存しておく
    //クエリで指定されたファイルがディレクトリにあればOK
    if($_GET['file']===$file){
      //あったのでフラグをtrue
      $isContain=true;
      //抜ける
      break;
    }
  }
}
closedir($dir);//dirを閉じる
//クエリで渡されたファイル名が不正だったら終了
if(!$isContain){
  die('不正なパスが指定されました。');
}
//不正でなければダウンロードする
$filesize = filesize($path);
header('Content-Type:application/octet-stream');
header('Content-Length:'.$filesize);
header('Content-Disposition:attachment;filename='.$file);
readfile($path);

?>

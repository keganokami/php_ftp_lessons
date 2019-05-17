<?php
// セッションを開始する
session_start();
// セッションに入れておいたトークンを取得
$session_token = isset($_SESSION['token']) ? $_SESSION['token'] : '';
// POSTの値からトークンを取得
$token = isset($_POST['token']) ? $_POST['token'] : '';
// トークンがない場合は不正扱い
if ($token === '') {
    header('Location: http://corocoro.moo.jp');
}

// セッションに入れたトークンとPOSTされたトークンの比較
if ($token !== $session_token) {
    header('Location: http://corocoro.moo.jp');
}

// セッションに保存しておいたトークンの削除
unset($_SESSION['token']);
// セッションの保存
session_write_close();
// セッションの再開
session_start();
?>
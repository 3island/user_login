<?php
include('functions.php');

// var_dump($_POST);
// exit();

// !issetで確認
if (
  !isset($_POST['userName']) || $_POST['userName']=='' ||
  !isset($_POST['userPassword']) || $_POST['userPassword']=='' ||
  !isset($_POST['id']) || $_POST['id']=='' 
) {
  exit('ParamError');
}


// ＄_POSTできたデータを変数に入れる
$userName = $_POST['userName'];
$password = $_POST['userPassword'];
$id = $_POST['id'];


// DB接続
$pdo = connect_to_db();


// sql作成＆実行
$sql = 'UPDATE user_table SET userName = :userName, userPassword = :userPassword WHERE id=:id';

$stmt = $pdo->prepare($sql);

// バインド変数を設定
$stmt->bindValue(':userName', $userName, PDO::PARAM_STR);
$stmt->bindValue(':userPassword', $password, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}


// 画面移動
header('Location:read.php');
exit();


?>
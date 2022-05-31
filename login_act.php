<?php
include('functions.php');
session_start();
// var_dump($_POST);
// exit();


$email = $_POST['email'];
$password = $_POST['userPassword'];

// DB接続
$pdo = connect_to_db();

// SQL実行
// username，password，is_deletedの3項目全てを満たすデータを抽出する．
$sql = 'SELECT * FROM user_table WHERE email=:email AND userPassword=:userPassword AND is_deleted=0';
// var_dump($sql);
// exit();

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':userPassword', $password, PDO::PARAM_STR);


try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}


// ユーザ有無で条件分岐
$val = $stmt->fetch(PDO::FETCH_ASSOC);
// var_dump($val);
// exit();
if (!$val) {
  echo "<p>ログイン情報に誤りがあります</p>";
  echo "<a href=login.php>ログイン</a>";
  exit();
} else {
  $_SESSION = array();
  $_SESSION['session_id'] = session_id();
  $_SESSION['is_admin'] = $val['is_admin'];
  $_SESSION['userName'] = $val['userName'];
  $_SESSION['email'] = $val['email'];
  $_SESSION['userPassword'] = $val['userPassword'];
  header("Location:user.php");
  exit();
}
?>
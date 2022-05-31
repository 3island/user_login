<?php
include('functions.php');
// var_dump($_GET);
// exit();

$id = $_GET['id'];
// var_dump($id);
// exit();


// DB接続
$pdo = connect_to_db();


// sql作成＆実行
$sql = 'SELECT * FROM user_table WHERE id = :id';

$stmt = $pdo->prepare($sql);

// バインド変数を設定
$stmt->bindValue(':id', $id, PDO::PARAM_STR);


// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}





?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="update.php" method="POST">
    <fieldset>
      <legend>Edit</legend>
      <a href="read.php">List</a>
      <div>
        userName: <input type="text" name="userName" value="<?= $result['userName']?>"><!---$recordは$sqlから取ってきたデータをfetchした変数--->
      </div>
      <div>
        userPassword: <input type="text" name="userPassword" value="<?= $result['userPassword']?>">
      </div>
      <input type="hidden" name="id" value="<?= $result['id'] ?>">
      <div>
        <button>submit</button>
      </div>
    </fieldset>
  </form>
</body>
</html>
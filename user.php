<?php
  // DB接続
$dbn ='mysql:dbname=user_test_table;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}

// sql作成＆実行 欲しいデータをDBから取ってくる
$sql = 'SELECT userName FROM user_table';
$stmt = $pdo->prepare($sql);

try {
  $status = $stmt->execute();
  // ＄fetch Allで＄resultに入れてforeachで表示したい形式で$outputに入れる
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $userName = '';
  foreach($result as $record) {
    $userName .= "{$record['userName']}";
  }
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
  <link rel="stylesheet" href="css/user.css">
  <title>Document</title>
</head>

<body>
  <div class="container">
    <P><span>Hello!</span><?= $userName ?>さん!</P>
    <a href="https://localhost/G's/user_test_php/login.php?">Login</a>
  </div>
  
</body>

</html>
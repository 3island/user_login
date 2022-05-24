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
$sql = 'SELECT * FROM user_table';
$stmt = $pdo->prepare($sql);

try {
  $status = $stmt->execute();
  // ＄fetch Allで＄resultに入れてforeachで表示したい形式で$outputに入れる
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $output = '';
  foreach($result as $record) {
    $output .= "<tr>
    <td>{$record['id']}</td>
    <td>{$record['userName']}</td>
    <td>{$record['email']}</td>
    <td>{$record['userPassword']}</td>
    <td>{$record['created_at']}</td>
    </tr>";
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Document</title>
  <style>
  a {
    display: block;
    margin: 30px 0;
    text-decoration: none;
  }

  legend {
    font-size: 30px;
    font-weight: bold;
    margin-top: 10px;
  }
</style>
</head>
<body>
  <fieldset>
    <legend>アカウント</legend>
    <a href="input.php">入力画面</a>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">name</th>
          <th scope="col">email</th>
          <th scope="col">password</th>
          <th scope="col">created_at</th>
        </tr>
      </thead>
      <tbody>
        <?= $output ?>
      </tbody>
    </table>
  </fieldset>
</body>
</html>
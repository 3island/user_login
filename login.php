<?php
// var_dump($_POST);
// exit();


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


$sql = 'SELECT email, userPassword FROM user_table';
$stmt = $pdo->prepare($sql);

try {
  $status = $stmt->execute();
  // ＄fetch Allで＄resultに入れてforeachで表示したい形式で$outputに入れる
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $email_data = '';
  $password_data = '';
  foreach($result as $record) {
    $email_data .= "{$record['email']}";
  }

  foreach($result as $record) {
    $password_data .= "{$record['userPassword']}";
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
  <link rel="stylesheet" href="css/style.css">
  <title>Document</title>
</head>
<body>
  <div class="container">
    <form>
    <fieldset>
      <legend>Login</legend>

      <!-- email -->
      <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" id="inputEmail3">
        </div>
      </div>

      <!-- password -->
      <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="inputPassword">
        </div>
      </div>


      <div>
        <button id="login">OK</button>
      </div>
      <a href="read.php">一覧画面</a>

      <div id="output"></div>
    </fieldset>
    </form>
  </div>
</body>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>

  // phpから持ってきたデータを変数に入れる
  const email_data = <?= json_encode($email_data) ?>;
  console.log(email_data);

  const password_data = <?= json_encode($password_data) ?>;
  console.log(password_data);


  // emailの入力値
  let email = $('#inputEmail3').val();
  // console.log(email);
  // passwordの入力値
  let password = $('#inputPassword').val();
  // console.log(password);


  // ボタン押すと発火
  $('#login').on('click', function() {

  // emailの入力値
  const email = $('#inputEmail3').val();
  console.log(email);
  console.log($('#inputEmail3').val());
  // passwordの入力値
  const password = $('#inputPassword').val();
  console.log(password);
  console.log($('#inputPassword').val());


  // phpから持ってきたデータを変数に入れる
  const email_data = <?= json_encode($email_data) ?>;
  console.log(email_data);

  const password_data = <?= json_encode($password_data) ?>;
  console.log(password_data);

  // 入力値と登録しているデータと照合
    if (email === email_data && password === password_data) {
      console.log('login ok!');
      // $('#output').text('OK!');
      open("https://localhost/G's/user_test_php/user.php");
    } else {
      console.log('No login!')
      // $('#output').text('NO!');
    }
    
  });


  
</script>
</html>
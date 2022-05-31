<?php
 include('functions.php');
  // include("functions.php");
  session_start();
  check_session_id();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/user.css">
  <title>kise_kae</title>
</head>

<body>
  <div class="container">
    <P><span>Hello!<?="{$_SESSION['userName']}"?></span>さん!</P>
    <a href="https://localhost/G's/user_test_php/login.php?">Login</a>
  </div>
  
</body>

</html>
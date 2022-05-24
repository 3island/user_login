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
    <form action="create.php" method="POST">
    <fieldset>
      <legend>Signup</legend>
      
      <!-- <div>
        UserName: <input type="text" name="userName">
      </div> -->


      <!-- UserName -->
      <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">UserName</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputEmail3" name="userName">
        </div>
      </div>

      <!-- email -->
      <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" id="inputEmail3" name="email">
        </div>
      </div>

      
      <!-- <div>
        Mail: <input type="email" name="email">
      </div> -->


      <!-- password -->
      <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="inputPassword" name="userPassword">
        </div>
      </div>

      <!-- <div>
        Password: <input type="password" name="userPassword">
      </div> -->

      <div>
        <button>OK</button>
      </div>
      <a href="read.php">一覧画面</a>
      <a href="login.php">login</a>
    </fieldset>
    </form>
  </div>

</body>
</html>
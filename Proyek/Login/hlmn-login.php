<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
  <title>Login Salon DTE</title>
</head>
<body>
  <div class="login-wrapper">
    <form action="login.php" class="form" method="post">
      <h2>Login</h2>
      <h2> 
      <?php if (isset($_GET['error'])) { ?>

      <p class="error"><?php echo $_GET['error']; ?></p>

      <?php } ?>
      </h2>
      <div class="input-group">
        <input type="text" name="loginUser" id="loginUser" required>
        <label for="loginUser">User Name</label>
      </div>
      <div class="input-group">
        <input type="password" name="loginPassword" id="loginPassword" required>
        <label for="loginPassword">Password</label>
      </div>
      <input type="submit" name="submit" class="btn btn-primary" value="Submit">
      <a href="#forgot-pw" class="forgot-pw">Does not have an Account?</a>
    </form>

    <div id="forgot-pw">
      <form action="register.php" class="form" method ="POST">
        <a href="#" class="close">&times;</a>
        <h2>Register Here</h2>
        <div class="input-group">
          <input type="text" name="idregis" id="idregis" required>
          <label for="idregis">username</label>
        </div>
        <div class="input-group">
          <input type="password" name="pssword" id="pssword" required>
          <label for="pssword">Password</label>
        </div>
        <input type="submit" name="submit" value="Submit" class="submit-btn">
      </form>
    </div>
  </div>
</body>
</html>
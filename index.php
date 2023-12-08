<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="styles.css" />
  <title>Login</title>
</head>

<body>
  <script>
    <?php
      if (isset($_GET['success'])) echo "alert('Account successfully created!')";
      if (isset($_GET['invalid'])) echo "alert('Invalid account credentials!')";
    ?>
  </script>
  <div class="container-wrapper">
    <div class="container">
      <div class="login-container">
        <h1>Welcome Back!</h1>
        <h3>Login to continue</h3>
        <form action="mainSQL.php" method="POST">
          <input type="text" class="textbox" name="user" placeholder="Username" />
          <input type="password" class="textbox" name="pass" placeholder="Password" />
          <a class="login-btn"><input type="submit" name="signin" class="login-btn" value="Login" /></a>
          <div>
            <span>Don't have an account?</span>
            <span><a href="signup.php">Sign up</a></span>
          </div>
        </form>
      </div>
      <div class="design-container">
        <img src="Resources/Brick design.png" alt="">
      </div>
</body>

</html>
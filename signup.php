<?php require("mainSQL.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="styles.css" />
  <title>Sign Up</title>
</head>

<body>
  <div class="container-wrapper">
    <div class="container">
      <div class="login-container">
        <h1>Create new account</h1>
        <br />
        <form method="POST" action="mainSQL.php">
          <input type="text" class="textbox" name="fName" id="" placeholder="First name" maxlength="15" required/>
          <input type="text" class="textbox" name="lName" id="" placeholder="Last name" maxlength="15" required/>
          <input type="text" class="textbox" name="num" id="" placeholder="Phone number" maxlength="12" required/>
          <input type="text" class="textbox" name="username" id="" placeholder="Username" maxlength="10" required/>
          <input type="password" class="textbox" name="pass" id="" placeholder="Password" maxlength="10" required/>
          <input type="password" class="textbox" name="confPass" id="" placeholder="Confirm password" maxlength="10" required/>
          <?php
              if (isset($_GET['invalid'])) {
                echo "<span>Passwords do not match.</span>";
              }    
            ?>
          <a href="homepage.php" class="login-btn"><input type="submit" name="signup" class="login-btn" value="Sign Up" /></a>
          <div>
            <span>Already have an account?</span>
            <span><a href="index.php">Login</a></span>
          </div>
        </form>
      </div>
      <div class="design-container">
        <img src="Resources/Brick design.png" alt="" />
      </div>
    </div>
  </div>
</body>
<script>
            
        </script>
</html>
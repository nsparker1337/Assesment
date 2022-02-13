<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Sign Up</title>
    <link rel="icon" type="image/x-icon" href="./images/favicon.ico">
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['email'])) {
        // removes backslashes
        $email = stripslashes($_REQUEST['email']);
        //escapes special characters in a string
        $email = mysqli_real_escape_string($con, $email);
        $password    = stripslashes($_REQUEST['password']);
        $password    = mysqli_real_escape_string($con, $password);
        $secret = stripslashes($_REQUEST['secret']);
        $secret = mysqli_real_escape_string($con, $secret);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (email, password, secret, create_datetime)
                     VALUES ('$email', '" . md5($password) . "', '$secret', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Sign Up</h1>
        <p class="link">Already have an Account?<a href="login.php">Sign in</a></p>
        <input type="text" class="login-input" name="email" placeholder="Email Address">
        <input type="password" class="login-input" name="password" placeholder="Password">
        <input type="text" class="login-input" name="secret" placeholder="secret" required />
        <input type="submit" name="submit" value="Sign Up" class="login-button">
        <!-- <p class="link"><a href="login.php">Click to Login</a></p> -->
    </form>
<?php
    }
?>
</body>
</html>
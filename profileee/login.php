<?php 
require 'log.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins&amp;display=swap'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.19.3/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="log.css">

</head>
<body>
    <form action="log.php" id="loginform" method="post">
        <div class="wrapper">
            <div class="login_box">
                <div class="login-header">
                    <span>Login</span>
                </div>
                <div class="input_box">
                    <input type="text" id="email" name="email" class="input-field" placeholder="Email" />
                    <i class="bx bx-user icon"></i>
                    <span id="demo1" style="color: red;">please enter email</span>
                </div>
                <div class="input_box">
                    <input type="password" id="password" name="password" class="input-field" placeholder="Password" />
                    <i class="bx bx-lock-alt icon"></i>
                    <span id="demo2" style="color: red;">please enter password</span>
                </div>
                <div class="remember-forgot">
                    <div class="remember-me">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember" <?php if (isset($_COOKIE["user_login"])) { ?> checked <?php } ?> />

                        <label for="remember">Remember me</label>
                    </div>
                    <div class="forgot">
                        <a href="#">Forgot password?</a>
                    </div>
                </div>
                <div class="input_box">
                    <input type="submit" class="input-submit" value="Login">
                </div>
                <div class="register">
                    <span>Don't have an account? <a href="register.php">Register</a></span>
                </div>
                <?php displayError(); ?>
            </div>
        </div>
    </form>
</body>
<script src="log.js"></script>

</html>
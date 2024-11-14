<?php
session_start();
include 'mydata.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '".md5($password)."'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $_SESSION['id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['firstname'] = $row['firstname'];

        if (!empty($_POST["remember"])) {
            setcookie("user_login", $_POST["email"], time() + (86400*1));
            setcookie("userpassword", $_POST["password"], time() + (86400*1));
        } else {
            if (isset($_COOKIE["user_login"])) {
                setcookie("user_login", "", time() - 3600);
            }
            if (isset($_COOKIE["userpassword"])) {
                setcookie("userpassword", "", time() - 3600);
            }
        }

        
        header('location:newprofile.php');
        exit();
    } else {
      
      $_SESSION['error'] = 'Invalid email or password.';
      header('location: login.php');
      exit();
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="jquery-3.7.1.js"></script>
        
    <style>
        .img-back{
            height: 80%;
        }
        ::placeholder{
            font-size:16px;
            color:lightgray;
        }
    </style>
</head>
<body>
   <form id="data" action="login.php" method="POST">
   <div class="error-message"><?php if(isset($message)) { echo $message; } ?></div>
    <section class="h-100" style="background-color: #9A616D;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
              <div class="card" style="border-radius: 1rem;">
                <div class="row g-0">
                  <div class="col-md-6 col-lg-5 d-none d-md-block">
                    <img src="e241b4abdd1e106982e01f2cb2126146.jpg" alt="login form" class="img-fluid img-back" style="border-radius: 1rem 0 0 1rem;" />
                  </div>
                  <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">
      
                        <div class="d-flex align-items-center mb-3 pb-1">
                          <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                        </div>
                        
                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>
      
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form2Example17">Email address</label>
                          <input type="email" id="email" class="form-control form-control-lg" name="email" value="<?php if(isset($_COOKIE["user_login"])) { echo $_COOKIE["user_login"]; } ?>" placeholder="Enter your email"/>
                          <span id="emailError" style="color: red;">Please enter a valid email</span>
                        </div>
      
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form2Example27">Password</label>
                          <input type="password" id="password" class="form-control form-control-lg" name="password" value="<?php if(isset($_COOKIE["userpassword"])) { echo $_COOKIE["userpassword"]; } ?>" placeholder="Enter password" />
                          <span id="passwordError" style="color: red;">Please enter password</span>
                        </div>

                        <div class="mb-3 form-check">
                          <input type="checkbox" class="form-check-input" id="remember" name="remember" <?php if(isset($_COOKIE["user_login"])) { ?> checked <?php } ?> />
                          <label class="form-check-label" for="remember">Remember me</label>
                        </div>

                        <?php
                                        if (isset($_SESSION['error'])) {
                                            echo '<p class="text-danger">' . $_SESSION['error'] . '</p>';
                                            unset($_SESSION['error']);
                                        }
                                        ?>
                        <div class="pt-1 mb-4">
                          <button class="btn btn-dark btn-lg btn-block w-100" type="submit">Login</button>
                        </div>
      
                    
                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="register.html" style="color: #393f81;">Register here</a></p>
                        <a href="#!" class="small text-muted">Terms of use.</a>
                        <a href="#!" class="small text-muted">Privacy policy</a>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
   </form>
</body>
<script>
    $(document).ready(function () {
        $("#emailError").hide();
        $("#passwordError").hide();

        $("#data").submit(function(e){
            e.preventDefault();

            let email = $("#email").val();
            let password = $("#password").val();
            let isValid = true;

            
            if (email === "") {
                $("#emailError").show();
                isValid = false;
            } else {
                $("#emailError").hide();
            }

            
            if (password === "") {
                $("#passwordError").show();
                isValid = false;
            } else {
                $("#passwordError").hide();
            }

            if (isValid) {
                $("#data").unbind('submit').submit();
            }
       
        });
    });
    </script>        
</html>
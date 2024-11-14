<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Modern Login Form | CodingStella </title>
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins&amp;display=swap'>
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.19.3/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="register.php" id="registrationForm" method="post" enctype="multipart/form-data">
        <div class="wrapper">
            <div class="login_box">
                <div class="login-header">
                    <span>Registration</span>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <!-- First Name -->
                        <div class="input_box">
                            <input type="text" id="fname" name="fname" class="input-field" placeholder="First Name" />
                            <i class="bx bx-user icon"></i>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- Last Name -->
                        <div class="input_box">
                            <input type="text" id="lname" name="lname" class="input-field" placeholder="Last Name" />
                            <i class="bx bx-user icon"></i>
                        </div>
                    </div>
                </div>
                <!-- Email -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="input_box">
                            <input type="email" id="email" name="email" class="input-field" placeholder="Email" />
                            <i class="bx bx-envelope icon"></i>
                        </div>
                    </div>
                </div>


                <!-- Gender -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="input_box">
                            <div class=" input-field">
                                <div class="first">
                                    <input type="radio" id="male" name="gender" value="male" required />
                                    <label for="male">Male</label>
                                    <input type="radio" id="female" name="gender" value="female" required />
                                    <label for="female">Female</label>
                                    <input type="radio" id="other" name="gender" value="other" required />
                                    <label for="other">Other</label>
                                </div>
                            </div>
                            <i class="bx bx-user icon"></i>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <!-- Password -->
                        <div class="input_box">
                            <input type="password" id="password" name="password" class="input-field" placeholder="Password" />
                            <i class="bx bx-lock-alt icon"></i>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- Confirm Password -->
                        <div class="input_box">
                            <input type="password" id="confirm_password" name="confirm_password" class="input-field" placeholder="Confirm Password" />
                            <i class="bx bx-lock-alt icon"></i>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <!-- City Selection -->
                        <div class="input_box">
                            <select name="city" id="city" class="input-field">
                                <option value="">Choose your city</option>
                                <option value="Surat">Surat</option>
                                <option value="Mumbai">Mumbai</option>
                                <option value="Ahmedabad">Ahmedabad</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">

                        <!-- Image Upload -->
                        <div class="input_box">
                            <input type="file" id="image" name="image" class="input-field" />
                        </div>

                    </div>
                </div>






                <!-- Terms and Conditions -->
                <div class="remember-forgot">
                    <div class="remember-me">
                        <input type="checkbox" id="terms" name="terms" required />
                        <label for="terms">I agree to the <a href="#">Terms and Conditions</a></label>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="input_box">
                    <input type="submit" class="input-submit" value="Register">
                </div>

                <!-- Link to Login -->
                <div class="register">
                    <span>Already have an account? <a href="login.php">Login</a></span>
                </div>
            </div>
        </div>
    </form>


</body>

</html>
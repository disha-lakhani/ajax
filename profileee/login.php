
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins&amp;display=swap'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.19.3/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="log.css">

</head>

<body>
    <div id="message" class="mt-3"></div>
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

            </div>
        </div>
    </form>

</body>
<script>
    $(document).ready(function () {
        $.ajax({
        url: 'log.php',
        type: 'POST',
        data: { check_login: true },
        dataType: 'json',
        success: function (response) {
            if (response.status === 'already_logged_in') {
                $('#message').html(
                    '<div class="alert alert-info">' + response.message + '</div>'
                );
            }
        },
        error: function (xhr, status, error) {
            console.error('AJAX Error:', status, error);
        }
    });


        $('#loginform').on('submit', function (e) {
            e.preventDefault();

            const submitBtn = $(this).find('input[type="submit"]');
            submitBtn.prop('disabled', true).val('Logging in...');

            $.ajax({
                url: 'log.php',
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function (response) {
                    console.log(response);

                    submitBtn.prop('disabled', false).val('Login');
                    if (response.status === 'success') {
                        $('#message').html('<div class="alert alert-success">' + response.message + '</div>');
                        console.log('Redirecting to:', response.redirect);
                        setTimeout(function () {
                            window.location.href = response.redirect;
                        }, 2000);
                    }
                   
                    else {
                        $('#message').html('<div class="alert alert-danger">' + response.message + '</div>');
                    }
                },
                error: function (xhr, status, error) {
                    submitBtn.prop('disabled', false).val('Login');
                    console.error('AJAX Error:', status, error);
                    $('#message').html('<div class="alert alert-danger">An error occurred while processing the request.</div>');
                }
            });
        });
    });

</script>
<script src="log.js"></script>

</html>
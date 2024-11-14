<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">


    <style>
        .divider-text {
            position: relative;
            text-align: center;
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .divider-text span {
            padding: 7px;
            font-size: 12px;
            position: relative;
            z-index: 2;
        }

        .divider-text:after {
            content: "";
            position: absolute;
            width: 100%;
            border-bottom: 1px solid #ddd;
            top: 55%;
            left: 0;
            z-index: 1;
        }

        .btn-facebook {
            background-color: #405D9D;
            color: #fff;
        }

        .btn-twitter {
            background-color: #42AEEC;
            color: #fff;
        }

        .left-img {
            max-width: 100%;
            height: 100%;
            margin: 0 8px;

        }

        .card {
            border: none;
            width: 100%;
            height: 100%;
        }

        .card-body {
            margin: 0 60px;
        }

        .col-md-6 {
            padding: 0;
        }

        .form-container {
            float: left;
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
            height: auto;
            background: url(img4.webp);
            background-size: cover;
            box-sizing: border-box;

        }

        body {
            background-color: #405D9D;
        }

        .right {
            float: right;
            height: auto;
            box-sizing: border-box;
        }

        .card {
            width: 100%;
            box-sizing: border-box;
            height: auto;
            background-color: #fff;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .container {
            margin-top: 50px;
        }

        .radio-inline {
            padding: 0 25px;

        }

        .checkbox-inline {
            padding: 0 10px;
        }

        label {
            margin-bottom: 0;
        }
    </style>
</head>

<body>
    <div class="container mx-auto">
        <div class="row">
            <div class="col-md-12 form-container">
            </div>
            <!-- Right Side: Form -->
            <div class="col-md-6 mx-auto mt-5">
                <div class="card bg-light">
                    <article class="card-body " style="max-width: 1000px;">
                        <h4 class="card-title mt-2 mb-3 text-center"> ADD STUDENT DETAILS</h4>
                        <form action="insert.php" method="post" id="stddata" enctype="multipart/form-data">
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                </div>
                                <input name="fname" id="fname" class="form-control" placeholder="First name" type="text">
                            </div>
                            <span id="demo1" style="color: red;">Please enter Full name</span>
                            
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                                </div>
                                <input name="email" id="email" class="form-control" placeholder="Email address" type="text">
                            </div>
                            <span id="demo3" style="color: red;">Please enter valid email address</span>
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                                </div>
                                <input name="contact" id="contact" class="form-control" placeholder="Phone number" type="text">
                            </div>
                            <span id="demo4" style="color: red;">Please enter mobile number (only 10 digits allowed)</span>
                         
                           
                           
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">SAVE</button>
                            </div>
                        </form>
                        <p class="divider-text">
                            <span class="bg-light">OR</span>
                        </p>
                        <p>
                            <a href="" class="btn btn-block btn-twitter"> <i class="fab fa-google"></i>   Login via Google</a>
                            <a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Login via Facebook</a>
                        </p>
                    </article>
                </div>
            </div>
        </div>
    </div>



    <!-- validation -->
    <script>
        $(document).ready(function() {
            $("#demo1").hide();
            $("#demo3").hide();
            $("#demo4").hide();

            $("#stddata").submit(function(e) {
                var isValid = true;

                function showError(elementId, inputGroup) {
                    $(elementId).show();
                    $(inputGroup).parent().css("margin-bottom", "0");
                    isValid = false;
                }

                function hideError(elementId, inputGroup) {
                    $(elementId).hide();
                    $(inputGroup).parent().css("margin-bottom", "1rem");
                }

                // First Name Validation
                var fname = $("#fname").val().trim();
                if (fname === "") {
                    showError("#demo1", "#fname");
                } else {
                    hideError("#demo1", "#fname");
                }
                
                // Email Validation
                var email = $("#email").val().trim();
                var emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
                if (!emailPattern.test(email)) {
                    showError("#demo3", "#email");
                } else {
                    hideError("#demo3", "#email");
                }

                // Contact Validation (10-digit phone number)
                var contact = $("#contact").val().trim();
                if (contact === "" || contact.length !== 10 || isNaN(contact)) {
                    showError("#demo4", "#contact");
                } else {
                    hideError("#demo4", "#contact");
                }
                // Prevent form submission if any field is invalid
                if (!isValid) {
                    e.preventDefault();
                }
            });
        });
    </script>
</body>

</html>
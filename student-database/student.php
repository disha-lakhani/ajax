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
            <div class="col-md-6 form-container">
            </div>
            <!-- Right Side: Form -->
            <div class="col-md-6 right">
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
                                    <span class="input-group-text"> <i class="fas fa-image"></i> </span>
                                </div>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                            <span id="demo2" style="color: red;">Please select the image</span>
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
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-building"></i> </span>
                                </div>
                                <select class="form-control" id="course" name="course">
                                    <option value="">select the course</option>
                                    <option value="BCA">BCA</option>
                                    <option value="BCOM">BCOM</option>
                                    <option value="BBA">BBA</option>
                                </select>
                            </div>
                            <span id="demo5" style="color: red;">Please select the course..</span>
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-venus-mars"></i> </span>
                                </div>
                                <div class="form-control">
                                    <label class="radio-inline" for="maleGender">
                                        <input type="radio" name="gender" id="male" value="male"> Male</label>
                                    <label class="radio-inline" for="femaleGender">
                                        <input type="radio" name="gender" id="female" value="female"> Female</label>
                                    <label class="radio-inline" for="otherGender">
                                        <input type="radio" name="gender" id="other" value="other"> Other</label>
                                </div>
                            </div>
                            <span id="demo6" style="color: red;">Please select gender..</span>
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fas fa-home"></i> </span>
                                </div>
                                <textarea id="address" name="address" class="form-control" rows="3" placeholder="Enter your current address.."></textarea>
                            </div>
                            <span id="demo7" style="color: red;">Please enter your address..</span>
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fas fa-book"></i> </span>
                                </div>
                                <div class="form-control">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="hobbie[]" id="hobbies" value="Reading"> Reading
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="hobbie[]" id="hobbies" value="Lerning"> Lerning
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="hobbie[]" id="hobbies" value="Writting"> Writting
                                    </label>
                                </div>

                            </div>
                            <span id="demo8" style="color: red;">Please select hobbies..</span>
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                </div>
                                <input name="password" id="password" class="form-control" placeholder="Create password" type="password">
                            </div>
                            <span id="demo9" style="color: red;">Please enter password..</span>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">REGISTER</button>
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
            $("#demo2").hide();
            $("#demo3").hide();
            $("#demo4").hide();
            $("#demo5").hide();
            $("#demo6").hide();
            $("#demo7").hide();
            $("#demo8").hide();
            $("#demo9").hide();

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
                //image Validation
                var image = $("#image").val();
            var validExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.webp|\.jfif)$/i;
            if (image === "") {
                showError("#demo2", "#image");
            } else if (!validExtensions.exec(image)) {
                showError("#demo2", "#image");
                alert("Please upload an image in one of the following formats: .jpg, .jpeg, .webp, .jfif");
            } else {
                hideError("#demo2", "#image");
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

                // Course Selection Validation
                var course = $("#course").val();
                if (course === "") {
                    showError("#demo5", "#course");
                } else {
                    hideError("#demo5", "#course");
                }

                // Gender Validation
                var gender = $("input[name='gender']:checked").val();
                if (!gender) {
                    showError("#demo6", "input[name='gender']");
                } else {
                    hideError("#demo6", "input[name='gender']");
                }

                // Password Validation
                var password = $("#password").val().trim();
                if (password === "") {
                    showError("#demo9", "#password");
                } else if (password.length < 6) {
                    $("#demo7").text("Password must be at least 6 characters.");
                    showError("#demo9", "#password");
                } else {
                    hideError("#demo9", "#password");
                }
               // address Validation
                var address = $("#address").val().trim();
                if (address === "") {
                    showError("#demo7", "#address");
                } else {
                    hideError("#demo7", "#address");
                }
                // hobbies Validation
                var hobbiesSelected = $("input[name='hobbie[]']:checked").length;
                if (hobbiesSelected === 0) {
                    showError("#demo8", "#hobbies");
                } else {
                    hideError("#demo8", "#hobbies");
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
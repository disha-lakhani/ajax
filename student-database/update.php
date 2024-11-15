<?php

require 'db.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = (int) $_GET['id'];
    $sql = "SELECT * FROM student WHERE id=$id";
    $result = mysqli_query($conn, $sql);
  
    if (!$result) {
      die("Query failed: " . mysqli_error($conn));
    }
  
    if (mysqli_num_rows($result) > 0) {
      $student = mysqli_fetch_assoc($result);
    } else {
      header("location:display.php");
      exit();
    }
  
  } else {
    header("location:display.php");
    exit();
  }
  
  mysqli_close($conn);

?>
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
</head>
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

    .card-body {
        margin: 0 60px;
    }

    .col-md-6 {
        padding: 0;
    }

    .right {
        float: right;
        height: auto;
        box-sizing: border-box;
    }

    .card {
        width: 40%;
        box-sizing: border-box;
        height: auto;
        margin: auto;
        border: 1px solid #ddd;
        margin-top: 70px;

    }

    .card-title {
        padding-bottom: 25px;
    }

    .container {
        margin-top: 50px;
    }

    .radio-inline {
        padding: 0 25px;

    }

    label {
        margin-bottom: 0;
    }
</style>

<body>
    <div class="card bg-light">
        <article class="card-body " style="max-width: 1000px;">
            <h4 class="card-title mt-2 mb-3 text-center"> UPDATE DETAILS</h4>
            <form id="stddata" enctype="multipart/form-data">
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input type="hidden" name="id" id="id" value="<?php echo $student['id']; ?>">
                    <input name="fname" id="fname" value="<?php echo $student['fname']; ?>" class="form-control"
                        placeholder="First name" type="text">
                </div>
                <span id="demo1" style="color: red;">Please enter Full name</span>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                    </div>
                    <input name="email" id="email" value="<?php echo $student['email']; ?>" class="form-control"
                        placeholder="Email address" type="text">
                </div>
                <span id="demo3" style="color: red;">Please enter valid email address</span>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                    </div>
                    <input name="contact" id="contact" value="<?php echo $student['contact']; ?>" class="form-control"
                        placeholder="Phone number" type="text">
                </div>
                <span id="demo4" style="color: red;">Please enter mobile number (only 10 digits allowed)</span>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-building"></i> </span>
                    </div>
                    <select class="form-control" id="course" name="course">
                        <option value="">select the course</option>
                        <option value="BCA" <?php if ($student['course'] == 'BCA')
                            echo 'selected'; ?>>BCA</option>
                        <option value="BCOM" <?php if ($student['course'] == 'BCOM')
                            echo 'selected'; ?>>BCOM</option>
                        <option value="BBA" <?php if ($student['course'] == 'BBA')
                            echo 'selected'; ?>>BBA</option>
                    </select>
                </div>
                <span id="demo5" style="color: red;">Please select the course..</span>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-venus-mars"></i> </span>
                    </div>
                    <div class="form-control">
                        <label class="radio-inline" for="maleGender">
                            <input type="radio" name="gender" id="male" value="male" <?php if ($student['gender'] == 'male')
                                echo 'checked'; ?>> Male</label>
                        <label class="radio-inline" for="femaleGender">
                            <input type="radio" name="gender" id="female" value="female" <?php if ($student['gender'] == 'female')
                                echo 'checked'; ?>> Female</label>
                        <label class="radio-inline" for="otherGender">
                            <input type="radio" name="gender" id="other" value="other" <?php if ($student['gender'] == 'other')
                                echo 'checked'; ?>> Other</label>
                    </div>
                </div>
                <span id="demo6" style="color: red;">Please select gender..</span>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fas fa-home"></i> </span>
                    </div>
                    <textarea id="address" name="address" class="form-control" rows="3"
                        placeholder="Enter your current address.."><?php echo $student['address']; ?></textarea>
                </div>
                <span id="demo7" style="color: red;">Please enter your address..</span>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fas fa-book"></i> </span>
                    </div>
                    <div class="form-control">
                        <?php

                        $hobbies = explode(", ", $student['hobbies']);
                        ?>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="hobbie[]" id="hobbies" value="Reading" <?php if (in_array("Reading", $hobbies))
                                echo 'checked'; ?>> Reading
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="hobbie[]" id="hobbies" value="Lerning" <?php if (in_array("Lerning", $hobbies))
                                echo 'checked'; ?>> Lerning
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="hobbie[]" id="hobbies" value="Writting" <?php if (in_array("Writting", $hobbies))
                                echo 'checked'; ?>> Writting
                        </label>
                    </div>

                </div>
                <span id="demo8" style="color: red;">Please select hobbies..</span>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input name="password" id="password" class="form-control" placeholder="Create password" type="text"
                        value="<?php echo $student['password']; ?>">
                </div>
                <span id="demo9" style="color: red;">Please enter password..</span>
                <div class="form-group">
                    <button type="button" id="reg" class="btn btn-primary btn-block">UPDATE</button>
                </div>
            </form>
            <p class="divider-text">
                <span class="bg-light">OR</span>
            </p>
            <p>
                <a href="" class="btn btn-block btn-twitter"> <i class="fab fa-google"></i>   Login via Google</a>
                <a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Login via
                    Facebook</a>
            </p>
        </article>
    </div>
</body>
<!-- validation -->
<script>
    $(document).ready(function () {
        $("#demo1").hide();
        $("#demo2").hide();
        $("#demo3").hide();
        $("#demo4").hide();
        $("#demo5").hide();
        $("#demo6").hide();
        $("#demo7").hide();
        $("#demo8").hide();
        $("#demo9").hide();

        $("#reg").click(function (e) {
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

            if (isValid) {
            $.ajax({
                url: 'edit.php',
                type: 'POST',
                data: $("#stddata").serialize(),
                success: function (response) {
                    // Assuming `response` is JSON
                    response = JSON.parse(response);
                    if (response.status === 'success') {
                        alert('Data updated successfully!');
                        window.location.href = 'display.php';
                    } else {
                        alert('Update failed: ' + response.message);
                    }
                },
                error: function () {
                    alert('Error occurred while updating data.');
                }
            });
        }
        });
    });
</script>

</html>
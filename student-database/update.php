<?php

include 'db.php';
$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = $_POST['fname'];
    $image = $_FILES['image']['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $course = $_POST['course'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $hobbies = isset($_POST['hobbie']) ? implode(", ", $_POST['hobbie']) : "";
    $password = $_POST['password'];

    $sql = "UPDATE student SET 
                fname='$fname', 
                email='$email', 
                contact='$contact', 
                course='$course', 
                gender='$gender', 
                address='$address', 
                hobbies='$hobbies', 
                password='$password' 
            WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        header("location:display.php");
        exit();
    } else {
        echo "error : " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    $sql = "SELECT * FROM student WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $std = mysqli_fetch_assoc($result);
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
            <form action="" method="post" id="stddata" enctype="multipart/form-data">
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input name="fname" id="fname" value="<?php echo $std['fname']; ?>" class="form-control" placeholder="First name" type="text">
                </div>
                <span id="demo1" style="color: red;">Please enter Full name</span>
                <!-- <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fas fa-image"></i> </span>
                    </div>
                    <input type="file" name="image" id="image" class="form-control">
                    <?php if (!empty($std['image'])): ?>
                        <img src="uploads/<?php echo $std['image']; ?>" alt="Current Image" width="100">
                    <?php endif; ?>
                </div>
                <span id="demo2" style="color: red;">Please select the image</span> -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                    </div>
                    <input name="email" id="email" value="<?php echo $std['email']; ?>" class="form-control" placeholder="Email address" type="text">
                </div>
                <span id="demo3" style="color: red;">Please enter valid email address</span>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                    </div>
                    <input name="contact" id="contact" value="<?php echo $std['contact']; ?>" class="form-control" placeholder="Phone number" type="text">
                </div>
                <span id="demo4" style="color: red;">Please enter mobile number (only 10 digits allowed)</span>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-building"></i> </span>
                    </div>
                    <select class="form-control" id="course" name="course">
                        <option value="">select the course</option>
                        <option value="BCA" <?php if ($std['course'] == 'BCA') echo 'selected'; ?>>BCA</option>
                        <option value="BCOM" <?php if ($std['course'] == 'BCOM') echo 'selected'; ?>>BCOM</option>
                        <option value="BBA" <?php if ($std['course'] == 'BBA') echo 'selected'; ?>>BBA</option>
                    </select>
                </div>
                <span id="demo5" style="color: red;">Please select the course..</span>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-venus-mars"></i> </span>
                    </div>
                    <div class="form-control">
                        <label class="radio-inline" for="maleGender">
                            <input type="radio" name="gender" id="male" value="male" <?php if ($std['gender'] == 'male') echo 'checked'; ?>> Male</label>
                        <label class="radio-inline" for="femaleGender">
                            <input type="radio" name="gender" id="female" value="female" <?php if ($std['gender'] == 'female') echo 'checked'; ?>> Female</label>
                        <label class="radio-inline" for="otherGender">
                            <input type="radio" name="gender" id="other" value="other" <?php if ($std['gender'] == 'other') echo 'checked'; ?>> Other</label>
                    </div>
                </div>
                <span id="demo6" style="color: red;">Please select gender..</span>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fas fa-home"></i> </span>
                    </div>
                    <textarea id="address" name="address" class="form-control" rows="3" placeholder="Enter your current address.."><?php echo $std['address']; ?></textarea>
                </div>
                <span id="demo7" style="color: red;">Please enter your address..</span>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fas fa-book"></i> </span>
                    </div>
                    <div class="form-control">
                        <?php

                        $hobbies = explode(", ", $std['hobbies']);
                        ?>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="hobbie[]" id="hobbies" value="Reading" <?php if (in_array("Reading", $hobbies)) echo 'checked'; ?>> Reading
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="hobbie[]" id="hobbies" value="Lerning" <?php if (in_array("Lerning", $hobbies)) echo 'checked'; ?>> Lerning
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="hobbie[]" id="hobbies" value="Writting" <?php if (in_array("Writting", $hobbies)) echo 'checked'; ?>> Writting
                        </label>
                    </div>

                </div>
                <span id="demo8" style="color: red;">Please select hobbies..</span>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input name="password" id="password" class="form-control" placeholder="Create password" type="text" value="<?php echo $std['password']; ?>">
                </div>
                <span id="demo9" style="color: red;">Please enter password..</span>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">UPDATE</button>
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
</body>
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
            // var image = $("#image").val();
            // var validExtensions =/(\.jpg|\.jpeg|\.png|\.gif|\.webp|\.jfif)$/i;
            // if (image === "") {
            //     showError("#demo2", "#image");
            // } else if (!validExtensions.exec(image)) {
            //     showError("#demo2", "#image");
            //     alert("Please upload an image in one of the following formats: .jpg, .jpeg, .webp, .jfif");
            // } else {
            //     hideError("#demo2", "#image");
            // }
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

</html>
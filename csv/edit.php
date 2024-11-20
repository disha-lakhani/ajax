<?php
include 'db.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = (int) $_GET['id'];
    $sql = "SELECT * FROM students WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) > 0) {
        $student = mysqli_fetch_assoc($result);
    } else {
        echo "ID not found or invalid.";
        exit();
    }
} else {
    echo "ID not found or invalid.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = (int) $_POST['id'];
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];

    $sql = "UPDATE students SET fname='$fname', email='$email', contact='$contact' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(['status' => 'success', 'message' => 'Record updated successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error updating record: ' . mysqli_error($conn)]);
    }
    exit();
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student Details</title>
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
                        <h4 class="card-title mt-2 mb-3 text-center"> UPDATE STUDENT DETAILS</h4>
                        <form action="display.php" method="post" id="stddata" enctype="multipart/form-data">
                            <input type="hidden" name="id" id="id" value="<?php echo $student['id']; ?>">
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                </div>
                                <input name="fname" id="fname" class="form-control" placeholder="First name" type="text"
                                    value="<?php echo $student['fname']; ?>">
                            </div>
                            <span id="demo1" style="color: red;">Please enter Full name</span>


                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                                </div>
                                <input name="contact" id="contact" class="form-control" placeholder="Phone number"
                                    type="text" value="<?php echo $student['contact']; ?>">
                            </div>
                            <span id="demo4" style="color: red;">Please enter mobile number (only 10 digits
                                allowed)</span>

                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                                </div>
                                <input name="email" id="email" class="form-control" placeholder="Email address"
                                    type="text" value="<?php echo $student['email']; ?>">
                            </div>
                            <span id="demo3" style="color: red;">Please enter valid email address</span>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">UPDATE</button>
                            </div>
                        </form>
                        <p class="divider-text">
                            <span class="bg-light">OR</span>
                        </p>
                        <p>
                            <a href="" class="btn btn-block btn-twitter"> <i class="fab fa-google"></i>   Login via
                                Google</a>
                            <a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Login via
                                Facebook</a>
                        </p>

                        <div id="responseMessage" class="alert d-none"></div>
                    </article>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function () {
            $("#demo1").hide();
            $("#demo3").hide();
            $("#demo4").hide();

            $("#stddata").submit(function (e) {
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
                if (isValid) {
                    var formData = $(this).serialize();

                    // AJAX request
                    $.ajax({
                        url: window.location.href, // Ensure this points to the correct PHP script
                        type: "POST",
                        data: formData,
                        dataType: "json",
                        success: function (response) {
                            if (response.status === "success") {
                                $("#responseMessage")
                                    .removeClass("d-none alert-danger")
                                    .addClass("alert-success")
                                    .text(response.message);

                                // Redirect after a short delay
                                console.log("Redirecting...");
                                setTimeout(function () {
                                    window.location.href = "display.php";
                                }, 1000); // Redirect after 1 second
                            } else {
                                $("#responseMessage")
                                    .removeClass("d-none alert-success")
                                    .addClass("alert-danger")
                                    .text(response.message);
                            }
                        },
                        error: function () {
                            $("#responseMessage")
                                .removeClass("d-none alert-success")
                                .addClass("alert-danger")
                                .text("An error occurred. Please try again.");
                        }
                    });
                }

            });
        });
    </script>
</body>

</html>
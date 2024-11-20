<?php
require 'db.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = (int) $_GET['id'];

    $sql = "SELECT * FROM std WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (!$result || mysqli_num_rows($result) == 0) {
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
            echo json_encode(['success' => false, 'message' => 'ID not found or invalid.']);
        } else {
            echo "ID not found or invalid.";
        }
        exit();
    }

    $student = mysqli_fetch_assoc($result);
}
//  else {
//     if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
//         echo json_encode(['success' => false, 'message' => 'Invalid ID.']);
//     } else {
//         echo "Invalid ID.";
//     }
//     exit();
// }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int) $_POST['id'];
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $field = mysqli_real_escape_string($conn, $_POST['field']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $hobbies = isset($_POST['hobbie']) ? implode(", ", $_POST['hobbie']) : "";
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "UPDATE std SET
        fname='$fname',
        lname='$lname',
        field='$field',
        dob='$dob',
        gender='$gender',
        contact='$contact',
        hobbies='$hobbies',
        address='$address',
        city='$city',
        state='$state',
        email='$email',
        username='$username',
        password='$password'
        WHERE id='$id'";



    if (mysqli_query($conn, $sql)) {
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
            echo json_encode(['success' => true, 'message' => 'Data updated successfully!']);
            exit();
        } else {
            header("Location: display.php");
            exit();
        }
    } else {
        echo json_encode(['success' => false, 'message' => mysqli_error($conn)]);
        exit();
    }
}

mysqli_close($conn);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MultiStep Form</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="form1.css">
</head>

<body>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form id="msform" action="update.php?id=<?php echo $student['id']; ?>" method="post"
                enctype="multipart/form-data">
                <input type="hidden" name="id" id="id" value="<?php echo $student['id']; ?>">
                <ul id="progressbar">
                    <li class="active" id="account">Personal Details</li>
                    <li id="personal">Contact Information</li>
                    <li id="payment">Account Setup</li>
                </ul>
                <!-- Personal Details -->
                <fieldset id="personal-details">
                    <h2 class="fs-title">Personal Details</h2>
                    <h3 class="fs-subtitle">Tell us something more about you</h3>

                    <label for="fname" class="name">First Name:</label>
                    <input type="text" class="input" name="fname" id="fname" placeholder=" First Name"
                        value="<?php echo isset($student['fname']) ? $student['fname'] : ''; ?>"
                        autocomplete="given-name" />
                    <span id="demo1" class="error" style="color:red;">***enter your firstname***</span>

                    <label for="lname" class="name">Last Name:</label>
                    <input type="text" class="input" name="lname" id="lname" placeholder=" Last Name"
                        value="<?php echo isset($student['lname']) ? $student['lname'] : ''; ?>"
                        autocomplete="family-name" />
                    <span id="demo2" class="error" style="color:red;">***enter your lastname***</span>
                    <label for="field" class="name">Course:</label>
                    <select name="field" class="input" id="field" autocomplete="off">
                        <option value="">Select Course</option>
                        <option value="BBA" <?php echo isset($student['field']) && $student['field'] == 'BBA' ? 'selected' : ''; ?>>
                            BBA
                        </option>
                        <option value="BCA" <?php echo isset($student['field']) && $student['field'] == 'BCA' ? 'selected' : ''; ?>>
                            BCA
                        </option>
                        <option value="BSCIT" <?php echo isset($student['field']) && $student['field'] == 'BSCIT' ? 'selected' : ''; ?>>
                            BSCIT
                        </option>
                    </select>

                    <span id="demo3" class="error" style="color:red;">***choose your field***</span>

                    <label for="dob" class="name">DOB:</label>
                    <input type="date" class="input" name="dob" id="dob" placeholder=" Birthdate"
                        value="<?php echo isset($student['dob']) ? $student['dob'] : ''; ?>" autocomplete="bday" />
                    <span id="demo4" class="error" style="color:red;">***enter your birthdate***</span>

                    <label for="gender" class="name">Gender:</label><br>
                    <div class="gender-options input">
                        <input type="radio" name="gender" value="Male" id="male" <?php echo (isset($student['gender']) && $student['gender'] == 'Male') ? 'checked' : ''; ?> autocomplete="sex" />
                        <label for="male" class="label">Male</label>

                        <input type="radio" name="gender" value="Female" id="female" <?php echo (isset($student['gender']) && $student['gender'] == 'Female') ? 'checked' : ''; ?> autocomplete="sex" />
                        <label for="female" class="label">Female</label>

                        <input type="radio" name="gender" value="Other" id="other" <?php echo (isset($student['gender']) && $student['gender'] == 'Other') ? 'checked' : ''; ?> autocomplete="sex" />
                        <label for="other" class="label">Other</label>
                    </div>
                    <span id="demo5" class="error" style="color:red;">***select the Gender***</span>

                    <input type="button" name="next" class="next action-button" value="Next" />
                </fieldset>

                <!-- Contact Information -->
                <fieldset id="contact-info" style="display:none;">
                    <h2 class="fs-title">Contact Information</h2>
                    <h3 class="fs-subtitle">Provide your contact details</h3>

                    <label for="contact" class="name">Contact:</label>
                    <input type="tel" class="input" name="contact" id="contact"
                        value="<?php echo isset($student['contact']) ? $student['contact'] : ''; ?>"
                        placeholder="Please enter your phone number" autocomplete="tel" />
                    <span id="demo6" class="error" style="color:red;">***enter your contact***</span>

                    <label for="hobbie" class="name">Hobbies:</label><br>
                    <div class="gender-options input">


                        <?php
                        $hobbies = isset($student['hobbies']) ? explode(", ", $student['hobbies']) : [];
                        $hobbyList = ["Reading", "Learning", "Writing", "Playing", "Singing"];
                        foreach ($hobbyList as $hobby) {
                            $isChecked = in_array($hobby, $hobbies) ? 'checked' : '';
                            echo "<label class='checkbox-inline'>
                                        <input type='checkbox' name='hobbie[]' id='hobbies_$hobby' value='$hobby' $isChecked> $hobby
                                </label>";
                        }
                        ?>

                    </div>
                    <span id="demo7" class="error" style="color:red;">***select at least one hobbie***</span>


                    <label for="address" class="name">Address:</label>
                    <textarea class="input" name="address" id="address" placeholder="Please enter your address"
                        autocomplete="address-line1">  <?php echo isset($student['address']) ? $student['address'] : ''; ?></textarea>
                    <span id="demo8" class="error" style="color:red;">***enter your Address***</span>

                    <label for="city" class="name">City:</label>
                    <select name="city" class="input" id="city" autocomplete="off">
                        <option value="">Select City</option>
                        <option value="">Select City</option>
                        <option value="Surat" <?php echo (isset($student['city']) && $student['city'] == 'Surat') ? 'selected' : ''; ?>>Surat</option>
                        <option value="Mumbai" <?php echo (isset($student['city']) && $student['city'] == 'Mumbai') ? 'selected' : ''; ?>>Mumbai</option>
                        <option value="Udaipur" <?php echo (isset($student['city']) && $student['city'] == 'Udaipur') ? 'selected' : ''; ?>>Udaipur</option>
                        <option value="Pune" <?php echo (isset($student['city']) && $student['city'] == 'Pune') ? 'selected' : ''; ?>>Pune</option>
                        <option value="Jaipur" <?php echo (isset($student['city']) && $student['city'] == 'Jaipur') ? 'selected' : ''; ?>>Jaipur</option>
                    </select>
                    <span id="demo9" class="error" style="color:red;">***select city***</span>

                    <label for="state" class="name">State:</label>
                    <select name="state" class="input" id="state" autocomplete="off">
                        <option value="">Select State</option>
                        <option value="Gujarat" <?php echo (isset($student['state']) && $student['state'] == 'Gujarat') ? 'selected' : ''; ?>>Gujarat</option>
                        <option value="Maharashtra" <?php echo (isset($student['state']) && $student['state'] == 'Maharashtra') ? 'selected' : ''; ?>>Maharashtra</option>
                        <option value="Rajasthan" <?php echo (isset($student['state']) && $student['state'] == 'Rajasthan') ? 'selected' : ''; ?>>Rajasthan</option>
                    </select>
                    <span id="demo10" class="error" style="color:red;">***select state***</span>

                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    <input type="button" name="next" class="next action-button" value="Next" />
                </fieldset>

                <!-- Account Setup -->
                <fieldset id="account-setup" style="display:none;">
                    <h2 class="fs-title">Account Setup</h2>
                    <h3 class="fs-subtitle">Create your account details</h3>

                    <label for="email" class="name">Email:</label>
                    <input type="email" class="input" name="email" id="email" value="<?php echo isset($student['email']) ? $student['email'] : ''; ?>"
                        placeholder="Please enter your email address" autocomplete="email" />
                    <span id="demo12" class="error" style="color:red;">***enter your Email***</span>
                    <!-- Username -->
                    <label for="username" class="name">Username:</label>
                    <input type="text" class="input" name="username" id="username"
                    value="<?php echo isset($student['username']) ? $student['username'] : ''; ?>"  placeholder="Enter your username"
                        autocomplete="username" />
                    <span id="demo13" class="error" style="color:red;">***enter your Username***</span>

                    <!-- Password -->
                    <label for="password" class="name">Password:</label>
                    <input type="text" class="input" name="password" id="password"
                    value="<?php echo isset($student['password']) ? $student['password'] : ''; ?>" placeholder="Enter your password"
                        autocomplete="new-password" />
                    <span id="demo14" class="error" style="color:red;">***enter your password***</span>
                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    <input type="submit" name="submit" class="submit action-button" value="Update" />
                </fieldset>


                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            </form>
            <div id="resultMessage"></div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>


    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- Custom JavaScript -->
    <script src="form1.js"></script>
    <script>
        $(document).ready(function () {
            $("#msform").on("submit", function (event) {
                event.preventDefault(); // Prevent default form submission

                $.ajax({
                    url: "update.php",
                    type: "POST",
                    data: $(this).serialize(), // Serialize form data
                    dataType: "json", // Expect JSON response
                    success: function (response) {
                        if (response.success) {
                            $("#resultMessage").html(`<div class="alert alert-success">${response.message}</div>`);

                            setTimeout(function () {
                                window.location.href = "display.php";
                            }, 2000);
                        } else {
                            $("#resultMessage").html(`<div class="alert alert-danger">${response.message}</div>`);
                        }
                    }
                });
            });
        });


    </script>

</body>


</html>
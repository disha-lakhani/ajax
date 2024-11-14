<?php

require 'db.php';
$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $field = $_POST['field'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "UPDATE std SET
    fname='$fname',
    lname='$lname',
    field='$field',
    dob='$dob',
    gender='$gender',
    contact='$contact',
    email='$email',
    address='$address',
    city='$city',
    state='$state',
    username='$username',
    password='$password'
    WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        header("location:display.php");
        exit();
    } else {
        echo "error : " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    $sql = "SELECT * from std WHERE id=$id";
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
    <title>MultiStep Form</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="form1.css">
</head>

<body>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form id="msform" action="" method="post" enctype="multipart/form-data">
               
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
                    <input type="text" class="input" name="fname" id="fname" placeholder=" First Name" value="<?php echo $std['fname']; ?>" autocomplete="given-name" />
                    <span id="demo1" class="error" style="color:red;">***enter your firstname***</span>

                    <label for="lname" class="name">Last Name:</label>
                    <input type="text" class="input" name="lname" id="lname" placeholder=" Last Name" value="<?php echo $std['lname']; ?>" autocomplete="family-name" />
                    <span id="demo2" class="error" style="color:red;">***enter your lastname***</span>
                    <label for="field" class="name">Course:</label>
                    <select name="field" class="input" id="field" autocomplete="off">
                        <option value="">Select Course</option>
                        <option value="BBA" <?php if (isset($std['field']) && $std['field'] == 'BBA') echo 'selected'; ?>>BBA</option>
                        <option value="BCA" <?php if (isset($std['field']) && $std['field'] == 'BCA') echo 'selected'; ?>>BCA</option>
                        <option value="BSCIT" <?php if (isset($std['field']) && $std['field'] == 'BSCIT') echo 'selected'; ?>>BSCIT</option>
                    </select>

                    <span id="demo3" class="error" style="color:red;">***choose your field***</span>

                    <label for="dob" class="name">DOB:</label>
                    <input type="date" class="input" name="dob" id="dob" placeholder=" Birthdate" value="<?php echo $std['dob']; ?>" autocomplete="bday" />
                    <span id="demo4" class="error" style="color:red;">***enter your birthdate***</span>

                    <label for="gender" class="name">Gender:</label><br>
                    <div class="gender-options input">
                        <input type="radio" name="gender" value="Male" id="male" <?php if ($std['gender'] == 'Male') echo 'checked'; ?> autocomplete="sex" />
                        <label for="male" class="label">Male</label>

                        <input type="radio" name="gender" value="Female" id="female" <?php if ($std['gender'] == 'Female') echo 'checked'; ?> autocomplete="sex" />
                        <label for="female" class="label">Female</label>

                        <input type="radio" name="gender" value="Other" id="other" <?php if ($std['gender'] == 'Other') echo 'checked'; ?> autocomplete="sex" />
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
                    <input type="tel" class="input" name="contact" id="contact" value="<?php echo $std['contact']; ?>" placeholder="Please enter your phone number" autocomplete="tel" />
                    <span id="demo6" class="error" style="color:red;">***enter your contact***</span>

                    <label for="email" class="name">Email:</label>
                    <input type="email" class="input" name="email" id="email" value="<?php echo $std['email']; ?>" placeholder="Please enter your email address" autocomplete="email" />
                    <span id="demo7" class="error" style="color:red;">***enter your Email***</span>

                    <label for="address" class="name">Address:</label>
                    <textarea class="input" name="address" id="address" placeholder="Please enter your address" autocomplete="address-line1"><?php echo $std['address']; ?></textarea>
                    <span id="demo8" class="error" style="color:red;">***enter your Address***</span>

                    <label for="city" class="name">City:</label>
                    <select name="city" class="input" id="city" autocomplete="off">
                        <option value="">Select City</option>
                        <option value="Surat" <?php if ($std['city'] == 'Surat') echo 'selected'; ?>>Surat</option>
                        <option value="Mumbai" <?php if ($std['city'] == 'Mumbai') echo 'selected'; ?>>Mumbai</option>
                        <option value="Udaipur" <?php if ($std['city'] == 'Udaipur') echo 'selected'; ?>>Udaipur</option>
                        <option value="Bhavnagar" <?php if ($std['city'] == 'Bhavnagar') echo 'selected'; ?>>Bhavnagar</option>
                        <option value="Pune" <?php if ($std['city'] == 'Pune') echo 'selected'; ?>>Pune</option>
                        <option value="Jaipur" <?php if ($std['city'] == 'Jaipur') echo 'selected'; ?>>Jaipur</option>
                    </select>
                    <span id="demo9" class="error" style="color:red;">***select city***</span>

                    <label for="state" class="name">State:</label>
                    <select name="state" class="input" id="state" autocomplete="off">
                        <option value="">Select State</option>
                        <option value="Gujarat" <?php if ($std['state'] == 'Gujarat') echo 'selected'; ?>>Gujarat</option>
                        <option value="Maharashtra" <?php if ($std['state'] == 'Maharashtra') echo 'selected'; ?>>Maharashtra</option>
                        <option value="Rajasthan" <?php if ($std['state'] == 'Rajasthan') echo 'selected'; ?>>Rajasthan</option>
                    </select>
                    <span id="demo10" class="error" style="color:red;">***select state***</span>

                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    <input type="button" name="next" class="next action-button" value="Next" />
                </fieldset>

                <!-- Account Setup -->
                <fieldset id="account-setup" style="display:none;">
                    <h2 class="fs-title">Account Setup</h2>
                    <h3 class="fs-subtitle">Create your account details</h3>

                    <!-- Username -->
                    <label for="username" class="name">Username:</label>
                    <input type="text" class="input" name="username" id="username" value="<?php echo $std['username']; ?>" placeholder="Enter your username" autocomplete="username" />
                    <span id="demo12" class="error" style="color:red;">***enter your Username***</span>

                    <!-- Password -->
                    <label for="password" class="name">Password:</label>
                    <input type="text" class="input" name="password" id="password" value="<?php echo $std['password']; ?>" placeholder="Enter your password" autocomplete="new-password" />
                    <span id="demo13" class="error" style="color:red;">***enter your password***</span>
                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    <input type="submit" name="submit" class="submit action-button" value="Submit" />
                </fieldset>


                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            </form>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script src="form.js"></script>
</body>


</html>
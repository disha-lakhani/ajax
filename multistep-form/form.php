<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MultiStep Form</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="form1.css">
</head>

<body>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form id="msform" action="insert.php" method="post" enctype="multipart/form-data">
                <!-- progressbar -->
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
                    <input type="text" class="input" name="fname" id="fname" placeholder=" First Name" autocomplete="given-name" />
                    <span id="demo1" class="error" style="color:red;">***enter your firstname***</span>

                    <label for="lname" class="name">Last Name:</label>
                    <input type="text" class="input" name="lname" id="lname" placeholder=" Last Name" autocomplete="family-name" />
                    <span id="demo2" class="error" style="color:red;">***enter your lastname***</span>

                    <label for="field" class="name">Course:</label>
                    <select name="field" class="input" id="field" autocomplete="off">
                        <option value="">Select Course</option>
                        <option value="BBA">BBA</option>
                        <option value="BCA">BCA</option>
                        <option value="BSCIT">BSCIT</option>
                    </select>
                    <span id="demo3" class="error" style="color:red;">***choose your field***</span>

                    <label for="dob" class="name">DOB:</label>
                    <input type="date" class="input" name="dob" id="dob" placeholder=" Birthdate" autocomplete="bday" />
                    <span id="demo4" class="error" style="color:red;">***enter your birthdate***</span>

                    <label for="gender" class="name">Gender:</label><br>
                    <div class="gender-options input">
                        <input type="radio" name="gender" value="Male" id="male" autocomplete="sex" />
                        <label for="male" class="label">Male</label>

                        <input type="radio" name="gender" value="Female" id="female" autocomplete="sex" />
                        <label for="female" class="label">Female</label>

                        <input type="radio" name="gender" value="Other" id="other" autocomplete="sex" />
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
                    <input type="tel" class="input" name="contact" id="contact" placeholder="Please enter your phone number" autocomplete="tel" />
                    <span id="demo6" class="error" style="color:red;">***enter your contact***</span>

                    <label for="email" class="name">Email:</label>
                    <input type="email" class="input" name="email" id="email" placeholder="Please enter your email address" autocomplete="email" />
                    <span id="demo7" class="error" style="color:red;">***enter your Email***</span>

                    <label for="address" class="name">Address:</label>
                    <textarea class="input" name="address" id="address" placeholder="Please enter your address" autocomplete="address-line1"></textarea>
                    <span id="demo8" class="error" style="color:red;">***enter your Address***</span>

                    <label for="city" class="name">City:</label>
                    <select name="city" class="input" id="city" autocomplete="off">
                        <option value="">Select City</option>
                        <option value="Surat">Surat</option>
                        <option value="Mumbai">Mumbai</option>
                        <option value="Udaipur">Udaipur</option>
                        <option value="Bhavnagar">Bhavnagar</option>
                        <option value="Pune">Pune</option>
                        <option value="Jaipur">Jaipur</option>
                    </select>
                    <span id="demo9" class="error" style="color:red;">***select city***</span>

                    <label for="state" class="name">State:</label>
                    <select name="state" class="input" id="state" autocomplete="off">
                        <option value="">Select State</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Rajasthan">Rajasthan</option>
                    </select>
                    <span id="demo10" class="error" style="color:red;">***select state***</span>

                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    <input type="button" name="next" class="next action-button" value="Next" />
                </fieldset>

                <!-- Account Setup -->
                <fieldset id="account-setup" style="display:none;">
                    <h2 class="fs-title">Account Setup</h2>
                    <h3 class="fs-subtitle">Create your account details</h3>

                    <!-- Image Upload -->
                    <label for="image" class="name">Profile Image:</label>
                    <input type="file" class="input" name="image" id="image" />
                    <span id="demo11" class="error" style="color:red;">***upload profile picture***</span>

                    <!-- Username -->
                    <label for="username" class="name">Username:</label>
                    <input type="text" class="input" name="username" id="username" placeholder="Enter your username" autocomplete="username" />
                    <span id="demo12" class="error" style="color:red;">***enter your Username***</span>

                    <!-- Password -->
                    <label for="password" class="name">Password:</label>
                    <input type="password" class="input" name="password" id="password" placeholder="Enter your password" autocomplete="new-password"  />
                    <span id="demo13" class="error" style="color:red;">***enter your password***</span>

                    <!-- Confirm Password -->
                    <label for="confirmpassword" class="name">Confirm Password:</label>
                    <input type="password" class="input" name="confirmpassword" id="confirmpassword" placeholder="Confirm your password" autocomplete="new-password"  />
                    <span id="demo14" class="error" style="color:red;">***enter your confirm password***</span>

                    <!-- Terms and Conditions Checkbox -->
                    <div class="checkbox-container">
                        <input type="checkbox" name="terms" id="terms" />
                        <label for="terms" class="terms-label">I agree to the <a href="#" target="_blank">Terms and Conditions</a></label>
                    </div>
                    <span id="demo15" class="error" style="color:red;">***tick the checkbox first***</span>

                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    <button type="submit" class="action-button submit-btn">Submit</button>
                </fieldset>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="path/to/your/script.js"></script>
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>


    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- Custom JavaScript -->
    <script src="form.js"></script>
</body>


</html>
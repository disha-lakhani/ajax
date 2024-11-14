<?php

require 'upd.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <link rel="stylesheet" href="upd.css">
</head>

<body>
    <div class="container">
        <h2 class="userpro">UPDATE USER PROFILE</h2>
        <div class="row">
            <div class="col-lg-4">
                <div class="profile-card-4 z-depth-3">
                    <div class="card">
                        <div class="card-body text-center bg-primary rounded-top">
                            <div class="user-box">
                                <img src="uploads/<?php echo $user['image']; ?>" alt="user avatar">
                            </div>
                            <h5 class="mb-1 text-white"><?php echo $user['fname']; ?> <?php echo $user['lname']; ?></h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group shadow-none">
                                <li class="list-group-item">
                                    <div class="list-icon">

                                        <i class="fa fa-pen"></i>
                                    </div>
                                    <div class="list-details">
                                        <h3>UPDATE USER PROFILE</h3>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card z-depth-3">
                    <div class="card-body">
                        <ul class="nav nav-pills nav-pills-primary nav-justified">
                            <li class="nav-item">
                                <a href="javascript:void();" data-target="#profile" data-toggle="pill" class="nav-link "><i class="icon-user"></i> <span class="hidden-xs">Profile</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void();" data-target="#messages" data-toggle="pill" class="nav-link"><i class="icon-envelope-open"></i> <span class="hidden-xs">Post</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void();" data-target="#edit" data-toggle="pill" class="nav-link active show"><i class="icon-note"></i> <span class="hidden-xs">Edit</span></a>
                            </li>
                        </ul>
                        <div class="tab-content p-3">
                            <form action="" method="post" id="update" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">First Name:</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $user['fname']; ?>">
                                            <span id="demo1" style="color: red; display:none;">Please enter Firstname</span>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Last Name:</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $user['lname']; ?>">
                                            <span id="demo2" style="color: red; display:none;">Please enter Lastname</span>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Email:</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>">
                                            <span id="demo5" style="color: red; display:none;">Please enter Email</span>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">City:</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" id="city" name="city" value="<?php echo $user['city']; ?>">
                                            <span id="demo3" style="color: red; display:none;">Please enter city</span>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Gender:</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary ">
                                            <div class="form-control">
                                                <input type="radio" id="male" name="gender" value="male" <?php if ($user['gender'] == 'male') echo 'checked'; ?> />
                                                <label for="male">Male</label>
                                                <input type="radio" id="female" name="gender" value="female" <?php if ($user['gender'] == 'female') echo 'checked'; ?> />
                                                <label for="female">Female</label>
                                                <input type="radio" id="other" name="gender" value="other" <?php if ($user['gender'] == 'other') echo 'checked'; ?> />
                                                <label for="other">Other</label>
                                            </div>
                                            <span id="demo4" style="color: red; display:none;">Please Select Gender</span>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Profile Image:</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="file" class="form-control" name="image" id="image" accept="image/*">
                                            <span id="demo6" style="color: red; display:none;">Please select an image</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="submit" name="update" id="btn" class="btn btn-primary" value="Save Changes">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>




</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('#update').addEventListener('submit', function(event) {
            let isValid = true;

            // Clear previous error messages
            document.querySelectorAll('span[id^="demo"]').forEach(span => {
                span.style.display = 'none';
            });

            // First Name Validation
            const fname = document.querySelector('input[name="fname"]').value.trim();
            if (fname === '') {
                document.querySelector('#demo1').style.display = 'block';
                isValid = false;
            }

            // Last Name Validation
            const lname = document.querySelector('input[name="lname"]').value.trim();
            if (lname === '') {
                document.querySelector('#demo2').style.display = 'block';
                isValid = false;
            }

            // Email Validation
            const email = document.querySelector('input[name="email"]').value.trim();
            const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
            if (!emailPattern.test(email)) {
                document.querySelector('#demo5').textContent = "Invalid email format";
                document.querySelector('#demo5').style.display = 'block';
                isValid = false;
            } else if (email === '') {
                document.querySelector('#demo5').style.display = 'block';
                isValid = false;
            }

            // City Validation
            const city = document.querySelector('input[name="city"]').value.trim();
            if (city === '') {
                document.querySelector('#demo3').style.display = 'block';
                isValid = false;
            }

            // Gender Validation
            const genderRadios = document.querySelectorAll('input[name="gender"]');
            const isGenderSelected = Array.from(genderRadios).some(radio => radio.checked);
            if (!isGenderSelected) {
                document.querySelector('#demo4').style.display = 'block';
                isValid = false;
            }

            // image
            var image = document.getElementsByName('image')[0].value; // Use name to get the input
            var validExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.webp|\.jfif)$/i;
            if (image === "") {
                document.querySelector('#demo6').style.display = 'block';
                isValid = false;
            }
             if (!validExtensions.exec(image)) {
                document.querySelector('#demo6').style.display = 'block';
                alert("Please upload an image in one of the following formats: .jpg, .jpeg, .webp, .jfif");
                isValid = false;
            }
            // If form is not valid, prevent submission
            if (!isValid) {
                event.preventDefault();
            }
        });
    });
</script>

</html>
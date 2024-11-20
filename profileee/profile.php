<?php
session_start();
include 'db.php';

if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit();
}

$id = $_SESSION['id'];

$sql = "SELECT fname, lname, email, gender, city, image FROM users WHERE id = '$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "User not found.";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
        integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

    <link rel="stylesheet" href="profile.css">
</head>

<body>

    <div class="container">
        <h2 class="userpro">USER PROFILE</h2>
        <div class="row">
            <div class="col-lg-4">
                <div class="profile-card-4 z-depth-3">
                    <div class="card">
                        <div class="card-body text-center bg-primary rounded-top">
                            <div class="user-box">
                                <img src="uploads/<?php echo $user['image']; ?>" alt="user avatar">
                            </div>
                            <h5 class="mb-1 text-white"><?php echo $user['fname']; ?> <?php echo $user['lname']; ?></h5>
                            <h6 class="text-light"> </h6>
                        </div>
                        <div class="card-body">
                            <ul class="list-group shadow-none">
                                <li class="list-group-item">
                                    <div class="list-icon">
                                        <!-- <i class="fa-solid "></i> -->
                                        <i class="fa fa-city"></i>
                                    </div>
                                    <div class="list-details">
                                        <span><?php echo $user['city']; ?></span>
                                        <small>City Name</small>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="list-icon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <div class="list-details">
                                        <span><?php echo $user['email']; ?></span>
                                        <small>Email Address</small>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="list-icon">
                                        <i class="fa fa-globe"></i>
                                    </div>
                                    <div class="list-details">
                                        <span>www.example.com</span>
                                        <small>Website Address</small>
                                    </div>
                                </li>
                            </ul>
                            <div class="row text-center mt-4">

                                <div class="col p-2">
                                    <a href="javascript:void(0)" id="logoutButton" class=" btn-logout">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card z-depth-3">
                    <div class="card-body">
                        <ul class="nav nav-pills nav-pills-primary nav-justified">
                            <li class="nav-item">
                                <a href="profile.php" data-target="#profile" data-toggle="pill"
                                    class="nav-link active show"><i class="icon-user"></i> <span
                                        class="hidden-xs">Profile</span></a>
                            </li>
                            <!-- <li class="nav-item">
                                <a href="javascript:void();" data-target="#messages" data-toggle="pill" class="nav-link"><i class="icon-envelope-open"></i> <span class="hidden-xs">Post</span></a>
                            </li> -->
                            <li class="nav-item">
                                <a href="update.php" data-target="#edit" data-toggle="pill" class="nav-link"><i
                                        class="icon-note"></i> <span class="hidden-xs">Edit</span></a>
                            </li>
                        </ul>
                        <br><br>
                        <ul class="list-style9 no-margin">
                            <li>

                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-user text-black "></i>
                                        <strong class="margin-10px-left text-black">First Name:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p><?php echo $user['fname']; ?></p>
                                    </div>
                                </div>

                            </li>
                            <li>

                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="far fa-user text-black"></i>
                                        <strong class="margin-10px-left text-black">Last Name:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p> <?php echo $user['lname']; ?></p>
                                    </div>
                                </div>

                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-envelope text-black"></i>
                                        <strong class="margin-10px-left xs-margin-four-left text-black">Email:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p><?php echo $user['email']; ?></p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="far fa-user text-black"></i>
                                        <strong class="margin-10px-left text-black">Gender:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p><?php echo ucfirst($user['gender']); ?></p>
                                    </div>
                                </div>
                            </li>
                            <li>

                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-map-marker-alt text-black"></i>
                                        <strong class="margin-10px-left text-black">City:</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p><?php echo $user['city']; ?></p>
                                    </div>
                                </div>

                            </li>
                            <div class="row">
                                <div class="col p-2">
                                    <a href="update.php" class=" btn-custom">Update Profile</a>
                                </div>
                            </div>

                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#logoutButton').click(function () {
           
                $.ajax({
                    url: 'logout.php', 
                    type: 'POST',      
                    dataType: 'json', 
                    success: function (response) {
                       
                        if (response.message === "Logged out successfully") {
                           
                            window.location.href = "login.php"; 
                        } else {
                            alert("Logout failed. Please try again.");
                        }
                    },
                    error: function (xhr, status, error) {
                        
                        console.error("Logout failed: " + error);
                        alert("An error occurred. Please try again.");
                    }
                });
            });
        });


    </script>


</body>

</html>
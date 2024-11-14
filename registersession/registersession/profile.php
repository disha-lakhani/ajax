<?php
   session_start();
   include 'mydata.php';
   
   
   if (!isset($_SESSION['email'])) {
       header('Location: login.php');
       exit();
   }
   
   $email = $_SESSION['email'];
   
   
   $sql = "SELECT id, firstname, lastname, gender, city, country,profileImg,image_name FROM users WHERE email = '$email'";
   $result = $conn->query($sql);
   
   if ($result->num_rows > 0) {
       $row = $result->fetch_assoc();
       $images = json_decode($row['image_name'], true) ?? [];
   } else {
       echo "<script>alert('User not found!'); window.location.href = 'login.php';</script>";
       exit();
   }
   ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


    <div class="container emp-profile ">
        <form method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">

                        <!-- <div class="file btn btn-lg btn-primary"> -->
                        <p><img src="uploads/<?php echo $row['profileImg']; ?>" alt="Profile Image" width="100"
                                height="100" class="proimg"></p>

                        <!-- </div> -->
                    </div>
                </div>
                <div class="col">
                    <div class="profile-head">
                        <h5>
                            Welcome, <?php echo $row['firstname'] . ' ' . $row['lastname']; ?>!
                        </h5>
                        <h6>
                            Web Developer and Designer
                        </h6>
                        <div class="row">
                            <div class="col-md-6">
                                <label>User Id</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $row['id']; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Name</label>
                            </div>
                            <div class="col-md-6">
                                <p> <?php echo $row['firstname']; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Email</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $email; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Phone</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $row['gender']; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Profession</label>
                            </div>
                            <div class="col-md-6">
                                <p><?php echo $row['country']; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Profession</label>
                                <?php foreach ($images as $image) {  ?>
                                <div style="display: inline-block; margin: 10px;">
                                    <img src="uploads/<?= htmlspecialchars($image); ?>" alt="Image" width="100px"
                                        height="100px">
                                    <div class="d-flex">
                                        <form action="delete.php" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this image?');"
                                            enctype="multipart/form-data">
                                            <input type="hidden" name="image_name"
                                                value="<?= htmlspecialchars($image); ?>">
                                            <input type="hidden" name="user_id"
                                                value="<?= htmlspecialchars($row['id']); ?>">
                                            <button class="btn btn btn-info m-2" type="submit">Delete</button>
                                        </form>
                                        <form action="add_img.php" method="POST" enctype="multipart/form-data">
                                            <button type="submit" class="btn m-2 btn-success mx-4">Add Images</button>
                                            <!-- <label for="new_images">Upload New Images:</label> -->
                                            <input type="file" name="new_images[]" multiple>
                                            <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">

                                        </form>
                                    </div>
                                </div>


                                <?php } ?>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/> -->
                    <a href="update.php?id=<?php echo $row['id']; ?>" class="updatbtn">UpdateProfile</a>
                    <a href="logout.php" class=" ml-2 ">Logout</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-work">
                        <p>WORK LINK</p>
                        <a href="">Website Link</a><br />
                        <a href="">Bootsnipp Profile</a><br />
                        <a href="">Bootply Profile</a>
                        <p>SKILLS</p>
                        <a href="">Web Designer</a><br />
                        <a href="">Web Developer</a><br />
                        <a href="">WordPress</a><br />
                        <a href="">WooCommerce</a><br />
                        <a href="">PHP, .Net</a><br />
                    </div>
                </div>

            </div>
        </form>
    </div>

</body>

</html>
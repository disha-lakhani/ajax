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
    <title>Profile Page</title>

    <!-- Custom Css -->
    <link rel="stylesheet" href="style.css">

    <!-- FontAwesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <style>
        .deltebtn{
            width: 100px;
            height:30px;
            background:#ff6699;
            color:white;
            border:none;        
        }
        .addbtn{
            background:#6666ff;
        }
    </style>
</head>
<body>
    <!-- Navbar top -->
    <div class="navbar-top">
        <div class="title">
            <h1>Profile</h1>
        </div>

        <!-- Navbar -->
        <ul>
            <li>
                <a href="#message">
                    <span class="icon-count">29</span>
                    <i class="fa fa-envelope fa-2x"></i>
                </a>
            </li>
            <li>
                <a href="#notification">
                    <span class="icon-count">59</span>
                    <i class="fa fa-bell fa-2x"></i>
                </a>
            </li>
            
        </ul>
        <!-- End -->
    </div>
    <!-- End -->

    <!-- Sidenav -->
    <div class="sidenav">
        <div class="profile">
        <p><img src="uploads/<?php echo $row['profileImg']; ?>" alt="ProfileImage" width="150" height="150" class="proimg"></p>

            <div class="name">
            <p> <?php echo $row['firstname']; ?></p>
            </div>
            <div class="job">
                Web Developer
            </div>
        </div>

        <div class="sidenav-url">
            <div class="url">
            <a href="updatenew.php?id=<?php echo $row['id']; ?>" class="updatbtn">UpdateProfile</a>
                <hr align="center">
            </div>
            <div class="url">
            <a href="logout.php" class=" ml-2 ">Logout</a>
                <hr align="center">
            </div>
        </div>
    </div>
    <!-- End -->

    <!-- Main -->
    <div class="main">
        <h2>IDENTITY</h2>
        <div class="card">
            <div class="card-body">
                <i class="fa fa-pen fa-xs edit"></i>
                <table>
                    <tbody>
                        <tr>
                            <td>FirstName</td>
                            <td>:</td>
                            <td><p> <?php echo $row['firstname']; ?></p></td>
                        </tr>
                        <tr>
                            <td>LastName</td>
                            <td>:</td>
                            <td><p> <?php echo $row['lastname']; ?></p></td>
                        </tr>
                        <!-- <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><p></p></td>
                        </tr> -->
                        <tr>
                            <td>Gender</td>
                            <td>:</td>
                            <td><p><?php echo $row['gender']; ?></p></td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td>:</td>
                            <td><p><?php echo $row['city']; ?></p></td>
                        </tr>
                        <tr>
                            <td>Job</td>
                            <td>:</td>
                            <td>  <p><?php echo $row['country']; ?></p></td>
                        </tr>
                       
                    </tbody>
                </table>
            </div>
        </div>

        <h2>SOCIAL MEDIA</h2>
        <div class="card">
            <div class="card-body">
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
                                            <button class="deltebtn" type="submit">Delete</button>
                                        </form>
                                        <form action="add_img.php" method="POST" enctype="multipart/form-data">
                                            <button type="submit" class="deltebtn addbtn">Add Images</button>
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
    <!-- End -->
</body>
</html>
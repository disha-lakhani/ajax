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
      <!-- <script src="jquery-3.7.1.js"></script> -->
      <style>
         .updatbtn{
         background:lightgray;
         }
         .proimg {
         max-width: 150px; /* Constrain to maximum width */
         height: auto; /* Maintain aspect ratio */
         }
      </style>
   </head>
   <body>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <div class="container emp-profile">
         <form method="post" enctype="multipart/form-data">
            <div class="row">
               <div class="col-md-4">
                  <div class="profile-img">
                     <p><img src="uploads/<?php echo $row['profileImg']; ?>" alt="Profile Image" width="100" height="100" class="proimg"></p>
                     <div class="file btn btn-lg btn-primary">
                        <input type="file" name="file"/>
                     </div>
                  </div>
               </div>
               <div class="">
                  <div class="profile-head">
                     <h2>
                        Welcome, <?php echo $row['firstname'] . ' ' . $row['lastname']; ?>!
                     </h2>
                     <br>
                     <h6>
                     </h6>
                     <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
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
                                 <p><?php echo $row['email']; ?></p>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <label>Gender</label>
                              </div>
                              <div class="col-md-6">
                                 <p><?php echo $row['gender']; ?></p>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <label>City</label>
                              </div>
                              <div class="col-md-6">
                                 <p><?php echo $row['city']; ?></p>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <label>Country</label>
                              </div>
                              <div class="col-md-6">
                                 <p><?php echo $row['country']; ?></p>
                              </div>
                           </div>
                           <div class="row">
                            
                           <div class="col-md-6">
                                 <label>Country</label>
                              </div>
                                 
                              <div class="col-md-6">
                                 <?php foreach ($images as $image) { ?>
                                 <div style="display: inline-block; margin: 10px;">
                                    <img src="uploads/<?= htmlspecialchars($image); ?>" alt="Image" width="100px" height="100px">
         <form action="delete.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this image?');">
         <input type="hidden" name="image_name" value="<?= htmlspecialchars($image); ?>">
         <input type="hidden" name="user_id" value="<?= htmlspecialchars($row['id']); ?>">
         <button class="btn btn-danger" type="submit">Delete</button>
         </form>
         </div>
         <?php } ?>

        </div>
         </div>
         </div>
         </div>
         <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
         <div class="row">
         <div class="col-md-6">
         <label>Experience</label>
         </div>
         <div class="col-md-6">
         <p>Expert</p>
         </div>
         </div>
         <div class="row">
         <div class="col-md-6">
         <label>Hourly Rate</label>
         </div>
         <div class="col-md-6">
         <p>10$/hr</p>
         </div>
         </div>
         <div class="row">
         <div class="col-md-6">
         <label>Total Projects</label>
         </div>
         <div class="col-md-6">
         <p>230</p>
         </div>
         </div>
         <div class="row">
         <div class="col-md-6">
         <label>English Level</label>
         </div>
         <div class="col-md-6">
         <p>Expert</p>
         </div>
         </div>
         <div class="row">
         <div class="col-md-6">
         <label>Availability</label>
         </div>
         <div class="col-md-6">
         <p>6 months</p>
         </div>
         </div>
         <div class="row">
         <div class="col-md-12">
         <label>Your Bio</label><br/>
         <p>Your detail description</p>
         </div>
         </div>
         </div>
         </div>  
        
         </div>
         </div>
         
         <!-- <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/> -->
         <div class="row">
         <a href="update.php?id=<?php echo $row['id']; ?>" height="50px">UpdateProfile</a>
         <a href="logout.php" class="btn btn-light ml-2 ">Logout</a>
         </div>
        
         </div>
         <div class="row">
            <div class="col-md-4">
               <div class="profile-work">
                  <p>WORK LINK</p>
                  <a href="">Website Link</a><br/>
                  <a href="">Bootsnipp Profile</a><br/>
                  <a href="">Bootply Profile</a>
                  <p>SKILLS</p>
                  <a href="">Web Designer</a><br/>
                  <a href="">Web Developer</a><br/>
                  <a href="">WordPress</a><br/>
                  <a href="">WooCommerce</a><br/>
                  <a href="">PHP, .Net</a><br/>
               </div>
            </div>
            
         </div>
         </form>           
      </div>
   </body>
</html>
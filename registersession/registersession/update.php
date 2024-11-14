<?php
include 'mydata.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id=$_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    // $email = $_POST['email'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];
    $country = $_POST['country'];
  

    if (isset($_FILES['profileImg']) && $_FILES['profileImg']['error'] == UPLOAD_ERR_OK) {
      $profileImg = $_FILES['profileImg']['name'];
      $temp_name = $_FILES['profileImg']['tmp_name'];
      $folder = "./uploads/";
   
    if (move_uploaded_file($temp_name, $folder . $profileImg)) {
    
      $sql = "UPDATE users SET firstname='$firstname', lastname='$lastname', agender='$gender', 
             city='$city', country='$country', profileImg='$profileImg' 
              WHERE id=$id";
  } else {
      echo "Failed to upload new image.";
      exit;
  }
}

  
  $sql = "UPDATE users SET firstname='$firstname', lastname='$lastname', 
          gender='$gender', city='$city', country='$country' 
          WHERE id=$id";

if ($conn->query($sql) === true) {
  header("Location: profile.php");
  exit;
} else {
  echo "Error updating record: " . $conn->error;
}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">	
<script src="jquery-3.7.1.js"></script>
	<!-- <script src="validation.js"></script> -->
	<style>
		body {
			background-color: cadetblue;
		}
	</style>
</head>

<body>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <?php

include 'mydata.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$id = $_GET['id']; 
$gender=isset($_GET['gender'])?$_GET['gender']:null;
$sql = "SELECT * FROM users WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    $row = $result->fetch_assoc();
?>
<form action=""  enctype="multipart/form-data" method="post">
	<div class="container">
		<div class="container">
			<br>
			<!-- <p class="text-center">Registration form <a href="http://bootstrap-ecommerce.com/">our website </a></p> -->
			

			<div class="row justify-content-center">
				<div class="col-md-5">
					<div class="card">
						<header class="card-header">
							<!-- <a href="login.php" class="float-right btn btn-outline-primary mt-1">Log in</a> -->
							<h4 class="card-title mt-2">UpdateProfile</h4>
						</header>
						<article class="card-body">
							<form action="" method="POST" id="data" enctype="multipart/form-data">
								<div class="form-row">
									<div class="col form-group">
                                   
										<label>First name </label>
                                         <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
										<input type="text" class="form-control" placeholder="Enter name" id="firstname"
											name="firstname" value="<?php echo $row['firstname']; ?>">
										<!-- <span id="text1" style="color: red;">please enter name</span> -->
									</div>
									<div class="col form-group">
										<label>Last name</label>
										<input type="text" class="form-control" placeholder="Enetr lastname "
											id="lastname" name="lastname"  value="<?php echo $row['lastname']; ?>">
										<!-- <span id="demo7" style="color: red;">Please enter email</span> -->
									</div>
								</div>
								<div>
								<div class="form-row">
								<!-- <div class="form-group">
									<label>Email address</label>
									<input type="email" class="form-control" placeholder="Enter your email" id="email"
										name="email">
									<span id="demo" style="color: red;">Please enter email</span>
								</div> -->
								<div class="form-group pt-4 pl-2">
									
									<label class="form-check form-check-inline">
										<input class="form-check-input" type="radio" id="male" name="gender"
											value="Male" value="Male" <?php if ($gender != "Female") echo "checked"; ?>>
										<span class="form-check-label"> Male </span>
									</label>
									<label class="form-check form-check-inline">
										<input class="form-check-input" type="radio" id="female" name="gender"
											value="Female" <?php if ($gender == "Female") echo "checked"; ?>>
										<span class="form-check-label"> Female</span>
									</label>
									<!-- <span id="demo3" style="color: red;">Please select gender</span> -->
								</div>
							</div>
								<div class="form-row">
									<div class="col form-group">
										<label>City</label>
										<input type="text" class="form-control w-100" id="city" name="city"
											placeholder="Enter city" value="<?php echo $row['city']; ?>">
										<!-- <span id="demo4" style="color: red;">Please enter city</span> -->
									</div>
									<div class="col form-group">
										<label>Country</label>
										<select id="inputState" class="form-control" id="country" name="country" value="<?php echo $row['country']; ?>">
											<option> Choose...</option>
											<option value="Uzbekistan" <?php if ($row['country'] == 'Uzbekistan') echo 'selected'; ?>>Uzbekistan</option>
											<option value="Russia" <?php if ($row['country'] == 'Russia') echo 'selected'; ?>>Russia</option>

											<option value="India" <?php if ($row['country'] == 'India') echo 'selected'; ?>>India</option>
											<option value="Afganistan" <?php if ($row['country'] == 'Afganistan') echo 'selected'; ?>>Afganistan</option>
										</select>
										<!-- <span id="demo1" style="color: red;">Please select country</span> -->
									</div>
                                    <div>
        
									<div class="col form-group">
										<label for="email" class="form-label">Profile <span
												class="text-danger"></span></label>
										<input type="file" id="profileImg" name="profileImg" accept="image/*"><br>
									</div>
								</div>
								<!-- <div class="form-group ps-0">
									<label for="email" class="form-label">Gallery<span
											class="text-danger"></span></label>
									<input type="file" id="image" name="image[]" accept="image/*" multiple><br>
								</div> -->
					</div>
					<!-- <div class=" form-group">
						<label>Create password</label>
						<input class="form-control" type="password" id="password" name="password"
							placeholder="Enter Your Password">
						<span id="demo5" style="color: red;">Please enter password</span>
					</div> -->
					<div class="form-group">

						<button type="submit" name="upload" class="btn  btn-success btn-block w-100"> Update</button>

					</div>

					</form>
					</article>

				</div>
			</div>
		</div>
	</div>
    </form>
    <?php
} else {
    echo "No student found!";
}
?>
</body>

</html>
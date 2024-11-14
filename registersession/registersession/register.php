<?php
include 'mydata.php';  

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $hashed_password = md5($_POST['password']);

    $sql_check = "SELECT * FROM users WHERE email = '$email'";
    $result_check = $conn->query($sql_check);
    if ($result_check->num_rows > 0) {
        $error = "This email is already registered.";
    } else {

    if (isset($_FILES['profileImg']) && $_FILES['profileImg']['error'] == UPLOAD_ERR_OK) {
        $profileImg = $_FILES['profileImg']['name'];
        $temp_name = $_FILES['profileImg']['tmp_name'];
        $folder = "./uploads/";

        if (!move_uploaded_file($temp_name, $folder . $profileImg)) {
            echo "Failed to upload profile image.<br>";
        }
    } else {
        echo "No profile image uploaded or there was an error.<br>";
    }

    
    $multiple_images = [];
    if (isset($_FILES['image'])) {
        $total_files = count($_FILES['image']['name']);
        $folder = "./uploads/";

        for ($i = 0; $i < $total_files; $i++) {
            $image_name = $_FILES['image']['name'][$i];
            $temp_name = $_FILES['image']['tmp_name'][$i];

            if (move_uploaded_file($temp_name, $folder . $image_name)) {
                $multiple_images[] = $image_name;
            } else {
                echo "Failed to upload image: " . $image_name . "<br>";
            }
        }
    }
    $multiple_images_json = json_encode($multiple_images);

    
    $stmt = $conn->prepare("INSERT INTO users (firstname, lastname, email, gender, city, country, password, profileImg, image_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $firstname, $lastname, $email, $gender, $city, $country, $hashed_password, $profileImg, $multiple_images_json);

    
    if ($stmt->execute()) {
        echo "Registration successful.";
        header("Location: login.php");
        exit;
    } else {
        echo "Error: " . $stmt->error; 
    }


    $stmt->close();
}
}


$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">	
<script src="jquery-3.7.1.js"></script>
	<script src="validation.js"></script>
	<style>
		body {
			background-color: cadetblue;
            
		}
	</style>
</head>

<body>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<div class="container">
		<div class="container">
			<br>
			<p class="text-center">Registration form <a href="http://bootstrap-ecommerce.com/">our website </a></p>
			<hr>

			<div class="row justify-content-center">
				<div class="col-md-5">
					<div class="card">
						<header class="card-header">
							<a href="login.php" class="float-right btn btn-outline-primary mt-1">Log in</a>
							<h4 class="card-title mt-2">Registration</h4>
						</header>
						<article class="card-body">
							<form action="register.php" method="POST" id="data" enctype="multipart/form-data">
								
								<div class="form-row">
                               
									<div class="col form-group">
										<label>First name </label>
										<input type="text" class="form-control" placeholder="Enter name" id="firstname"
											name="firstname">
										<span id="text1" style="color: red;">please enter name</span>
									</div>
									<div class="col form-group">
										<label>Last name</label>
										<input type="text" class="form-control" placeholder="Enetr lastname "
											id="lastname" name="lastname">
										<span id="demo7" style="color: red;">Please enter email</span>
									</div>
								</div>
								<div>
								<div class="form-row">
								<div class="form-group">
									<label>Email address</label>
									<input type="email" class="form-control" placeholder="Enter your email" id="email"
										name="email">
									<span id="demo" style="color: red;">Please enter email</span>
                                    <?php if (!empty($error)): ?>
                                        <p class="" style="color: red;">
                                            <?php echo $error; ?>
                                    </p>
                                    <?php endif; ?>
								</div>
								<div class="form-group pt-4 pl-2">
									
									<label class="form-check form-check-inline">
										<input class="form-check-input" type="radio" id="male" name="gender"
											value="Male">
										<span class="form-check-label"> Male </span>
									</label>
									<label class="form-check form-check-inline">
										<input class="form-check-input" type="radio" id="female" name="gender"
											value="Female">
										<span class="form-check-label"> Female</span>
									</label>
									<span id="demo3" style="color: red;">Please select gender</span>
								</div>
							</div>
								<div class="form-row">
									<div class="col form-group">
										<label>City</label>
										<input type="text" class="form-control w-100" id="city" name="city"
											placeholder="Enter city">
										<span id="demo4" style="color: red;">Please enter city</span>
									</div>
									<div class="col form-group">
										<label>Country</label>
										<select id="inputState" class="form-control" id="country" name="country">
											<option> Choose...</option>
											<option>Uzbekistan</option>
											<option>Russia</option>

											<option>India</option>
											<option>Afganistan</option>
										</select>
										<span id="demo1" style="color: red;">Please select country</span>
									</div>
									<div class="col form-group">
										<label for="email" class="form-label">Profile <span
												class="text-danger"></span></label>
										<input type="file" id="profileImg" name="profileImg" accept="image/*"><br>
									</div>
								</div>
								<div class="form-group ps-0">
									<label for="email" class="form-label">Gallery<span
											class="text-danger"></span></label>
									<input type="file" id="image" name="image[]" accept="image/*" multiple><br>
								</div>
					</div>
					<div class=" form-group">
						<label>Create password</label>
						<input class="form-control" type="password" id="password" name="password"
							placeholder="Enter Your Password">
						<span id="demo5" style="color: red;">Please enter password</span>
					</div>
					<div class="form-group">

						<button type="submit" name="upload" class="btn btn-primary btn-block w-100"> Register </button>

					</div>

					</form>
					</article>

				</div>
			</div>
		</div>
	</div>
</body>

</html>
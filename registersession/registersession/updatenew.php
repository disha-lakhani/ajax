<?php
include 'mydata.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];
    $country = $_POST['country'];

    
    $profileImg = '';

    
    if (isset($_FILES['profileImg']) && $_FILES['profileImg']['error'] == UPLOAD_ERR_OK) {
        $profileImg = $_FILES['profileImg']['name'];
        $temp_name = $_FILES['profileImg']['tmp_name'];
        $folder = "./uploads/";

        
        if (!move_uploaded_file($temp_name, $folder . $profileImg)) {
            echo "Failed to upload new image.";
            exit;
        }
    }

    
    if ($profileImg) {
        $sql = "UPDATE users SET firstname=?, lastname=?, gender=?, city=?, country=?, profileImg=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssssssi', $firstname, $lastname, $gender, $city, $country, $profileImg, $id);
    } else {
        $sql = "UPDATE users SET firstname=?, lastname=?, gender=?, city=?, country=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssssi', $firstname, $lastname, $gender, $city, $country, $id);
    }

    
    if ($stmt->execute()) {
        header("Location: newprofile.php");
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
    <title>Profile Page</title>

    
    <link rel="stylesheet" href="style.css">

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <style>
        table tr td input{

            border:none;
            border-bottom:1px solid lightgray;
            
          
        }
        .updbtn{
            width: 100px;
            height:50px;
            background:black;
            color:white;
            font-size:20px;
            letter-spacing:2px;
        }
        body{
            font-family: "Times New Roman", serif;

        }
        .imputimg{
            border:none;
            
        }
      
    </style>
</head>
<body>
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
    
    <div class="navbar-top">
        <div class="title">
            <h1>Profile</h1>
        </div>

       
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
            <li>
                <a href="#sign-out">
                    <i class="fa fa-sign-out-alt fa-2x"></i>
                </a>
            </li>
        </ul>
        
    </div>
    
    <div class="sidenav">
        <div class="profile">
        <p><img src="uploads/<?php echo $row['profileImg']; ?>" alt="Profile Image" width="100" height="100" class="proimg"></p>

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
  
    <div class="main">
        <h2>IDENTITY</h2>
        <div class="card">
            <div class="card-body">
                <i class="fa fa-pen fa-xs edit"></i>
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                <table>
                    <tbody>
                        <tr>
                            <td>Name</td>
                            <td>:</td>
                            <td><input type="text" class="form-control" placeholder="Enter name" id="firstname"
                            name="firstname" value="<?php echo $row['firstname']; ?>"></td>
                        </tr>
                        <tr>
                            <td>LastName</td>
                            <td>:</td>
                            <td><input type="text" class="form-control" placeholder="Enetr lastname "
                            id="lastname" name="lastname"  value="<?php echo $row['lastname']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>:</td>
                            <td><label class="form-check form-check-inline">
										<input class="form-check-input" type="radio" id="male" name="gender"
											value="Male" value="Male" <?php if ($gender != "Female") echo "checked"; ?>>
										<span class="form-check-label"> Male </span>
									</label>
									<label class="form-check form-check-inline">
										<input class="form-check-input" type="radio" id="female" name="gender"
											value="Female" <?php if ($gender == "Female") echo "checked"; ?>>
										<span class="form-check-label"> Female</span>
									</label></td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td>:</td>
                            <td>	<input type="text" class="form-control w-100" id="city" name="city"
                            placeholder="Enter city" value="<?php echo $row['city']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td>:</td>
                            <td> <select id="inputState" class="form-control" id="country" name="country" value="<?php echo $row['country']; ?>">
											<option> Choose...</option>
											<option value="Uzbekistan" <?php if ($row['country'] == 'Uzbekistan') echo 'selected'; ?>>Uzbekistan</option>
											<option value="Russia" <?php if ($row['country'] == 'Russia') echo 'selected'; ?>>Russia</option>

											<option value="India" <?php if ($row['country'] == 'India') echo 'selected'; ?>>India</option>
											<option value="Afganistan" <?php if ($row['country'] == 'Afganistan') echo 'selected'; ?>>Afganistan</option>
										</select></td>
                        </tr>
                        <tr>
                            <td>Profile</td>
                            <td>:</td>
                            <td><input type="file" id="profileImg" name="profileImg" accept="image/*" class="imputimg"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <button type="submit" name="upload" class="updbtn"> Save</button>
        </div>
        
        
</form>
    <?php
} else {
    echo "No student found!";
}
?>
</body>
</html>
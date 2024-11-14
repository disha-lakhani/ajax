<?php
include 'mysqldb.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id=$_POST['id'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $address=$_POST['address'];
    $gender=$_POST['gender'];
    $pincode=$_POST['pincode'];
    $course=$_POST['course'];
    $email=$_POST['email'];
    $sql="update students set firstname='$firstname',lastname='$lastname',address='$address',gender='$gender',pincode='$pincode',course='$course',email='$email' where id=$id";

    if($conn->query($sql)===true){
        echo "data update succefully...";
        header("Location:display.php");
    }
    else{
        echo "error update".$conn_error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="jquery-3.7.1.js"></script> 
    <script src="validation.js"></script> 
</head>
<body>

<?php

include 'mysqldb.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$id = $_GET['id']; 
$gender=isset($_GET['gender'])?$_GET['gender']:null;
$sql = "SELECT * FROM students WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    $row = $result->fetch_assoc();
?>

<form action="" method="POST"  class="w-50 m-auto" id="data">
   
    
<section class="">
  <div class="container">
  
     
        <div class="card card-registration my-4">
          <div class="row g-0">
           
            <div class="col-lg-12">
              <div class="card-body p-md-5 text-black">
                <h3 class="text-uppercase">Student Update  Data</h3>
                <div class="col-lg-12 mb-4">
                    <div data-mdb-input-init class="form-outline">
                    <label class="form-label" for="form3Example1n"></label>
                    
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                    </div>
                  </div>
              
                <div class="row">
                  <div class="col-lg-12">
                    <div data-mdb-input-init class="form-outline">
                    <label class="form-label" for="form3Example1m">First name</label>
                      <input type="text" id="firstname" name="firstname" class="form-control form-control-lg" value="<?php echo $row['firstname']; ?>" />
                   
                      <span id="demo1" style="color: red;">Please enter name</span>
                    </div>
                  </div>
                  <div class="col-lg-12 mb-4">
                    <div data-mdb-input-init class="form-outline">
                    <label class="form-label" for="form3Example1n">Last name</label>
                      <input type="text" id="lastname" name="lastname" class="form-control form-control-lg"  value="<?php echo $row['lastname']; ?>" />
                      <span id="demo2" style="color: red;">Please enter lastname</span>
                    </div>
                  </div>
                </div>

               

                <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="form3Example8">Address</label>
                  <input type="text" id="address" name="address" class="form-control form-control-lg" value="<?php echo $row['address']; ?>"  />
                  <span id="demo3" style="color: red;">Please enter Address</span>
                </div>

                <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                  <h6 class="mb-0 me-4">Gender: </h6>

                  <div class="form-check form-check-inline mb-0 me-4">
                    <input class="form-check-input" type="radio" id="female" name="gender"  value="Female" <?php if ($gender == "Female") echo "checked"; ?>/>
                    <label class="form-check-label" for="femaleGender">Female</label>
                  </div>

                  <div class="form-check form-check-inline mb-0 me-4">
                    <input class="form-check-input" type="radio" id="male" name="gender"  value="Male" <?php if ($gender != "Female") echo "checked"; ?> />
                    <label class="form-check-label" for="maleGender">Male</label>
                  </div>

                  <span id="demo4" style="color: red;">Please select gender</span>

                </div>

               

                
                <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="form3Example90">Pincode</label>
                  <input type="text" id="pincode" name="pincode" class="form-control form-control-lg"  value="<?php echo $row['pincode']; ?>"/>
                  <span id="demo5" style="color: red;">Please enter pincode</span>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="form3Example99">Course</label>
                  <input type="text"id="course" name="course" class="form-control form-control-lg"  value="<?php echo $row['course']; ?>"/>
                  <span id="demo6" style="color: red;">Please enter course</span>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="form3Example97">Email ID</label>
                  <input type="text" id="email" name="email" class="form-control form-control-lg"value="<?php echo $row['email']; ?>" />
                  <span id="demo7" style="color: red;">Please enter email</span>
                </div>

                <div class="d-flex justify-content-end">
                 
                  <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-warning btn-lg ms-2" name="update" value="Update">Update</button>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


    <!-- <input type="submit" value="Update"> -->
</form>
<?php
} else {
    echo "No student found!";
}
?>
</body>
</html>


<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "php_db";

$conn = mysqli_connect($server,$username,$password,$db);

if (!$conn) {
  die("connection failed : " . mysqli_connect_error());
}

$id = $_GET['id'];
$student = [];

if (isset($id)) {
  $sql = "SELECT * FROM student WHERE id=$id";
  $result = mysqli_query($conn, $sql);
  if ($result && mysqli_num_rows($result) > 0) {
    $student = mysqli_fetch_assoc($result);
  }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $class = $_POST['class'];

  $sql = "UPDATE student SET fname='$fname',lname='$lname',email='$email',class='$class' WHERE id=$id";

  if(mysqli_query($conn, $sql)){
            echo json_encode(["status"=>"success", "message"=>"Student data added successfully"]);
        } else {
            echo json_encode(["status"=>"error", "message"=>"Error: " . mysqli_error($conn)]);
        }
       
} 

mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Form</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #f8f9fa;

    }

    #stdform {
      width: 100%;
      max-width: 500px;
      padding: 20px;
      background-color: white;
      border-radius: 5px;
      box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
    }

    .btn {
      width: 100%;
    }
    .error{
      color: red;
    }
  </style>
</head>

<body>

  <form action="" id="stdform" method="POST">
    <center>
      <h2>UPDATE STUDENTS DATA</h2>
    </center><br>
    <div class="mb-3 mt-3">
      <label for="fname" class="form-label">FIRST NAME:</label>
      <input type="text" class="form-control" id="fname" placeholder="Enter first name" name="fname" value="<?php echo isset($student['fname']) ? $student['fname'] : ''; ?>" >
      <small id="fnameError" class="error"></small>
    </div>
    <div class="mb-3 mt-3">
      <label for="lname" class="form-label">LAST NAME:</label>
      <input type="text" class="form-control" id="lname" placeholder="Enter last name" name="lname" value="<?php echo isset($student['lname']) ? $student['lname'] : ''; ?>" >
      <small id="lnameError" class="error"></small>
    </div>
    <div class="mb-3 mt-3">
      <label for="email" class="form-label">EMAIL:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo isset($student['email']) ? $student['email'] : ''; ?>" >
      <small id="emailError" class="error"></small>
    </div>
    <div class="mb-3">
      <label for="class" class="form-label">CLASS:</label>
      <input type="text" class="form-control" id="class" placeholder="Enter class" name="class" value="<?php echo isset($student['class']) ? $student['class'] : ''; ?>" >
      <small id="classError" class="error"></small>
    </div>
    <button type="submit" class="btn btn-primary" id="updateButton">UPDATE STUDENT</button>
    <small id="resultMessage"></small>
  </form> 

  <script>
    $(document).ready(function() {
      $("#stdform").validate({
        rules: {
          fname: { required: true, minlength: 2 },
          lname: { required: true, minlength: 2 },
          email: { required: true, minlength: 2 },
          class: { required: true, minlength: 2 }
        },
        messages: {
          fname: { required: "Please enter student's first name.", minlength: "First name must be at least 2 characters" },
          lname: { required: "Please enter student's last name.", minlength: "Last name must be at least 2 characters" },
          email: { required: "Please enter student's email.", minlength: "Email must be at least 2 characters" },
          class: { required: "Please enter student's class.", minlength: "Class must be at least 2 characters" }
        }
      });

      $('#updateButton').click(function(e) 
      {
        e.preventDefault();
        if ($("#stdform").valid()) {  
          $.ajax({
            url: "update.php",  
            type: "POST",
            data: {
              fname: $("#fname").val(),
              lname: $("#lname").val(),
              email: $("#email").val(),
              class: $("#class").val()
            },
            success: function(response) {
              $('#resultMessage').text("Student data updated successfully.").css('color', 'green');
              setTimeout(function() {
                window.location.href = "index.php";
              }, 2000);
            },
            error: function(xhr, status, error) {
              $('#resultMessage').text("Error updating data: " + error).css('color', 'red');
            }
          });
        }
      });
    });
  </script>
</body>

</html>
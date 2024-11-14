<?php 
    $server="localhost";
    $username="root";
    $password="";
    $db="php_db";

    $conn=mysqli_connect($server,$username,$password,$db);

    if(!$conn){
        die("connection failed : ".mysqli_connect_error());
    }
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $class=$_POST['class'];

        $sql="INSERT INTO student (fname, lname, email, class) VALUES('$fname', '$lname', '$email', '$class')";

        if(mysqli_query($conn, $sql)){
            echo json_encode(["status"=>"success", "message"=>"Student data added successfully"]);
        } else {
            echo json_encode(["status"=>"error", "message"=>"Error: " . mysqli_error($conn)]);
        }
        exit();
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
        .error {
            color: red;
        }
        #loadingIcon {
            display: none;
            text-align: center;
        }
        #loadingIcon::after {
            content: "";
            display: inline-block;
            width: 30px;
            height: 30px;
            border: 3px solid #ccc;
            border-top: 3px solid #333;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>

<form action="" id="stdform" method="post">
   <center><h2>ADD STUDENT DATA</h2></center><br>
   <div class="mb-3 mt-3">
       <label for="fname" class="form-label">FIRST NAME:</label>
       <input type="text" class="form-control" id="fname" placeholder="Enter first name" name="fname">
       <small id="fnameError" class="error"></small>
   </div>
   <div class="mb-3 mt-3">
       <label for="lname" class="form-label">LAST NAME:</label>
       <input type="text" class="form-control" id="lname" placeholder="Enter last name" name="lname">
       <small id="lnameError" class="error"></small>
   </div>
   <div class="mb-3 mt-3">
       <label for="email" class="form-label">EMAIL:</label>
       <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
       <small id="emailError" class="error"></small>
   </div>
   <div class="mb-3">
       <label for="class" class="form-label">CLASS:</label>
       <input type="text" class="form-control" id="class" placeholder="Enter class" name="class">
       <small id="classError" class="error"></small>
   </div>
   <button type="submit" class="btn btn-primary">ADD STUDENT</button>
</form>

<div id="loadingIcon">
    <img src="loading.gif" alt="Loading..." width="50" height="50">
</div>
<div id="responseMessage"></div>

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
        fname: { required: "Please enter student's first name.", minlength: "First name must be at least 2 characters." },
        lname: { required: "Please enter student's last name.", minlength: "Last name must be at least 2 characters." },
        email: { required: "Please enter student's email.", minlength: "Email must be at least 2 characters." },
        class: { required: "Please enter student's class.", minlength: "Class must be at least 2 characters." }
      },
      submitHandler: function(form) {
        $.ajax({
          url: "insert.php",  
          type: "POST",
          data: $(form).serialize(),
          dataType: "json",

          beforeSend: function() {
            alert("please waitt...")
            $("#loadingIcon").show();
            
            $("button[type='submit']").attr("disabled", true);
          },

          success: function(response) {
            if(response.status === "success") {
              $("#responseMessage").html("<p style='color:green;'>" + response.message + "</p>");
              $("#stdform")[0].reset();
              setTimeout(function() {
                window.location.href = "index.php";
              }, 5000);
            } else {
              $("#responseMessage").html("<p style='color:red;'>" + response.message + "</p>");
            }
          },

          error: function(jqXHR, textStatus, errorThrown) {
            console.error("AJAX error:", textStatus, errorThrown);
            $("#responseMessage").html("<p style='color:red;'>An error occurred.</p>");
          },

          complete: function() {
            $("#loadingIcon").hide();
            $("button[type='submit']").attr("disabled", false);
          }
        });
      }
    });
  });
</script>

</body>
</html>

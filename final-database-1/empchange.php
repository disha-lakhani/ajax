

<?php

include 'db.php';

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $ename = $_POST['ename'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $salary = $_POST['salary'];
    $dept = $_POST['dept'];

   
    $sql = "UPDATE employees SET ename='$ename', email='$email', contact='$contact', salary='$salary', dept='$dept' WHERE id=$id";


    if (mysqli_query($conn, $sql)) {
      
        header("Location: display.php");
        exit();
    } else {
       
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {

    $sql = "SELECT * FROM employee WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $emp = mysqli_fetch_assoc($result);
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>employee</title>
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="validation.js"></script>

<style>
    body {
 
 opacity: 1;
       display: flex;
       justify-content: center;
       align-items: center;
       height: 100vh; 
       background-color: #f8f9fa;
     
   }
   h2{
     background-color: aliceblue;
     padding: 20px 0;
   }
   #empform {
       width: 100%; 
       max-width: 600px; 
       padding: 20px; 
       background-color: transparent; 
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

<form action="" id="empform" method="post">
   <center> <h2>UPDATE EMPLOYEES DATA</h2></center><br>
  <div class="mb-3 mt-3">
    <label for="fname" class="form-label">ENAME:</label>
    <input type="text" class="form-control" id="ename" placeholder="Enter employee name.." name="ename" value="<?php echo $emp['ename']; ?>" >
    <span id="demo1" class="error">please enter employees name</span>
  </div>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">EMAIL:</label>
    <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $emp['email']; ?>">
    <span id="demo2" class="error">enter valid email address</span>
  </div>
  <div class="mb-3">
    <label for="class" class="form-label">CONTACT:</label>
    <input type="number" class="form-control" id="contact" placeholder="Enter contact no.." name="contact" value="<?php echo $emp['contact']; ?>" >
    <span id="demo3" class="error">please enter contact nunber (only 10 digits allowed )</span>
  </div>
  <div class="mb-3">
    <label for="class" class="form-label">SALARY:</label>
    <input type="number" class="form-control" id="salary" placeholder="Enter salary.." name="salary" value="<?php echo $emp['salary']; ?>" >
    <span id="demo4" class="error">please enter employees salary</span>
  </div>
  <div class="mb-3 mt-3">
    <label for="lname" class="form-label">DEPARTMENT:</label>
    <input type="text" class="form-control" id="dept" placeholder="Enter department.." name="dept" value="<?php echo $emp['dept']; ?>">
    <span id="demo5" class="error">please enter employees department</span>
  </div>
  <button type="submit" class="btn btn-primary">UPDATE EMPLOYEE</button>
</form>

</body>
</html>
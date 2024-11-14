<?php
include 'mysqldb.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $address=$_POST['address'];
    $gender=$_POST['gender'];
    $pincode=$_POST['pincode'];
    $course=$_POST['course'];
    $email=$_POST['email'];



  $sql=  "INSERT INTO students (firstname, lastname, address, gender, pincode, course, email) 
VALUES 
('$firstname', '$lastname', '$address', '$gender', '$pincode', '$course', '$email')";

  if($conn->query($sql)===TRUE){
    echo "indert data succefully....";
     header("Location:display.php");
  }
  else{
    echo "error".$sql.$conn_error;
  }
}

?>
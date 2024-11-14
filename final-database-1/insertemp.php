<?php
include 'db.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $ename=$_POST['ename'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $salary=$_POST['salary'];
    $dept=$_POST['dept'];

    $sql="INSERT INTO employees(ename,email,contact,salary,dept) VALUES ('$ename','$email','$contact','$salary','$dept')";

    if(mysqli_query($conn,$sql)){
        header("location:display.php");
        exit();
    }
    else{
        echo "error : ".$sql.mysqli_error($conn);
    }
}
mysqli_close($conn);


?>
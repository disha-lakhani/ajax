<?php


include 'db.php';


if($_SERVER["REQUEST_METHOD"] == "POST"){

    $fname=$_POST['fname'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];

    $sql = "INSERT INTO students (fname, email, contact) VALUES ('$fname', '$email', '$contact')";

    if (mysqli_query($conn,$sql)) {
      header("location:display.php");
      exit();
      
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
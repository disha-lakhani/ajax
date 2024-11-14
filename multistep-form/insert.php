<?php
require 'db.php';

$imagePath = '';
$error = false;

if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
    $targetDirectory = 'uploads/';
    $imagePath = $targetDirectory . basename($_FILES['image']['name']);
    
    if (!is_dir($targetDirectory)) {
        mkdir($targetDirectory, 0755, true);
    }

    if (!move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
        echo "Error uploading image.";
        $error = true;
    }
} else {
    echo "No image uploaded or there was an upload error.";
    header("location:form.php");
    $error = true;
}

$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$field = mysqli_real_escape_string($conn, $_POST['field']);
$dob = mysqli_real_escape_string($conn, $_POST['dob']);
$gender = mysqli_real_escape_string($conn, $_POST['gender']);
$contact = mysqli_real_escape_string($conn, $_POST['contact']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$city = mysqli_real_escape_string($conn, $_POST['city']);
$state = mysqli_real_escape_string($conn, $_POST['state']);
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']); 


if (!$error) {
    $sql = "INSERT INTO std (fname, lname, field, dob, gender, contact, email, address, city, state, image, username, password) 
            VALUES ('$fname', '$lname', '$field', '$dob', '$gender', '$contact', '$email', '$address', '$city', '$state', '$imagePath', '$username', '$password')";

    if (mysqli_query($conn, $sql)) {
        header("Location: display.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
        echo "<br>SQL Query: " . $sql;
    }
}


mysqli_close($conn);
?>

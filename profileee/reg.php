<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $city = $_POST['city'];
    $image = null;


    $email_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $email_check_query);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['error'] = "User with this email already exists";
    }
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "uploads/";
        $image = $_FILES['image']['name'];
        $target_file = $target_dir . basename($image);
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $_SESSION['error'] = "Sorry, there was an error uploading your file.";
        }
    }
    if (!isset($_SESSION['error'])) {
        $sql = "INSERT INTO users (fname, lname, email, gender, password, city, image) 
                VALUES ('$fname', '$lname', '$email', '$gender', '$password',  '$city', '$image')";
        if (mysqli_query($conn, $sql)) {
            header("Location: login.php");
            exit();
        } else {
            $_SESSION['error'] = "Error: " . mysqli_error($conn);
        }
    }
}
mysqli_close($conn);
?>
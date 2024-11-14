<?php
session_start();
include 'db.php';

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

$email = $_SESSION['email'];

// Fetch user data from the database
$sql = "SELECT id, fname, lname, gender, city, image FROM users WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc(); // fetch the user's data
    $images = json_decode($user['image'], true) ?? [];
} else {
    echo "<script>alert('User not found!'); window.location.href = 'login.php';</script>";
    exit();
}
?>
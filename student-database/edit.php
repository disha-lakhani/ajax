<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $course = $_POST['course'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $hobbies = implode(", ", $_POST['hobbie']);
    $password = $_POST['password'];

    $sql = "UPDATE student SET 
            fname='$fname',
            email='$email',
            contact='$contact',
            course='$course',
            gender='$gender',
            address='$address',
            hobbies='$hobbies',
            password='$password'
            WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(['status' => 'success', 'message' => 'Student details updated successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update student details']);
    }
    mysqli_close($conn);
}
?>

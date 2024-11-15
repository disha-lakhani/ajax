<?php
include 'db.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $course = $_POST['course'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $hobbie = isset($_POST['hobbie']) ? implode(", ", $_POST['hobbie']) : '';
    $password = $_POST['password'];

    $image = $_FILES['image']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($image);

    if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo json_encode(["status" => "error", "message" => "File upload failed."]);
        exit;
    }

    $sql = "INSERT INTO student (fname, image, email, contact, course, gender, address, hobbies, password) 
            VALUES ('$fname', '$image', '$email', '$contact', '$course', '$gender', '$address', '$hobbie', '$password')";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(["status" => "success", "message" => "Register successfully!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Database error: " . mysqli_error($conn)]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}

mysqli_close($conn);

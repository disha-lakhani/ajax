<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $course = $_POST['course'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $hobbie = implode(", ", $_POST['hobbie']);
    $password = $_POST['password'];
    
    $image = $_FILES['image']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($image);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    $sql = "INSERT INTO student (fname, image, email, contact, course, gender, address, hobbies, password) 
    VALUES ('$fname', '$image', '$email', '$contact', '$course', '$gender', '$address', '$hobbie', '$password')";

    if ($conn->query($sql) === TRUE) {
       header("location:display.php");
       exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
mysqli_close($conn);

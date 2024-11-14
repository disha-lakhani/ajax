<?php
session_start();
include 'db.php';

if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit();
}

$id = $_SESSION['id'];

$sql = "SELECT id, fname, lname, email, gender, city, image FROM users WHERE id = '$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    die("User not found."); 
}

if (isset($_POST['update'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $city = $_POST['city'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $allowedfileExtensions = array('jpg', 'jpeg', 'png', 'gif','webp','jfif');

        if (in_array($fileExtension, $allowedfileExtensions)) {
            $uploadFileDir = './uploads/';
            $newFileName = time() . '_' . $fileName; 
            $dest_path = $uploadFileDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                if (!empty($user['image']) && file_exists('./uploads/' . $user['image'])) {
                    unlink('./uploads/' . $user['image']);
                }

                $updateQuery = "UPDATE users SET image = '$newFileName' WHERE id = '$id'";
                if (!mysqli_query($conn, $updateQuery)) {
                    echo "Failed to update profile image in the database: " . mysqli_error($conn);
                } else {
                    $user['image'] = $newFileName; 
                }
            } else {
                echo "There was an error moving the uploaded file.";
            }
        } else {
            echo "Invalid file type. Only JPG, JPEG, PNG,jfif, webp and GIF files are allowed.";
        }
    } else {
        echo "No image was uploaded or an error occurred during upload.";
    }

    $update_sql = "UPDATE users SET fname = '$fname', lname = '$lname', email = '$email', city = '$city', gender = '$gender' WHERE id = '$id'";

    if ($conn->query($update_sql) === TRUE) {
        $_SESSION['email'] = $email; 
        echo "<script>alert('Profile updated successfully!'); window.location.href = 'profile.php';</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

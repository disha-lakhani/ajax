<?php
session_start();
include 'mydata.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $imageName = $_POST['image_name'];
    $userId = (int)$_POST['user_id']; 

    
    $imagePath = 'uploads/' . $imageName;
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }

    
    $sql = "SELECT image_name FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    
    $images = json_decode($row['image_name'], true) ?? [];
    $images = array_filter($images, fn($img) => $img !== $imageName);
    $updatedImages = json_encode(array_values($images));

    
    $updateSql = "UPDATE users SET image_name = ? WHERE id = ?";
    $updateStmt = $conn->prepare($updateSql);
    $updateStmt->bind_param('si', $updatedImages, $userId); 

    if ($updateStmt->execute()) {
        header('Location: newprofile.php');
    } else {
        echo "Error deleting image!";
    }
}
?>

<?php
include 'mydata.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    $upload_dir = './uploads/';
    $new_images = [];

    if (isset($_FILES['new_images'])) {
        foreach ($_FILES['new_images']['tmp_name'] as $key => $tmp_name) {
            $image_name = basename($_FILES['new_images']['name'][$key]);
            $target_file = $upload_dir . $image_name;

            if (move_uploaded_file($tmp_name, $target_file)) {
                $new_images[] = $image_name;
            }
        }
        $sql = "SELECT image_name FROM users WHERE id = $user_id";
        $result = $conn->query($sql);
        $user = $result->fetch_assoc();

        $existing_images = json_decode($user['image_name'], true);
        $all_images = array_merge($existing_images ?? [], $new_images);
        $all_images_json = json_encode($all_images);

        $sql_update = "UPDATE users SET image_name = '$all_images_json' WHERE id = $user_id";
        if ($conn->query($sql_update)) {
            echo "Images added successfully.";
            header("Location: newprofile.php");
        } else {
            echo "Failed to update images.";
        }
    }
}
?>


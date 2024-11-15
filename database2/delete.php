<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $studentId = intval($_POST["id"]);
    $sql = "DELETE FROM student WHERE id = $studentId";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(["status" => "success", "message" => "Student deleted successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error deleting student"]);
    }
}

mysqli_close($conn);
?>

<?php 

include 'db.php';

header('Content-Type: application/json');

$response = ["status" => "error", "message" => "Invalid request"];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $studentId = intval($_POST["id"]);
    if ($studentId > 0) {
        $sql = "DELETE FROM students WHERE id=$studentId";

        if (mysqli_query($conn, $sql)) {
            $response = ["status" => "success", "message" => "student deleted successfully"];
        } else {
            $response = ["status" => "error", "message" => "Error deleting student: " . mysqli_error($conn)];
        }
    }
    else {
        $response["message"] = "Invalid student ID";
    }
}
mysqli_close($conn);
echo json_encode($response);
?>
<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "php_db";

$conn = mysqli_connect($server, $username, $password, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM student";
$result = mysqli_query($conn, $sql);

$students = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $students[] = $row;
    }
}

echo json_encode($students);

mysqli_close($conn);
?>


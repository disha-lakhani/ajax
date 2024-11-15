

<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "php_db";

$conn = mysqli_connect($server,$username,$password,$db);

if (!$conn) {
  die("connection failed : " . mysqli_connect_error());
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $response = array("status" => "", "message" => "");
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $class = $_POST['class'];

  $sql = "UPDATE student SET fname='$fname',lname='$lname',email='$email',class='$class' WHERE id=$id";

  if (mysqli_query($conn, $sql)) {
    $response["status"] = "success";
    $response["message"] = "Student data updated successfully.";
  } else {
    $response["status"] = "error";
    $response["message"] = "Error updating record: " . mysqli_error($conn);
  }

echo json_encode($response);
exit();
}
?>
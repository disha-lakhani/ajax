<?php


include 'db.php';

header('Content-Type: application/json');

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $fname=$_POST['fname'];
    $contact=$_POST['contact'];
    $email=$_POST['email'];

    $sql = "INSERT INTO students (fname, contact, email) VALUES ('$fname', '$contact', '$email')";
    if (mysqli_query($conn, $sql)) {
      echo json_encode(["status" => "success", "message" => "Saved successfully!"]);
  } else {
      echo json_encode(["status" => "error", "message" => "Database error: " . mysqli_error($conn)]);
  }
} else {
  echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}
mysqli_close($conn);
?>
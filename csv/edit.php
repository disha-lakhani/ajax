<?php

include 'db.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];


    $sql = "UPDATE students SET fname='$fname', email='$email', contact='$contact' WHERE id=$id";
    
    if (mysqli_query($conn,$sql)) {
        header("Location: display.php");
        exit(); 
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
else{
    $sql="SELECT * FROM students WHERE id=$id ";
    $result=mysqli_query($conn,$sql);
    $student=mysqli_fetch_assoc($result);
}
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student Details</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Student Details</h2>

        <form action="edit.php?id=<?php echo $student['id']; ?>" method="POST">
            <div class="form-group">
                <label for="fname">First Name:</label>
                <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $student['fname']; ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $student['email']; ?>" required>
            </div>

            <div class="form-group">
                <label for="contact">Contact:</label>
                <input type="text" class="form-control" id="contact" name="contact" value="<?php echo $student['contact']; ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>


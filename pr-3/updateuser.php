
<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "mydb";

$conn = mysqli_connect($server, $username, $password, $db);

if (!$conn) {
    die("connection failed" . mysqli_connect_error());
}

$id=$_GET['id'];
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];

    $sql="UPDATE user SET fname='$fname',lname='$lname',email='$email',contact='$contact' WHERE id=$id";

    if(mysqli_query($conn,$sql)){
        header("location:editdata.php");
        exit();
    }
    else{
        echo "error:".$sql."<br>".mysqli_error($conn);
    }
}
else{
    $sql="SELECT * FROM user WHERE id=$id";
    $result=mysqli_query($conn,$sql);
    $user=mysqli_fetch_assoc($result);
}
mysqli_close($conn);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">

    <label for="">FIRST_NAME:</label>  <br>
    <input type="text" name="fname" value="<?php echo $user['fname']; ?>" placeholder="enter first name.." ><br><br>
    <label for="">LAST_NAME:</label>  <br>
    <input type="text" name="lname" value="<?php echo $user['lname']; ?>" placeholder="enter last name.." ><br><br>
    <label for="">EMAIL:</label>  <br>
    <input type="text" name="email" value="<?php echo $user['email']; ?>" placeholder="enter email.." ><br><br>
    <label for="">CONTACT:</label>  <br>
    <input type="text" name="contact" value="<?php echo $user['contact']; ?>" placeholder="enter contact.." ><br><br>
    <button type="submit">UPDATE</button>



</form>
    
</body>
</html>
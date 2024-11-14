<?php 
$server="localhost";
$username="root";
$password="";
$db="test";

$conn=new mysqli($server,$username,$password,$db);

if($conn->connect_error){
    die("connection failed : ".$conn->connect_error);
}
$id=$_GET['id'];

$sql="DELETE FROM product WHERE id=$id";

if($conn->query($sql)=== TRUE){
    header("location: index.php");
    exit();
}
else{
    echo "error:".$sql."<br>".$conn->error;
}

$conn->close();


?>
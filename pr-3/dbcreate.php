<?php  

$server="localhost";
$username="root";
$password="";

$conn=mysqli_connect($server,$username,$password);
if(!$conn){
    die("connection fail :".mysqli_connect_error());
}
 $sql="CREATE DATABASE mydb";
 if(mysqli_query($conn,$sql)){
    echo "database created successfully";
 }
 else{
    echo "error creating database ". mysqli_error($conn);
 }
 mysqli_close($conn);
?>
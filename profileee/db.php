<?php

$server="localhost";
$username="root";
$password="";
$db="register";


$conn=mysqli_connect($server,$username,$password,$db);

if(!$conn){
    die("connection failed".mysqli_connect_error());
}
// else{
//     echo "connection successfully";
// }


?>
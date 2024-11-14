<?php
$servername="localhost";
$username="root";
$password="";
$dbname="test_db";


$conn=  new mysqli($servername,$username,$password,$dbname);
if(!$conn){
    die("connection fail.." . mysqli_connect_error());
}
else{
    echo "connection successfully...";
}
mysqli_close($conn);

?>
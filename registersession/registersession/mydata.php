<?php

$servername="localhost";
$username="root";
$password="";
$dbname="regi_data";

$conn=new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
echo "connection fail..." .$conn->connect_error;
}


?>



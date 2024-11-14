<?php 
    $server="localhost";
    $username="root";
    $password="";
    $db="mydb";


    $conn=mysqli_connect($server,$username,$password,$db);

    if(!$conn){
        die("connnection failed :" .mysqli_connect_error());
    }
 

?>
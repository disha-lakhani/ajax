<?php
    $server="localhost";
    $username="root";
    $password="";
    $db="mydb";

    $conn=mysqli_connect($server,$username,$password,$db);

    if(!$conn){
        die("connection failed".mysqli_connect_error());
    }

    $sql="DELETE FROM product WHERE id=5";

    if(mysqli_query($conn,$sql)){
        echo "delete successfully";
    }
    else{
        echo "error deleting".mysqli_error($conn);
    }

    mysqli_close($conn);


?>
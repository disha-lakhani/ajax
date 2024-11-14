<?php
    $server="localhost";
    $username="root";
    $password="";
    $db="mydb";

    $conn=mysqli_connect($server,$username,$password,$db);

    if(!$conn){
        die("connection fail:".mysqli_connect_error());
    }

    $sql="UPDATE product SET price=900 WHERE id=2";

    if(mysqli_query($conn,$sql)){
        echo "updated successfully..";
    }
    else{
        echo "error updating ".mysqli_error($conn);
    }
    mysqli_close($conn);
?>
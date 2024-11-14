<?php

include 'db.php';

$id=$_GET['id'];

$sql="DELETE FROM employees WHERE id=$id";

if(mysqli_query($conn,$sql)){
    header("location:display.php");
    exit();
}
else{
    echo "error : ".$sql."<br>" . mysqli_error($conn);
}

?>
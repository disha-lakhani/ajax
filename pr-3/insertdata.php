<?php 
    $server="localhost";
    $username="root";
    $password="";
    $db="mydb";

    $conn=mysqli_connect($server,$username,$password,$db);

    if(!$conn){
        die("connection failed" . mysqli_connect_error());
    }

    $sql="INSERT INTO product (title,price,category)
     VALUES('top',1000,'female'),
     ('shorts',500,'kids'),
     ('shirt',1500,'male')
    ";

    if(mysqli_query($conn,$sql)){
        echo "data insert successfully";
    }
    else{
        echo "error inserted data" . mysqli_error($conn);
    }

    mysqli_close($conn);


?>
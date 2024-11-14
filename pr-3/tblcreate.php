<?php
 $server="localhost";
 $username="root";
 $password="";
 $db="mydb";

 $conn=mysqli_connect($server,$username,$password,$db);
 if(!$conn){
    die("connection failed :".mysqli_connect_error());
 }

 $sql="CREATE TABLE product(
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50),
    price INT(10),
    category VARCHAR(50)
)";
if(mysqli_query($conn,$sql)){
    echo "table created successfully";
}
else{
    echo "error table created : ".mysqli_error($conn);
}
mysqli_close($conn);
?>
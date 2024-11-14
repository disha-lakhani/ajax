<?php 
  $server="localhost";
  $username="root";
  $password="";
  $db="php_db";

  $conn=mysqli_connect($server,$username,$password,$db);

  if(!$conn){
    die("connection failed: ".mysqli_connect_error());
  }
  else{
    echo "database connection successfullyy...";
  }



  $sql="CREATE TABLE employee(
    id INT AUTO_INCREMENT PRIMARY KEY,
    ename VARCHAR(50) NOT NULL ,
    email VARCHAR(50) NOT NULL,
    contact VARCHAR(50) ,
    salary VARCHAR(10),
    dept VARCHAR(50)
)";

if(mysqli_query($conn,$sql)){
    echo "table created successfully";
}
else{
    die("error table creating... : ".mysqli_error($conn));
}
?>
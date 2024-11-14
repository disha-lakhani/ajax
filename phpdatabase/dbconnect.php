<?php

$servername="localhost";
$username="root";
$password="";
$dbname="mydb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "CREATE TABLE MyGuests (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";



$sql="INSERT INTO MyGuests(firstname,lastname,email)
VALUE('koaml','klasariya','komal12@gmailc.com')";


$sql="DELETE FROM MyGuests WHERE id=3";

$sql="UPDATE MyGuests SET lastname='hirva' WHERE id=2";
$sql="SELECT * FROM MyGuests LIMIT 10";

if ($conn->query($sql) === TRUE) {
    $lastid=$conn->insert_id;
    echo " record Update successfully";
  } else {
    echo "Error creating table: ".$sql."<br>" . $conn->error;
  }
  $conn->close();


?>
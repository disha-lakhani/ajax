<?php
$server="localhost";
$username="root";
$password="";
$db="test";

$conn=new mysqli($server,$username,$password,$db);
if($conn->connect_error){
    die("connection failed : ".$conn->connect_error);
}

$sql="SELECT * FROM product";
$result=$conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
   <h2>PRODUCT DETAILS</h2>
   <a href="insert.php">ADD PRODUCTS</a> <br><br>
   <table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>PRICE</th>
        <th>CATEGORY</th>
        <th>ACTION</th>
    </tr>

    <?php 
    if($result->num_rows > 0){
        while($row=$result->fetch_assoc()){
            echo "<tr>";
            echo "<td>" .$row['id']."</td>";
            echo "<td>" .$row['name']."</td>";
            echo "<td>" .$row['price']."</td>";
            echo "<td>" .$row['category']."</td>";
            echo "<td>
               <a href='update.php?id= " .$row['id']. "'>EDIT</a> |
               <a href='delete.php?id= " .$row['id']."'>DELETE</a>
            </td>";
          echo "</tr>";       
        }
    }
    else{
        echo "<tr><td colspan='4'>NO DATA FOUND</td></tr>";
    }
    
    ?>

   </table>
</body>
</html>
<?php
$conn->close();
?>
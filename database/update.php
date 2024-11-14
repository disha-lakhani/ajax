<?php 

$server="localhost";
$username="root";
$password="";
$db="test";

$conn=new mysqli($server,$username,$password,$db);

if($conn->connect_error){
    die("connection failed :".$conn->connect_error);
}

$id=$_GET['id'];

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=$_POST['name'];
    $price=$_POST['price'];
    $category=$_POST['category'];

    $sql="UPDATE product SET name='$name',price='$price',category='$category' WHERE id=$id";

    if($conn->query($sql) === TRUE){
        header("location:index.php");
        exit();
    }
    else{
        echo "error: ".$sql."<br>".$conn->error;
    }
}
else{
    $sql="SELECT * FROM product WHERE id=$id";
    $result=$conn->query($sql);
    $product=$result->fetch_assoc();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>EDIT PRODUCT</h2>
<form method="POSt">
        <label for="">NAME :</label><br>
        <input type="text" name="name" value="<?php echo $product['name']; ?>" required><br><br>
        <label for="">PRICE :</label><br>
        <input type="text"  name="price"  value="<?php echo $product['price']; ?>" required><br><br>
        <label for="">CATEGORY :</label><br>
        <input type="text"  name="category"  value="<?php echo $product['category']; ?>" required><br><br>
        <button type="submit">UPDATE PRODUCT</button>
    </form>
</body>
</html>
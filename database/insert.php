<?php 
$server="localhost";
$username="root";
$password="";
$db="test";

$conn=new mysqli($server,$username,$password,$db);

if($conn->connect_error){
    die("connection failed : ".$conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=$_POST['name'];
    $price=$_POST['price'];
    $category=$_POST['category'];

    $sql="INSERT INTO product(name,price,category)VALUES('$name',$price,'$category')";


    if(mysqli_query($conn,$sql)){
        echo json_encode(["status"=>"success","message"=>"product added successfuly"]);
    }
    else{
        echo json_encode(["status" => "error", "message" => "Error: " . mysqli_error($conn)]);
    }
    exit();
    // if($conn->query($sql)===TRUE){
    //     header("Location:index.php");
    //     exit();
    // }
    // else{
    //     echo "error :".$sql."<br>" .$conn->error;
    // }
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

</head>
<body>
  
    <h2>ADD PRODUCTS</h2>
    <form action="" id="proform" method="POSt">
        <label for="">NAME :</label><br>
        <input type="text" id="name" name="name" required><br><br>
        <label for="">PRICE :</label><br>
        <input type="text" id="price" name="price" required><br><br>
        <label for="">CATEGORY :</label><br>
        <input type="text" id="category" name="category" required><br><br>
        <button type="submit">ADD PRODUCT</button>
    </form>
    <div id="responseMessage"></div>
    <script>
        $(document).ready(function(){

      
        $("#proform").validate({
            rules:{
                name:{
                    required:true,
                    minlength:2
                },
                price:{
                    required:true,
                    minlength:2
                },
                category:{
                    required:true,
                    minlength:2
                }
            },
            messages:{
                name:{
                    required:"please enter product name",
                    minlength:"product name must consist of at least 2 characters"
                },
                price:{
                    required:"please enter price..",
                    minlength:"price must consist of at least 2 number"
                },
                category:{
                    required:"please enter product category..",
                    minlength:"category must consist of at least 2 characters"
                }
            },
            submitHandler: function(form) {
                    $.ajax({
                        url: "insert.php",  
                        type: "POST",
                        data: $(form).serialize(), 
                        dataType: "json", 
                        success: function(response) {
                            if (response.status === "success") {
                                $("#responseMessage").html("<p style='color:green;'>" + response.message + "</p>");
                                $("#proform")[0].reset();

                                setTimeout(function() {
                                window.location.href = "index.php";
                                 }, 1000);
                            } else {
                                $("#responseMessage").html("<p style='color:red;'>" + response.message + "</p>");
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error("AJAX error:", textStatus, errorThrown);
                            $("#responseMessage").html("<p style='color:red;'>An error occurred while processing your request.</p>");
                        }
                    });
                }
        });
    });
    </script>
    
</body>
</html>
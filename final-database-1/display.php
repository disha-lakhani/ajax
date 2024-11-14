<?php
include 'db.php';

$sql="SELECT * FROM employees";
$result=mysqli_query($conn,$sql)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>display</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
      
        a {
            color: white;
            text-decoration: none; 
        }
    </style>
</head>
<body >
<h2 class="m-auto text-center">EMPLOYEES DATA</h2>
   <button class="btn btn-success"> <a href="emp.php">ADD EMPLOYEE</a></button><br><br>

<table class="table table-success table-striped">
    <tr>
        <th>ID</th>
        <th>ENAME</th>
        <th>EMAIL</th>
        <th>CONTACT-NO</th>
        <th>SALARY</th>
        <th>DEPARTMENT</th>
        <th>EDIT</th>
        <th>DELETE</th>
    </tr>
        <?php
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>" .$row['id']. "</td>";
                echo "<td>" .$row['ename']. "</td>";
                echo "<td>" .$row['email']. "</td>";
                echo "<td>" .$row['contact']. "</td>";
                echo "<td>" .$row['salary']. "</td>";
                echo "<td>" .$row['dept']. "</td>";
                echo "<td>
                <button class='btn btn-success'><a href='empchange.php?id=" .$row['id']. "'>EDIT</a></button> </td>";
                echo "<td>
                <button class='btn btn-danger'><a href='deleteemp.php?id=" .$row['id']. "'>DELETE</a></button> 
                </td>";
                echo"</tr>";
            }
        }
        else{
            echo "<tr><td colspan='8'>NO DATA FOUND</td></tr>";
        }


        ?>
    </table>
    
</body>
</html>
<?php
    mysqli_close($conn);
?>


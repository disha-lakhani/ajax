
<?php 
    include 'db.php';
    $sql = "SELECT * FROM student ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Data</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            /* background-color: #f0f2f5;  */
            font-family: 'Roboto', sans-serif; 
        }
        h2 {
            margin-top: 20px;
            margin-bottom: 20px;
            color: #333; 
        }
     
        a {
            color: white;
            text-decoration: none; 
        }
        .table th, .table td {
            /* vertical-align: middle;  */
            padding: 15px; 
        }
        .table thead {
            background-color:#d1e7fd; 
            color: black; 
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #e9ecef; 
        }
        .table-striped tbody tr:hover {
            background-color: aliceblue; 
        }
        .btn {
            margin: 5px;
        }
        .text-center {
            color: #007bff;
        }
   
        .container-fluid {
    width: 100%;
    padding-right: 80px;
    padding-left: 80px;
    margin-right: auto;
    margin-left: auto;
}
    </style>
</head>
<body>
<div class="container-fluid">


<h2 class="text-center">All Student Details</h2>
    <div class="text-center mb-4">
        <a href="student.php" class="btn btn-success">Add Student Data</a>
    </div>

    
    <table class="table  table-striped table-hover ">
        <thead>
            <tr>
                <th>ID</th>
                <th>FULLNAME</th>
                <th>EMAIL</th>
                <th>CONTACT</th>
                <th>COURSE</th>
                <th>GENDER</th>
                <th>ADDRESS</th>
                <th>HOBBIES</th>
                <th>PASSWORD</th>
                <th>PROFILE</th>
                <th>EDIT</th>
                    <th>DELETE</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if (mysqli_num_rows($result) > 0) {
            // Output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["fname"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["contact"] . "</td>";
                echo "<td>" . $row["course"] . "</td>";
                echo "<td>" .$row["gender"] . "</td>";
                echo "<td>" . $row["address"] . "</td>";
                echo "<td>" . (!empty($row["hobbies"]) ? $row["hobbies"] : 'N/A') . "</td>";
                echo "<td>" . $row['password'] . "</td>";
                echo "<td><img src='uploads/" . $row["image"] . "' alt='Profile Image'  width='100' height='100'></td>";
                echo "<td>
                <a href='update.php?id=" . $row['id'] . "' class='btn btn-warning'>EDIT</a>
            </td>";
            echo "<td>
                <a href='delete.php?id=" . $row['id'] . "' onclick='return confirmdelete();' class='btn btn-danger'>DELETE</a>
            </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr class='text-center'><td colspan='12'>NO RECORD FOUND</td></tr>";
        }
        ?>
        </tbody>
    </table>
    </div>

</body>
<script>
    function confirmdelete() {
        return confirm("Are you sure you want to delete this record?");
    }
</script>
</html>
<?php
mysqli_close($conn);
?>

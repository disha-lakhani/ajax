<?php


$server = "localhost";
$username = "root";
$password = "";
$db = "mydb";

$conn = mysqli_connect($server, $username, $password, $db);

if (!$conn) {
    die("connection failed" . mysqli_connect_error());
}
// $sql = "CREATE TABLE user(
//     id int AUTO_INCREMENT PRIMARY KEY,
//     fname varchar(50),
//     lname varchar(50),
//     email varchar(50),
//     contact int(10)
// )";

// if (mysqli_query($conn, $sql)) {
//     echo "error" . $sql . "<br>" . mysqli_error($conn);
// }

$sql1 = "SELECT * FROM user";
$result = mysqli_query($conn, $sql1);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="1" cellpadding="10">
        <tr>
            <td>ID</td>
            <td>FIRST_NAME</td>
            <td>LAST_NAME</td>
            <td>EMAIL</td>
            <td>PHONE</td>
            <td>ACTION</td>
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['fname'] . "</td>";
                echo "<td>" . $row['lname'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['contact'] . "</td>";
                echo "<td>
                <a href='updateuser.php?id=" .$row['id']. "'>EDIT</a> </tr>";

            }
        }
        else{
            echo "<tr><td colspan='6'>NO DATA FOUND</td></tr>";
        }



        ?>



    </table>
</body>

</html>
<?php
    mysqli_close($conn);
?>
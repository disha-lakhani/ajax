

<?php
include 'mysqldb.php';

if (isset($_GET['message'])) {
  echo "<p style='color: green;'>" . htmlspecialchars($_GET['message']) . "</p>";
}
$sql="select id,firstname, lastname, address, gender, pincode, course, email from students";
$result=$conn->query($sql);

if($result->num_rows>0){
  echo " <h2 class='text-left'>Student Data</h2>";
    echo "<table  class='table table-success table-striped'><tr><th>ID</th><th>FirstName</th><th>LastName</th><th>Address</th><th>Gender</th><th>Pincode</th><th>Course</th><th>email</th><th>Edit</th><th>Delete</th></tr>";


    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["firstname"] . "</td>
                <td>" . $row["lastname"] . "</td>
                <td>" . $row["address"] . "</td>
                 <td>" . $row["gender"] . "</td>
                  <td>" . $row["pincode"] . "</td>
                   <td>" . $row["course"] . "</td>
                    <td>" . $row["email"] . "</td>
                   
                 <td>
               <a href='update.php?id=" . $row['id'] . "'>
               <button type='' class='delete-btn btn btn-info'>Edit</button>
               </a>
             </td>
              <td>
            <form method='POST' action='delete.php' onsubmit='return confirmDelete();'>
                                  <input type='hidden' name='id' value='" . $row['id'] . "' />
                                    <button type='submit' class='delete-btn btn btn-info'>Delete</button>
                               </form>


             </td>
              </tr>";
    }
    
    
    echo "</table>";
}
else{
    echo "0 results";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
 
</body>
<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this record?");
    }
</script>
</html>


 
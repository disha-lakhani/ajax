<?php
include 'db.php'; 

$results_per_page = 5; 
// Find out the number of results stored in database
$sql = "SELECT COUNT(*) AS total FROM std";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];

// Calculate total pages needed
$total_pages = ceil($total_records / $results_per_page);

// Determine the current page number
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculate the starting limit number for the results on the current page
$start_limit = ($current_page - 1) * $results_per_page;

// Retrieve the records for the current page
$sql = "SELECT * FROM std ORDER BY id DESC LIMIT $start_limit, $results_per_page";
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
        .table thead {
            background-color: #d1e7fd;
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
            padding: 0;
        }
    </style>
</head>

<body>
    <div class="container-fluid">


        <h2 class="text-center">All Student Details</h2>
        <div class="text-center mb-4">
            <a href="form.php" class="btn btn-success">Add Student Data</a>
        </div>


        <table class="table  table-striped table-hover ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>FNAME</th>
                    <!-- <th>LNAME</th> -->
                    <th>COURSE</th>
                    <th>DOB</th>
                    <th>GENDER</th>
                    <th>CONTACT</th>
                    <th>EMAIL</th>
                    <th>ADDRESS</th>
                    <th>CITY</th>
                    <th>STATE</th>
                    <th>USERNAME</th>
                    <th>PSWD</th>
                    <th>IMAGE</th>
                    <th>EDIT</th>
                    <th>DELETE</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["fname"] . "</td>";
                        // echo "<td>" . $row["lname"] . "</td>";
                        echo "<td>" . $row["field"] . "</td>";
                        echo "<td>" . $row["dob"] . "</td>";
                        echo "<td>" . $row["gender"] . "</td>";
                        echo "<td>" . $row["contact"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["address"] . "</td>";
                        echo "<td>" . $row["city"] . "</td>";
                        echo "<td>" . $row["state"] . "</td>";
                        echo "<td>" . $row["username"] . "</td>";
                        echo "<td>" . $row['password'] . "</td>";
                        echo "<td><img src='" . htmlspecialchars($row["image"]) . "' alt='Profile Image' width='100' height='100'></td>";
                        echo "<td>
                       <a href='update.php?id=" . $row['id'] . "' class='btn btn-warning'>EDIT</a>
                       </td>";
                        echo "<td>
                        <a href='delete.php?id=" . $row['id'] . "' onclick='return confirmdelete();' class='btn btn-danger'>DELETE</a>         
                        </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr class='text-center'><td colspan='15'>NO RECORD FOUND</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <nav>
            <ul class="pagination justify-content-center m-5">
                <?php if ($current_page > 1): ?>
                    <li class="page-item">
                        <a class="page-link" href="display.php?page=<?= $current_page - 1 ?>">Previous</a>
                    </li>
                <?php endif; ?>

                <?php for ($page = 1; $page <= $total_pages; $page++): ?>
                    <li class="page-item <?= ($page === $current_page) ? 'active' : '' ?>">
                        <a class="page-link" href="display.php?page=<?= $page ?>"><?= $page ?></a>
                    </li>
                <?php endfor; ?>

                <?php if ($current_page < $total_pages): ?>
                    <li class="page-item">
                        <a class="page-link" href="display.php?page=<?= $current_page + 1 ?>">Next</a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
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
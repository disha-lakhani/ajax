<?php
include 'db.php';

$recordsPerPage = 5;

$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;

$startFrom = ($currentPage - 1) * $recordsPerPage;

$sql = "SELECT id, fname, email, contact FROM students  LIMIT $startFrom, $recordsPerPage";
$result = $conn->query($sql);

$sqlTotalRecords = "SELECT COUNT(id) AS total FROM students";
$totalResult = $conn->query($sqlTotalRecords);
$totalRow = $totalResult->fetch_assoc();
$totalRecords = $totalRow['total'];

$totalPages = ceil($totalRecords / $recordsPerPage);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Student Details</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
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
        .pagination {
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Student Details</h2>

        <div class="text-center mb-4 mt-4">
            <a href="form.php" class="btn btn-success">Add Student Data</a>
        </div>
        <div class="text-center mb-4 mt-4">
            <a href="csvform.php" class="btn btn-success">Add CSV Data</a>
        </div>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>First Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    $serialNumber = ($currentPage - 1) * $recordsPerPage + 1; 
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $serialNumber . "</td>
                                <td>" . $row["fname"] . "</td>
                                <td>" . $row["email"] . "</td>
                                <td>" . $row["contact"] . "</td>
                                <td>
                                    <a href='edit.php?id=" . $row["id"] . "' class='btn btn-warning btn-sm'>Edit</a>
                                </td>
                                <td>
                                    <a href='delete.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete?\")'>Delete</a>
                                </td>
                            </tr>";
                        $serialNumber++;
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>


        <!-- Pagination -->
        <div class="pagination mx-1">
    <?php
    if ($currentPage > 1) {
        echo '<a href="display.php?page=' . ($currentPage - 1) . '" class="btn btn-primary btn-sm mx-1">Previous</a>';
    }

    for ($page = 1; $page <= $totalPages; $page++) {
        if ($page == $currentPage) {
            echo '<a href="display.php?page=' . $page . '" class="btn btn-primary btn-sm mx-1 active">' . $page . '</a>';
        } else {
            echo '<a href="display.php?page=' . $page . '" class="btn btn-secondary btn-sm mx-1">' . $page . '</a>';
        }
    }

    if ($currentPage < $totalPages) {
        echo '<a href="display.php?page=' . ($currentPage + 1) . '" class="btn btn-primary btn-sm mx-1">Next</a>';
    }
    ?>
</div>

    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>

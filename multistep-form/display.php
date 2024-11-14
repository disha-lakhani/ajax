<?php
include 'db.php'; 

$results_per_page = 5; 
$search_query = "";
$course_filter = [];
$gender_filter = [];

if (isset($_GET['search'])) {
    $search_query = mysqli_real_escape_string($conn, $_GET['search']);
}

if (isset($_GET['course'])) {
    $course_filter = $_GET['course'];
}

if (isset($_GET['gender'])) {
    $gender_filter = $_GET['gender'];
}

$conditions = [];
if (!empty($search_query)) {
    $conditions[] = "(fname LIKE '%$search_query%' OR city LIKE '%$search_query%')";
}
if (!empty($course_filter)) {
    $courses = implode("','", array_map(function($course) use ($conn) {
        return mysqli_real_escape_string($conn, $course);
    }, $course_filter));
    $conditions[] = "field IN ('$courses')";
}
if (!empty($gender_filter)) {
    $genders = implode("','", array_map(function($gender) use ($conn) {
        return mysqli_real_escape_string($conn, $gender);
    }, $gender_filter));
    $conditions[] = "gender IN ('$genders')";
}

$where_clause = !empty($conditions) ? 'WHERE ' . implode(' AND ', $conditions) : '';

$sql = "SELECT COUNT(*) AS total FROM std $where_clause";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];
$total_pages = ceil($total_records / $results_per_page);

$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start_limit = ($current_page - 1) * $results_per_page;

$sql = "SELECT * FROM std $where_clause ORDER BY id DESC LIMIT $start_limit, $results_per_page";
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

        input[type="checkbox"], input[type="radio"] {
            accent-color: #007bff; 
            transform: scale(1.2);
            margin-right: 5px;
            cursor: pointer;
        }

        label {
            font-weight: 500;
            color: #333;
            margin-right: 10px;
        }

        .form-inline input[type="text"] {
            border-radius: 20px;
            border: 1px solid #007bff;
            padding: 8px 20px;
            width: 250px;
        }

        .form-inline button[type="submit"] {
            border-radius: 20px;
            padding: 8px 20px;
        }

        .filter-section {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .filter-section div {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .reset{
            border-radius: 30px;
            padding: 8px 20px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <h2 class="text-center">All Student Details</h2>

        <!-- Search and Filter Form -->
        <form method="GET" action="display.php" class="form-inline justify-content-center mb-4">
            <input type="text" name="search" class="form-control mr-2" placeholder="Search by name or city" value="<?= htmlspecialchars($search_query) ?>">

            <div class="filter-section">
                <!-- Course Filter -->
                <label>Course:</label>
                <div>
                    <input type="checkbox" name="course[]" value="BBA" <?= in_array("BBA", $course_filter) ? 'checked' : '' ?>> BBA
                </div>
                <div>
                    <input type="checkbox" name="course[]" value="BCA" <?= in_array("BCA", $course_filter) ? 'checked' : '' ?>> BCA
                </div>
                <div>
                    <input type="checkbox" name="course[]" value="BSCIT" <?= in_array("BSCIT", $course_filter) ? 'checked' : '' ?>> BSCIT
                </div>

                <!-- Gender Filter -->
                <label class="ml-4">Gender:</label>
                <div>
                    <input type="checkbox" name="gender[]" value="Male" <?= in_array("Male", $gender_filter) ? 'checked' : '' ?>> Male
                </div>
                <div>
                    <input type="checkbox" name="gender[]" value="Female" <?= in_array("Female", $gender_filter) ? 'checked' : '' ?>> Female
                </div>
            </div>

            <button type="submit" class="btn btn-primary ml-3">Search</button>
            <a href="display.php" class="btn btn-primary ml-2 reset">Reset</a>
        </form>

        <div class="text-center mb-4 mt-5">
            <a href="form.php" class="btn btn-success">Add Student Data</a>
        </div>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>FNAME</th>
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
                        echo "<td>" . $row["field"] . "</td>";
                        echo "<td>" . $row["dob"] . "</td>";
                        echo "<td>" . $row["gender"] . "</td>";
                        echo "<td>" . $row["contact"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["address"] . "</td>";
                        echo "<td>" . $row["city"] . "</td>";
                        echo "<td>" . $row["state"] . "</td>";
                        echo "<td>" . $row["username"] . "</td>";
                        echo "<td>" . $row["password"] . "</td>";
                        echo "<td><img src='" . htmlspecialchars($row["image"]) . "' alt='Profile Image' width='100' height='100'></td>";
                        echo "<td><a href='update.php?id=" . $row['id'] . "' class='btn btn-warning'>EDIT</a></td>";
                        echo "<td><a href='delete.php?id=" . $row['id'] . "' onclick='return confirmdelete();' class='btn btn-danger'>DELETE</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr class='text-center'><td colspan='15'>NO RECORD FOUND</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- Pagination Links -->
        <nav>
            <ul class="pagination justify-content-center m-5">
                <?php if ($current_page > 1): ?>
                    <li class="page-item">
                        <a class="page-link" href="display.php?page=<?= $current_page - 1 ?>&search=<?= urlencode($search_query) ?>&<?= http_build_query(['course' => $course_filter, 'gender' => $gender_filter]) ?>">Previous</a>
                    </li>
                <?php endif; ?>

                <?php for ($page = 1; $page <= $total_pages; $page++): ?>
                    <li class="page-item <?= ($page === $current_page) ? 'active' : '' ?>">
                        <a class="page-link" href="display.php?page=<?= $page ?>&search=<?= urlencode($search_query) ?>&<?= http_build_query(['course' => $course_filter, 'gender' => $gender_filter]) ?>"><?= $page ?></a>
                    </li>
                <?php endfor; ?>

                <?php if ($current_page < $total_pages): ?>
                    <li class="page-item">
                        <a class="page-link" href="display.php?page=<?= $current_page + 1 ?>&search=<?= urlencode($search_query) ?>&<?= http_build_query(['course' => $course_filter, 'gender' => $gender_filter]) ?>">Next</a>
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



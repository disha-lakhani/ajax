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
$sql = "SELECT * FROM std $where_clause ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

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

mysqli_close($conn);
?>

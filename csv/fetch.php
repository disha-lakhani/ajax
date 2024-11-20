<?php
include 'db.php';

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 5; // Records per page
$offset = ($page - 1) * $limit; // Calculate offset

// Fetch total records
$totalQuery = "SELECT COUNT(*) AS total FROM students";
$totalResult = mysqli_query($conn, $totalQuery);
$totalRow = mysqli_fetch_assoc($totalResult);
$totalRecords = $totalRow['total'];

// Fetch paginated data
$query = "SELECT * FROM students LIMIT $limit OFFSET $offset";
$result = mysqli_query($conn, $query);

$students = [];
while ($row = mysqli_fetch_assoc($result)) {
    $students[] = $row;
}

// Return data as JSON
echo json_encode([
    "data" => $students,
    "total" => $totalRecords,
    "page" => $page,
    "limit" => $limit
]);
?>

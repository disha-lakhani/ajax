<?php

include "db.php"; 

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 5;
$offset = ($page - 1) * $limit;


$totalQuery = "SELECT COUNT(*) AS total FROM std";
$totalResult = mysqli_query($conn, $totalQuery);
$totalData = mysqli_fetch_assoc($totalResult);
$total = $totalData['total'];

$query = "SELECT * FROM std LIMIT $limit OFFSET $offset ";
$result = mysqli_query($conn, $query);

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode([
    "data" => $data,
    "total" => $total,
    "page" => $page,
    "limit" => $limit
]);


?>



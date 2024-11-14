<?php
include 'db.php';

session_start(); 

if (isset($_SESSION['success'])) {
    echo '<div class="success">' . $_SESSION['success'] . '</div>';
    unset($_SESSION['success']); 
}

if (isset($_SESSION['error'])) {
    echo '<div class="error">' . $_SESSION['error'] . '</div>';
    unset($_SESSION['error']); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import CSV File</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .success {
            color: green;
            font-weight: bold;
        }

        .error {
            color: red;
            font-weight: bold;
        }

        .download-link {
            margin-left: 20px;
            padding: 8px 12px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }

        .download-link:hover {
            background-color: #0056b3;
            color:white;
            
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Import Student Data from CSV</h2>

    <form action="import.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="csv_file">Choose CSV File</label>
            <input type="file" class="form-control" name="csv_file" id="csv_file">
        </div>
        <button type="submit" name="import" class="btn btn-primary">Import CSV</button>
        
        <!-- Link to download demo CSV file -->
        <a href="book2.csv" class="download-link" download>Download Demo CSV</a>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>

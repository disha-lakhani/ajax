<?php
include 'db.php';
session_start();

if (isset($_FILES['csv_file'])) {
    $file = $_FILES['csv_file'];
    $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
    if ($fileExtension !== 'csv') {
        echo json_encode(["status" => "error", "message" => "Please upload a valid CSV file."]);
        exit();
    }

    $allImported = true;
    if (($handle = fopen($file['tmp_name'], 'r')) !== false) {
        fgetcsv($handle);  // Skip the first line (header)
        $rowNumber = 1;  // Start counting rows (skip header)
        
        while (($data = fgetcsv($handle, 1000, ',')) !== false) {
            $fname = mysqli_real_escape_string($conn, $data[0]);
            $email = mysqli_real_escape_string($conn, $data[1]);
            $contact = mysqli_real_escape_string($conn, $data[2]);

            // Field validation
            if (empty($fname)) {
                echo json_encode(["status" => "error", "message" => "First name field is empty in row $rowNumber of the CSV file."]);
                $allImported = false;
                break;
            }
            if (empty($email)) {
                echo json_encode(["status" => "error", "message" => "Email field is empty in row $rowNumber of the CSV file."]);
                $allImported = false;
                break;
            }
            if (empty($contact)) {
                echo json_encode(["status" => "error", "message" => "Contact field is empty in row $rowNumber of the CSV file."]);
                $allImported = false;
                break;
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo json_encode(["status" => "error", "message" => "Invalid email format in row $rowNumber of the CSV file."]);
                $allImported = false;
                break;
            }

            if (!preg_match('/^[0-9]{10}$/', $contact)) {
                echo json_encode(["status" => "error", "message" => "Invalid contact number (only 10 digits
                                allowed) in row $rowNumber of the CSV file."]);
                $allImported = false;
                break;
            }

            // Insert data into database if no errors
            if ($allImported) {
                $query = "INSERT INTO students (fname, email, contact) VALUES ('$fname', '$email', '$contact')";
                if (!mysqli_query($conn, $query)) {
                    echo json_encode(["status" => "error", "message" => "Error importing data: " . mysqli_error($conn)]);
                    fclose($handle);
                    exit();
                }
            }
            $rowNumber++;
        }
        fclose($handle);
        if ($allImported) {
            echo json_encode(["status" => "success", "message" => "Data imported successfully!"]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Error opening file."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "No file selected."]);
}
?>

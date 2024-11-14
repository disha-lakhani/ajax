<?php
session_start();

include 'db.php';

if (isset($_POST['import'])) {

    if ($_FILES['csv_file']['name']) {
        $fileName = $_FILES['csv_file']['name'];
        $fileTmpName = $_FILES['csv_file']['tmp_name'];
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

        if ($fileExtension != 'csv') {
            $_SESSION['error'] = "Please upload a valid CSV file.";
            header("Location: csvform.php");
            exit;
        }

        $file = fopen($fileTmpName, "r");

        $header = fgetcsv($file);

        $allImported = true;
        $rowNumber = 1; 
        while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
            $rowNumber++;

            $fname = trim(mysqli_real_escape_string($conn, $data[0]));
            $email = trim(mysqli_real_escape_string($conn, $data[1]));
            $contact = trim(mysqli_real_escape_string($conn, $data[2]));

            if (empty($fname)) {
                $_SESSION['error'] = "First name field is empty in row $rowNumber of the CSV file.";
                $allImported = false;
                break;
            }
            if (empty($email)) {
                $_SESSION['error'] = "Email field is empty in row $rowNumber of the CSV file.";
                $allImported = false;
                break;
            }
            if (empty($contact)) {
                $_SESSION['error'] = "Contact field is empty in row $rowNumber of the CSV file.";
                $allImported = false;
                break;
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error'] = "Invalid email format in row $rowNumber of the CSV file.";
                $allImported = false;
                break;
            }

            if (!preg_match('/^[0-9]{10}$/', $contact)) {
                $_SESSION['error'] = "Invalid contact number format in row $rowNumber of the CSV file.";
                $allImported = false;
                break;
            }

            $sql = "INSERT INTO students (fname, email, contact) VALUES ('$fname', '$email', '$contact')";
            if (!$conn->query($sql)) {
                $_SESSION['error'] = "Error importing data in row $rowNumber: " . $conn->error;
                $allImported = false;
                break;
            }
        }

        fclose($file);

        if ($allImported) {
            $_SESSION['success'] = "Data imported successfully!";
            header("Location: display.php");
            exit();
        } else {
            header("Location: csvform.php");
            exit();
        }

    } else {
        $_SESSION['error'] = "No file uploaded.";
        header("Location: csvform.php");
        exit();
    }
}
?>

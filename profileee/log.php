<?php
session_start();
include 'db.php';




$response = [];

if (isset($_SESSION['id'])) {
    $response = [
        'status' => 'already_logged_in',
        'message' => 'You are already logged in.'
     
    ];
    echo json_encode($response);
    header('Location: profile.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];


    if (empty($email) || empty($password)) {
        $response = [
            'status' => 'error',
            'message' => 'Email and password are required.'
        ];
        echo json_encode($response);
        exit();
    }


    $sql = "SELECT * FROM users WHERE email='$email'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        if ($row['password'] === $password) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['fname'] = $row['fname'];

            if (!empty($_POST["remember"])) {
                setcookie("user_login", $_POST["email"], time() + (86400 * 1));
                setcookie("userpassword", $_POST["password"], time() + (86400 * 1));
            } else {
                if (isset($_COOKIE["user_login"])) {
                    setcookie("user_login", "", time() - 3600);
                }
                if (isset($_COOKIE["userpassword"])) {
                    setcookie("userpassword", "", time() - 3600);
                }
            }
            $response = [
                'status' => 'success',
                'message' => 'Login successful.',
                'redirect' => 'profile.php'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Invalid email or password.'
               
            ];
        }
    } else {
        $response = [
            'status' => 'error',
            'message' => 'User does not exist, please register first.'
            
        ];
    }
}
echo json_encode($response);
mysqli_close($conn)

?>
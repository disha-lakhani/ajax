<?php
session_start();
include 'db.php';

function displayError()
{
    if (isset($_SESSION['error'])) {
        echo '<div class="alert alert-danger mt-3">' . $_SESSION['error'] . '</div>';
        unset($_SESSION['error']);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

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
            header('location:profile.php');
            exit();
        } else {
            $_SESSION['error'] = 'Invalid email or password.';
            header('location: login.php');
            exit();
        }
    } else {
        $_SESSION['error'] = 'User does not exist, please register first.';
        header('location: login.php');
        exit();
    }
}
mysqli_close($conn)
?>


<?php
session_start();

session_unset();
session_destroy();

setcookie('user_login', '', time() - 3600, "/");
setcookie('userpassword', '', time() - 3600, "/");

header("Location:login.php");
exit();
?>
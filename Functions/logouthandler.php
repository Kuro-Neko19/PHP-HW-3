<?php
session_start();

if(isset($_POST['logout'])){
    unset($_SESSION['UserID']);
    unset($_SESSION['UserLogin']);
    foreach($_COOKIE as $key => $value) setcookie($key, '', time() - 3600, '/');
    header("Location: index.php");
}
?>
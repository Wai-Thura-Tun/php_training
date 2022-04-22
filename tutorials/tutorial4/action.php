<?php
session_start();
if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['name'])) {
    $setEmail = "waithura@gmail.com";
    $setPassword = "12345678";
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    if ($setEmail == $email && $setPassword == $password) {
        $_SESSION['status'] = "Successfully Login as" . " " . $name;
        header("location:home.php");
    } else {
        header("location:index.php");
    }
}

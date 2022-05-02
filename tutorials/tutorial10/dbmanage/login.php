<?php
session_start();
require 'db.php';
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = mysqli_escape_string($conn, $_POST['email']);
    $password = md5(mysqli_escape_string($conn, $_POST['password']));
    $query = $conn->query("SELECT * FROM users WHERE email='$email' AND password ='$password'");
    if ($query->num_rows > 0) {
        $row = mysqli_fetch_assoc($query);
        $_SESSION['user'] = $row['name'];
        header("location:../home.php");
    } else {
        echo '<script>alert("Your email or password is wrong!. Try again"); window.location.href="../index.php";</script>';
    }
}

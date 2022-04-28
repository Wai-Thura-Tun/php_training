<?php
require 'db.php';
if (isset($_POST['name']) && isset($_POST['email'])) {
    $name = mysqli_escape_string($conn, $_POST['name']);
    $email = mysqli_escape_string($conn, $_POST['email']);
    $checkMailQuery = $conn->query("SELECT * FROM mytable WHERE email='$email'");
    if ($checkMailQuery->num_rows != 0) {
        echo '<script>alert("Try another unique email!"); window.location.href="../index.php";</script>';
    } else {
        $conn->query("INSERT INTO mytable (name,email,created_date,modified_date) VALUES ('$name','$email',now(),now())");
        header("location:../index.php");
    }
}

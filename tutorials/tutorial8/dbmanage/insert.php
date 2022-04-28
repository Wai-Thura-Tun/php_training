<?php
require 'db.php';
if (isset($_POST['name']) && isset($_POST['email'])) {
    $name = mysqli_escape_string($conn, $_POST['name']);
    $email = mysqli_escape_string($conn, $_POST['email']);
    $conn->query("INSERT INTO mytable (name,email,created_date,modified_date) VALUES ('$name','$email',now(),now())");
    header("location:../index.php");
}

<?php
require 'db.php';
if (isset($_POST['uid']) && isset($_POST['uname']) && isset($_POST['uemail'])) {
    $uid = mysqli_escape_string($conn, $_POST['uid']);
    $uname = mysqli_escape_string($conn, $_POST['uname']);
    $uemail = mysqli_escape_string($conn, $_POST['uemail']);
    $conn->query("UPDATE mytable SET name='$uname',email='$uemail',modified_date=now() WHERE id=$uid");
    header("location:../index.php");
}

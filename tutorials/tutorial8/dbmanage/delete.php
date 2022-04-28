<?php
require 'db.php';
if (isset($_GET['did'])) {
    $did = mysqli_escape_string($conn, $_GET['did']);
    echo $did;
    $conn->query("UPDATE mytable SET deleted_date=now() WHERE id=$did");
    header("location:../index.php");
}

<?php
require 'db.php';
if (isset($_GET['did'])) {
    $did = mysqli_escape_string($conn, $_GET['did']);
    $conn->query("DELETE FROM mytable WHERE id=$did");
    header("location:../index.php");
}

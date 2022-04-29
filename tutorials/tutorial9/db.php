<?php
$hostName = "127.0.0.1";
$password = "12345678";
$userName = "root";
$dbName = "mydb";
$conn = new mysqli($hostName, $userName, $password, $dbName);
if (mysqli_connect_error()) {
    die("DataBase Connection failed: " . mysqli_connect_error());
}

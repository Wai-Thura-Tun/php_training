<?php
$hostName = "127.0.0.1";
$userName = "root";
$password = "12345678";
$dbName = "mydb";
$conn = new mysqli($hostName, $userName, $password, $dbName);
if (mysqli_connect_error()) {
    die("DataBase Connection Failed " . mysqli_connect_error());
}

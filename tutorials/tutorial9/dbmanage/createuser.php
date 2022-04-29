<?php
require 'db.php';
$xCData = [];
$yCData = [];
$count = 0;
$query = $conn->query("SELECT DISTINCT created_date FROM mytable WHERE created_date > now() - INTERVAL 7 day AND deleted_date IS NULL ORDER BY created_date ASC");
echo $query->num_rows;
while ($row = mysqli_fetch_assoc($query)) {
    $xCData[] = $row['created_date'];
}
for ($count = 0; $count < count($xCData); $count++) {
    $date = $xCData[$count];
    $yCQuery = $conn->query("SELECT * FROM mytable WHERE created_date='$date'");
    $yCData[] = $yCQuery->num_rows;
}

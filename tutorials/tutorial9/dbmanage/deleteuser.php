<?php
require 'db.php';
$xDData = [];
$yDData = [];
$count = 0;
$query = $conn->query("SELECT DISTINCT deleted_date FROM mytable WHERE deleted_date > now() - INTERVAL 7 day AND deleted_date IS NOT NULL ORDER BY deleted_date ASC");
while ($row = mysqli_fetch_assoc($query)) {
    $xDData[] = $row['deleted_date'];
}
for ($count = 0; $count < count($xDData); $count++) {
    $date = $xDData[$count];
    $yDQuery = $conn->query("SELECT * FROM mytable WHERE deleted_date='$date'");
    $yDData[] = $yDQuery->num_rows;
}

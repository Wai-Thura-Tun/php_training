<?php
require 'dbmanage/createuser.php';
require 'dbmanage/deleteuser.php';
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/reset.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <div style="width:400px; height:400px">
            <canvas id="chart1"></canvas>
        </div>
        <div style="width:400px; height:400px">
            <canvas id="chart2"></canvas>
        </div>
    </div>
    <script>
        const xCData = <?php echo json_encode($xCData); ?>;
        const yCData = <?php echo json_encode($yCData); ?>;
        const xDData = <?php echo json_encode($xDData); ?>;
        const yDData = <?php echo json_encode($yDData); ?>;
    </script>
    <script src="common.js"></script>
</body>

</html>
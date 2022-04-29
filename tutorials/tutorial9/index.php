<?php
include('db.php');
$xData = [];
$yData = [];
$count = 1;
$query = $conn->query("SELECT DISTINCT created_date FROM mytable WHERE deleted_date IS NULL");
while ($row = mysqli_fetch_assoc($query)) {
    $xData[] = $row['created_date'];
}
for ($k = 0; $k < count($xData); $k++) {
    $date = $xData[$k];
    $yQuery = $conn->query("SELECT * FROM mytable WHERE created_date='$date'");
    $yData[] = $yQuery->num_rows;
}
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
        const ctx1 = document.getElementById('chart1').getContext('2d');
        const myChart1 = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($xData); ?>,
                datasets: [{
                    label: 'Graph of Showing Users',
                    data: <?php echo json_encode($yData) ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(32, 205, 54, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)'

                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(32, 205, 54, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {

            }
        });
        const ctx2 = document.getElementById('chart2').getContext('2d');
        const myChart2 = new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: <?php echo json_encode($xData); ?>,
                datasets: [{
                    label: 'Graph of Showing Users',
                    data: <?php echo json_encode($yData) ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(32, 205, 54, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(32, 205, 54, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Pie Chart Of Showing Users'
                    }
                }
            }
        });
    </script>
</body>

</html>
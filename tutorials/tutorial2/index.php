<!DOCTYPE html>
<html>

<head>
    <title>Tutorial2</title>
</head>

<body>
    <div class="container">
        <?php
        $spaceCount = 5;
        $rowCount = 6;
        $secondDivLimit = 1;
        /**
         * Summary of makeStar
         * @param mixed $spaceCount
         * @param mixed $row
         * @return void
         */
        function makeStar($spaceCount, $row)
        {
            for ($space = $row; $space <= $spaceCount; $space++) {
                echo str_repeat("&nbsp", 2);
            }
            for ($star = 1; $star <= ($row * 2) - 1; $star++) {
                echo "*";
            }
            echo "<br>";
        }
        for ($row = 1; $row <= $rowCount; $row++) {
            makeStar($spaceCount, $row);
        }
        for ($row = $rowCount - 1; $row >= $secondDivLimit; $row--) {
            makeStar($spaceCount, $row);
        }
        ?>
    </div>
</body>

</html>
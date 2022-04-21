<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="chess clearfix">
            <?php
            $chess = '';
            $chessDivCount = 4;
            $chessListCount = 16;
            $firstDivCount = 8;
            $divider = 2;
            for ($divCount = 1; $divCount <= $chessDivCount; $divCount++) {
                for ($listCount = 1; $listCount <= $chessListCount; $listCount++) {
                    if ($listCount <= $firstDivCount) {
                        if ($listCount % $divider) {
                            $chess .= '<div class="white"></div>';
                        } else {
                            $chess .= '<div class="black"></div>';
                        }
                    } else {
                        if ($listCount % $divider) {
                            $chess .= '<div class="black"></div>';
                        } else {
                            $chess .= '<div class="white"></div>';
                        }
                    }
                }
            }
            echo $chess;
            ?>
        </div>
    </div>
</body>

</html>
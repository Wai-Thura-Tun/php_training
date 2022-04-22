<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <label>Choose Date To Calculate Age</label>
            <input type="date" placeholder="Pick Date" name="dob" required>
            <button>Submit</button>
        </form>
        <div class="resultContainer">
            <?php
            function calculateDOB($dob)
            {
                $currentMonth = (int)date('m');
                $currentYear = (int)date('Y');
                $currentDay = (int)date('d');
                $dateArray = explode('-', $dob, 3);
                $userYear = isset($dateArray[0]) ? (int)$dateArray[0] : 0;
                $userMonth = isset($dateArray[1]) ? (int)$dateArray[1] : 0;
                $userDay = isset($dateArray[2]) ? (int)$dateArray[2] : 0;
                $diffYear = $currentYear - $userYear;
                $diffDay = $currentDay - $userDay;
                $diffMonth = $currentMonth - $userMonth;
                $totalDay = ((($diffYear * 12) + $diffMonth) * 30) + $diffDay;
                $userAge = ceil($totalDay / 365);
                if ($userAge <= 0 || $userAge == -0) {
                    return "Invalid Date Of Birth or You're not born yet!";
                } else {
                    return $userAge;
                }
            }
            ?>
            <?php if (isset($_POST['dob'])) { ?>
                Your age is : <span><?php echo calculateDOB($_POST['dob']); ?></span>
            <?php } ?>
        </div>
    </div>
</body>

</html>
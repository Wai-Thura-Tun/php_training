<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <label>Choose Date To Calculate Age</label>
            <input type="date" placeholder="Pick Date" name="dob">
            <button>Submit</button>
        </form>
        <div class="resultContainer">
            <?php
            $userDOB = "";
            if (isset($_POST['dob'])) {
                $userDOB = $_POST['dob'];
            }
            function calculateDOB($dob)
            {
                $currentMonth = (int)date('m');
                $currentYear = (int)date('Y');
                $currentDay = (int)date('d');
                $dateArray = explode('-', $dob, 3);
                $userYear = (int)$dateArray[0];
                $userMonth = (int)$dateArray[1];
                $userDay = (int)$dateArray[2];
                $diffYear = $currentYear - $userYear;
                $diffDay = $currentDay - $userDay;
                $diffMonth = $currentMonth - $userMonth;
                $totalDay = ((($diffYear * 12) + $diffMonth) * 30) + $diffDay;
                $userAge = $totalDay / 365;
                return ceil($userAge);
            }
            ?>
            Your age is : <span><?php echo calculateDOB($userDOB); ?></span>
        </div>
    </div>
</body>

</html>
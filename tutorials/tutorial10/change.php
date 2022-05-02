<?php
session_start();
require 'dbmanage/db.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <?php
        if (isset($_SESSION['resetotp']) && isset($_GET['rpotp']) && isset($_GET['rpid'])) {
            $rpOTP = mysqli_escape_string($conn, $_GET['rpotp']);
            $rpID = mysqli_escape_string($conn, $_GET['rpid']);
            $sessOTP = $_SESSION['resetotp'];
            $timeQuery = $conn->query("SELECT * FROM users WHERE id='$rpID' && reseted_date + INTERVAL 5 minute > now()");
            if ($timeQuery->num_rows > 0 && $sessOTP == $rpOTP) { ?>
                <form class="login" method="POST" action="dbmanage/newpass.php">
                    <label>Change Password</label>
                    <input type="hidden" value="<?php echo $rpID; ?>" name="upid">
                    <input class="pass" id="p1" type="password" placeholder="New Password" required>
                    <input class="pass" id="p2" type="password" placeholder="Confirm Password" name="upvpass" required>
                    <button class="chpassbtn">Submit</button>
                </form>
        <?php } else {
                session_unset();
                session_destroy();
                echo '<script>alert("Your link is expired or Your credentials are invalid."); window.location.href="index.php";</script>';
            }
        } else {
            session_unset();
            session_destroy();
            echo '<script>alert("Your request is invalid."); window.location.href="index.php";</script>';
        } ?>

    </div>
    <script src="check.js"></script>
</body>

</html>
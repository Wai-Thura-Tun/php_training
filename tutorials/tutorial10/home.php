<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <?php
        if (isset($_SESSION['user'])) { ?>
            <div>You login as <span><?php echo $_SESSION['user']; ?></span></div>
            <a class="logout" href="dbmanage/logout.php">Logout</a>
        <?php } else {
            echo '<script>window.location.href="index.php";</script>';
        }
        ?>
    </div>
</body>

</html>
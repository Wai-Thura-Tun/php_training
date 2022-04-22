<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    if (isset($_SESSION['status'])) { ?>
        <div class="container">
            <?php echo $_SESSION['status']; ?>
            <a class="logoutbtn" href="logout.php">Logout</a>
        </div>
    <?php } else {
        header("location:index.php");
    }
    ?>
</body>

</html>
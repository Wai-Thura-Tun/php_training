<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <div class="qrttl">
            QRCode For Your Input
        </div>
        <img class="qrimg" src="action.php?text=<?php echo $_POST['text']; ?>" alt="QRCode">
        <a href="index.php">Return</a>
    </div>
</body>

</html>
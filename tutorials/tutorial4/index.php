<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/reset.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <form method="POST" action="action.php">
            <label>Login </label>
            <input type="text" placeholder="Name" name="name" required>
            <input type="email" placeholder="Email" name="email" required>
            <div class="passbtncon">
                <input type="password" placeholder="password" class="passbtn" name="password" required>
                <span class="show"><i class="fa-solid fa-eye"></i></span>
                <span class="hide"><i class="fa-solid fa-eye-slash"></i></span>
            </div>
            <button>Confirm</button>
        </form>
    </div>
</body>
<script>
    $(document).ready(function() {
        $('.show').click(function() {
            $('.show').hide();
            $('.hide').show();
            $('.passbtn').attr("type", "password");
        })
        $('.hide').click(function() {
            $('.hide').hide();
            $('.show').show();
            $('.passbtn').attr("type", "text");
        })
    })
</script>

</html>
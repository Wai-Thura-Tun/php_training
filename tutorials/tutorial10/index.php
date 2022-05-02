<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <form class="login" method="POST" action="dbmanage/login.php">
            <label>Login</label>
            <input type="email" placeholder="Email" name="email">
            <input type="password" placeholder="Password" name="password">
            <button>Submit</button>
        </form>
        <a class="resetBtn" href="reset.php">Reset Password?</a>
    </div>
</body>

</html>
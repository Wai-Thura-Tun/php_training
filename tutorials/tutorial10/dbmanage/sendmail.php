<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require '../vendor/autoload.php';
require 'db.php';
if (isset($_POST['remail'])) {
    $reMail = mysqli_escape_string($conn, $_POST['remail']);
    $query = $conn->query("SELECT * FROM users WHERE email='$reMail'");
    $row = mysqli_fetch_assoc($query);
    $resetID = $row['id'];
    if ($query->num_rows > 0) {
        $randOTP = rand(0, 999999);
        $_SESSION['resetotp'] = $randOTP;
        if (isset($_SESSION['resetotp'])) {
            $resetOTP = $_SESSION['resetotp'];
            $phpmailer = new PHPMailer();
            $phpmailer->isSMTP();
            $phpmailer->Host = 'smtp.mailtrap.io';
            $phpmailer->SMTPAuth = true;
            $phpmailer->Port = 2525;
            $phpmailer->Username = '5787221bdeb471';
            $phpmailer->Password = '7b2b825ab4494c';
            $phpmailer->SMTPSecure = "tls";
            $phpmailer->isHTML(true);
            $phpmailer->setFrom("testbot907@gmail.com");
            $phpmailer->addAddress($reMail);
            $phpmailer->Subject = "Reset Password";
            $phpmailer->Body = "<h3>You can change your password by clicking button below<br><a href='http://localhost:8000/change.php?rpotp=$resetOTP&rpid=$resetID'>Reset your password.</a></h3>";
            if ($phpmailer->send()) {
                if ($conn->query("UPDATE users SET reseted_date=now() WHERE id='$resetID'")) {
                    header("location:../status.php");
                }
            } else {
                echo '<script>alert("Mail Send failed Try Again!");window.location.href="../reset.php";</script>';
            }
        }
    } else {
        echo '<script>alert("Your email is invalid. Try Again!");window.location.href="../reset.php";</script>';
    }
}

<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';
require 'db.php';
$mailUserName = '5787221bdeb471';
$mailPasword = '7b2b825ab4494c';
$mailHost = 'smtp.mailtrap.io';
$mailAuth = true;
$mailPort = 2525;
$mailSecure = "tls";
$mailFrom = "testbot907@gmail.com";
/**
 * @var mixed $serverHost
 */
$serverHost = '';
/**
 * @var mixed $httpType
 */
$httpType = '';
/**
 * @var mixed $resetOTP
 */
$resetOTP = 0;
/**
 * @var mixed $rpID
 */
$resetID = 0;
/**
 * @var mixed $mailBody
 */
$mailBody = '';
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
            if (isset($_SERVER['HTTPS_HOST'])) {
                $serverHost = $_SERVER['HTTPS_HOST'];
                $httpType = "https";
                $mailBody = "" . $httpType . "://" . $serverHost . "/change.php?rpotp=$resetOTP&rpid=$resetID";
            } else {
                $serverHost = $_SERVER['HTTP_HOST'];
                $httpType = "http";
                $mailBody = "" . $httpType . "://" . $serverHost . "/change.php?rpotp=$resetOTP&rpid=$resetID";
            }
            $phpmailer = new PHPMailer();
            $phpmailer->isSMTP();
            $phpmailer->Host = $mailHost;
            $phpmailer->SMTPAuth = $mailAuth;
            $phpmailer->Port = $mailPort;
            $phpmailer->Username = $mailUserName;
            $phpmailer->Password = $mailPasword;
            $phpmailer->SMTPSecure = $mailSecure;
            $phpmailer->isHTML(true);
            $phpmailer->setFrom($mailFrom);
            $phpmailer->addAddress($reMail);
            $phpmailer->Subject = "Reset Password";
            $phpmailer->Body = "<h3>You can change your password by clicking button below<br><a href=$mailBody>Reset your password.</a></h3>";
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

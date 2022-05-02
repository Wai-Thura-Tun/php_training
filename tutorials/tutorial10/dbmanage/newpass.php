<?php
require 'db.php';
if (isset($_POST['upid']) && isset($_POST['upvpass'])) {
    $upID = mysqli_escape_string($conn, $_POST['upid']);
    $upVPass = md5(mysqli_escape_string($conn, $_POST['upvpass']));
    $conn->query("UPDATE users SET password='$upVPass' WHERE id='$upID'");
    session_unset();
    session_destroy();
    echo '<script>alert("Password was changed successfully."); window.location.href="../index.php";</script>';
}

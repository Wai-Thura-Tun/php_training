<?php
if (isset($_POST)) {
    $fdName = strtolower($_POST['name']);
    $img = strtolower($_FILES['image']['name']);
    $imgType = strtolower(pathinfo($img, PATHINFO_EXTENSION));
    $imgSize = $_FILES['image']['size'];
    $fileDir = "" . $fdName . "/" . basename($img);
    function checkDirAndUp($fdName, $img, $fileDir)
    {
        $tmpImg = $_FILES['image']['tmp_name'];
        if (file_exists($fileDir)) {
            $finalImg = rand(0,10).$img;
            $upload = move_uploaded_file($tmpImg, $fdName . "/" . $finalImg);
            if ($upload) {
                echo '<script>alert("Successfully uploaded, Notice:The filename is replaced because there is same files with your filename.");window.location.href="index.php";</script>';
            } else {
                echo '<script>alert("Sorry, uploading failed! Try again");window.location.href="index.php";</script>';
            }
        } else { 
            $upload = move_uploaded_file($tmpImg, $fdName . "/" . $img);
            if ($upload) {
                echo '<script>alert("Congratulation, successfully uploaded");window.location.href="index.php";</script>';
            } else {
                echo '<script>alert("Sorry, uploading failed! Try again");window.location.href="index.php";</script>';
            }
        }
    }
    if ($imgType == 'jpg' || $imgType == 'png' || $imgType == 'jpeg' || $imgType == 'gif') {
        if ($imgSize > 6000000) {
            echo '<script>alert("Your image size is too large. Try insert another one instead!"); window.location.href="index.php";</script>';
        } else {
            if (file_exists($fdName)) {
                checkDirAndUp($fdName, $img, $fileDir);
            } else {
                if (mkdir($fdName)) {
                    checkDirAndUp($fdName, $img, $fileDir);
                }
            }
        }
    } else {
        echo '<script>alert("Your file is not image type!"); window.location.href="index.php";</script>';
    }
}

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <h3 class="ttl">
            Insert and Store Image Here
        </h3>
        <form method="POST" enctype="multipart/form-data" action="manager.php">
            <input name="name" type="text" placeholder="Add Folder name" required>
            <div class="imgHolder">
                <label for="imgIP">Insert Image ></label>
                <input name="image" type="file" id="imgIP" class="imgInput" required>
                <img src="img/blankphoto.jpg" class="imgCon" alt="">
            </div>
            <button>Confirm</button>
        </form>
    </div>
</body>
<script>
    $('.imgInput').on('change', function(e) {
        let image = e.target.files[0];
        console.log(image);
        let imgUrl = URL.createObjectURL(image);
        $('.imgCon').attr("src", imgUrl);
    })
</script>

</html>
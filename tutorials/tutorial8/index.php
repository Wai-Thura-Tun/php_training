<?php

use function PHPSTORM_META\type;

include 'dbmanage/db.php';
?>
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
        <div class="ttl">Add Username and Email</div>
        <?php
        if (isset($_GET['eid'])) {
            $eid = mysqli_escape_string($conn, $_GET['eid']);
            $eQuery = $conn->query("SELECT * FROM mytable WHERE id=$eid");
            $editData = mysqli_fetch_assoc($eQuery);
        ?>
            <form method="POST" action="dbmanage/update.php">
                <input type="hidden" name="uid" value="<?php echo $editData['id']; ?>" required>
                <input type="text" placeholder="name" name="uname" value="<?php echo $editData['name']; ?>" required>
                <input type="email" placeholder="email" name="uemail" value="<?php echo $editData['email']; ?>" required>
                <button class="upbtn" type="button">Update</button>
            </form>
        <?php } else { ?>
            <form method="POST" action="dbmanage/insert.php">
                <input type="text" placeholder="name" name="name" required>
                <input type="email" placeholder="email" name="email" required>
                <button class="subbtn" type="button">Submit</button>
            </form>
        <?php } ?>
        <?php
        $query = $conn->query("SELECT * FROM mytable WHERE deleted_date IS NULL");
        if ($query->num_rows > 0) { ?>
            <table>
                <thead>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created Date</th>
                    <th>Modified Date</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($query)) { ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['created_date']; ?></td>
                            <td><?php echo $row['modified_date']; ?></td>
                            <td><a class="editbtn" href="index.php?eid=<?php echo $row['id']; ?>"><i class="fa-solid fa-pen"></i></a></td>
                            <td><a class="deletebtn" href="dbmanage/delete.php?did=<?php echo $row['id']; ?>"><i class="fa-solid fa-circle-minus"></i></a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <div class="ndttl">No Data</div>
        <?php
}?>

    </div>
</body>
<script>
    $(document).ready(function() {
        function addUpdateBtn(data, tag) {
            let status = confirm(data);
            if (status) {
                $("." + `${tag}`).attr("type", "submit");
            }
        }

        function editDeleteBtn(data,value) {
            let status = confirm(data);
            if (status) {
                window.location.href = value;
            }
        }
        $('.subbtn').on('click', function() {
            addUpdateBtn("Confirm adding new user?", "subbtn");
        })
        $('.upbtn').on('click', function() {
            addUpdateBtn("Confirm updating your changes?", "upbtn");
        })
        $('.editbtn').on('click', function(e) {
            e.preventDefault();
            let eValue = $(this).attr("href");
            editDeleteBtn("Confirm editing this data?",eValue);
        })
        $('.deletebtn').on('click', function(e) {
            e.preventDefault();
            let dValue = $(this).attr("href");
            editDeleteBtn("Confirm deleteing this data?",dValue);
        })
    })
</script>

</html>
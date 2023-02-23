<?php
    include "includes/conn.php";
?>
<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>SuPu Store | Manage Category</title>
    <link href="img/logo.png" rel="icon">
</head>

<body>
    <?php
    include 'includes/header.php';
    ?>
    <div class="container">
        <div class="title">Manage your Category</div><br>
        <hr><br>
        <!-- Mensware -->
        <div class="category">Mensware</div>
        <table width="98%">
            <tr>
                <th style="width: 50px;">S.N.</th>
                <th>Type of Clothes</th>
                <th>Creation Date</th>
                <th>Updation Date</th>
                <th>Action</th>
            </tr>

            <?php
            $sql = "SELECT * FROM `tbl_category` WHERE category='mensware'";
            $result = mysqli_query($conn, $sql);
            $count=1;
            if (mysqli_num_rows($result) > 0) {
                while ($value = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo htmlentities($count); ?></td>
                <td><?php echo $value['name']; ?></td>
                <td><?php echo $value['createdate']; ?></td>
                <td><?php echo $value['updatedate']; ?></td>
                <td style="text-align: center;"><span><a href="editcategory.php?id=<?php echo $value['id']; ?>&category=<?php echo $value['category'];?>">
                <i class='fas fa-edit' style='font-size:20px;color:green'></i>EDIT</a></span>&nbsp;&nbsp;&nbsp;&nbsp;||&nbsp;
                <span><a href="deletecategory.php?id=<?php echo  $value['id']; ?>&category=<?php echo $value['category'];?>" onclick="confirmDelete()">
                <i class='far fa-trash-alt' style='font-size:20px;color:red'></i>DELETE</a></span>
                </td>
                <?php
                $count=$count+1; }
            }
            ?>
            </tr>
        </table>
        <br><br>

        <!-- Womensware -->
        <div class="category">Womensware</div>
        <table width="98%">
            <tr>
                <th style="width: 50px;">S.N.</th>
                <th>Type of Clothes</th>
                <th>Creation Date</th>
                <th>Updation Date</th>
                <th>Action</th>
            </tr>

            <?php
            $sql = "SELECT * FROM `tbl_category` WHERE category='womensware'";
            $result = mysqli_query($conn, $sql);
            $count=1;
            if (mysqli_num_rows($result) > 0) {
                while ($value = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo htmlentities($count); ?></td>
                <td><?php echo $value['name']; ?></td>
                <td><?php echo $value['createdate']; ?></td>
                <td><?php echo $value['updatedate']; ?></td>
                <td style="text-align: center;"><span><a href="editcategory.php?id=<?php echo $value['id']; ?>&category=<?php echo $value['category'];?>">
                <i class='fas fa-edit' style='font-size:20px;color:green'></i>EDIT</a></span>&nbsp;&nbsp;&nbsp;&nbsp;||&nbsp;
                <span><a href="deletecategory.php?id=<?php echo  $value['id']; ?>&category=<?php echo $value['category'];?>" onclick="confirmDelete()">
                <i class='far fa-trash-alt' style='font-size:20px;color:red'></i>DELETE</a></span>
                </td>
                <?php
                $count=$count+1; }
            }
            ?>
            </tr>
        </table>
        <br><br>

        <!-- Kidsware -->
        <div class="category">Kidsware</div>
        <table width="98%">
            <tr>
                <th style="width: 50px;">S.N.</th>
                <th>Type of Clothes</th>
                <th>Creation Date</th>
                <th>Updation Date</th>
                <th>Action</th>
            </tr>

            <?php
            $sql = "SELECT * FROM `tbl_category` WHERE category='kidsware'";
            $result = mysqli_query($conn, $sql);
            $count=1;
            if (mysqli_num_rows($result) > 0) {
                while ($value = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo htmlentities($count); ?></td>
                <td><?php echo $value['name']; ?></td>
                <td><?php echo $value['createdate']; ?></td>
                <td><?php echo $value['updatedate']; ?></td>
                <td style="text-align: center;"><span><a href="editcategory.php?id=<?php echo $value['id']; ?>&category=<?php echo $value['category'];?>">
                <i class='fas fa-edit' style='font-size:20px;color:green'></i>EDIT</a></span>&nbsp;&nbsp;&nbsp;&nbsp;||&nbsp;
                <span><a href="deletecategory.php?id=<?php echo  $value['id']; ?>&category=<?php echo $value['category'];?>" onclick="confirmDelete()">
                <i class='far fa-trash-alt' style='font-size:20px;color:red'></i>DELETE</a></span>
                </td>
                <?php
                $count=$count+1; }
            }
            ?>
            </tr>
        </table>
    </div>
    <script>
    function confirmDelete(){
        confirmValue = confirm('Delete Category?');
        if(!confirmValue)
        {
            event.preventDefault();
        }
    }
</script>
</body>

</html>
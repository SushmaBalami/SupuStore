<?php
    include 'includes/conn.php';
?>

<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>SuPu Store | Manage Vehicles</title>
    <link href="img/logo.png" rel="icon">
</head>

<body>
    <?php
    include 'includes/header.php';
    ?>
    <div class="container">
        <div class="title">Manage Products</div><br>
        <hr><br>
        <table width="98%">
            <tr>
                <th style="width: 50px;">S.N.</th>
                <th>Category</th>
                <th>Product Id</th>
                <th>Product Name</th>
                <th>Title</th>
                <th style="width: 400px;">Description</th>
                <th>Price</th>
                <th>Action</th>
            </tr>

            <?php
            $sql = "SELECT * FROM tbl_products";
            $result = mysqli_query($conn, $sql);
            $count=1;
            if (mysqli_num_rows($result) > 0) {
                while ($value = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo htmlentities($count); ?></td>
                <td><?php echo $value['category']; ?></td>
                <td><?php echo $value['productid']; ?></td>
                <td><?php echo $value['productname']; ?></td>
                <td><?php echo $value['title']; ?></td>
                <td><?php echo $value['description']; ?></td>
                <td><?php echo $value['price']; ?></td>
                <td style="text-align: center;"><span><a href="editproduct.php?productid=<?php echo $value['productid']; ?>&category=<?php echo $value['category'];?>">
                <i class='fa fa-edit' style='font-size:20px;color:green'></i>EDIT</a></span>&nbsp;&nbsp;&nbsp;&nbsp;||&nbsp;
                <span><a href="deleteproduct.php?productid=<?php echo  $value['productid']; ?>&category=<?php echo $value['category'];?>" onclick="confirmDelete()">
                <i class='fa fa-trash' style='font-size:20px;color:red'></i>DELETE</a></span>
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
        confirmValue = confirm('Delete brand?');
        if(!confirmValue)
        {
            event.preventDefault();
        }
    }
</script>
</body>

</html>
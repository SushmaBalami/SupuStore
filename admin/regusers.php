<?php
    include 'includes/conn.php';
?>
    
<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>SuPu Store | Reg Users</title>
    <link href="img/logo.png" rel="icon">
</head>

<body>
    <?php
        include 'includes/header.php';
    ?>
	<div class="container">
	<div class="title">Registered Users</div><br><hr><br>
        <table style="width: 98%;">
            <tr>
                <th style="width: 4%;">S.N.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Contact No</th>
                <th>Reg Date</th>
                <th>Date of Birth</th>
                <th>Address</th>
            </tr>

            <?php
            $sql = "SELECT * FROM tbl_customer";
            $result = mysqli_query($conn, $sql);
            $count=1;
            if (mysqli_num_rows($result) > 0) {
                while ($value = mysqli_fetch_assoc($result)) {
            ?>

            <tr>
                <td><?php echo htmlentities($count); ?></td>
                <td><?php echo $value['customer_name']; ?></td>
                <td><?php echo $value['customer_email']; ?></td>
                <td><?php echo $value['customer_gender']; ?></td>
                <td><?php echo $value['customer_phone']; ?></td>
                <td><?php echo $value['joindate']; ?></td>
                <td><?php echo $value['customer_dob']; ?></td>
                <td><?php echo $value['customer_address']; ?></td>
                <?php
                $count=$count+1; }
                }
                ?>
            </tr>
        </table>
	</div>
</body>
</html>
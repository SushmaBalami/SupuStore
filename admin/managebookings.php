<?php
    include 'includes/conn.php';
?>

<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>SuPu Store | Manage Bookings</title>
    <link href="img/logo.png" rel="icon">
    <style>
        table tr td a{
            text-decoration: none;
        }

        .pending{
            background-color: tomato;
            color: aliceblue;
            padding: 4px 8px;
            border: 1px solid black;
            border-radius: 3px;
        }

        .completed{
            background-color: #4BB543;
            color: aliceblue;
            padding: 4px 8px;
            border: 1px solid black;
            border-radius: 3px;
        }
    </style>
</head>

<body>
    <?php
    include 'includes/header.php';
    ?>
    <div class="container">
        <div class="title">Manage Bookings</div><br>
        <hr><br>
        <table width="98%">
            <tr>
                <th style="width: 50px;">S.N.</th>
                <th>Customer Name</th>
                <th>Category</th>
                <th>Product Id</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Message</th>
                <th>Order Date</th>
                <th>Totalcost</th>
                <th style="width: 100px;">Status</th>
            </tr>
            <?php
            
            ?>

            <?php
            
            $sql = "SELECT * FROM tbl_order";
            $result = mysqli_query($conn, $sql);
            $count=1;
            
            if (mysqli_num_rows($result) > 0) {
                while ($value = mysqli_fetch_assoc($result)){
            ?>


            <tr>
                <td><?php echo htmlentities($count); ?></td>
                <td><?php echo $value['customername']; ?></a></td>
                <td><?php echo $value['category']; ?></a></td>
                <td><?php echo $value['productid'];?></td>
                <td><?php echo $value['productname'] ?></td>
                <td><?php echo $value['price'] ?></td>
                <td><?php echo $value['quantity']; ?></td>
                <td><?php echo $value['phone']; ?></td>
                <td><?php echo $value['address']; ?></td>
                <td><?php echo $value['message']; ?></td>
                <td><?php echo $value['orderdate']; ?></td>
                <td><?php echo $value['totalcost'];?></td>
                <td>
                    <?php
                    if($value['status'] == 'Pending')
                    {
                    ?>
                        <a href="confirmorder.php?id=<?php echo $value['id'];?>" onclick="confirmAction()"> 
                        <button class="pending"><?php echo $value['status'];?></button></a>
                    <?php
                    }
                    else
                    {
                        ?><button class="completed"><?php
                     echo $value['status'];?></button><?php
                    } 
                    ?>
                </td>
                <?php
                $count=$count+1; }
            }
            ?>
            </tr>
        </table>

    </div>
    
</body>

</html>

<?php
include 'include/conn.php';
session_start();
?>

<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SuPu Store | My Order</title>
    <link rel="icon" href="./images/logo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='css/cart.css' type='text/css' media='all' />
    <style>
        .table {
            background-color: rgb(255, 255, 255);
            transform: translate(21%, 0);
            text-align: center;
            border-radius: 12px;
            box-shadow: 2px 2px 5px black;
        }

        
    </style>

</head>

<body>
    <div class="heading">
        <?php
        include 'include/header.php';
        ?>
    </div>
    <h2>My Order</h2>
    <div class="cart">
        <table class="table">
            <tbody>
                <tr>
                    <th></th>
                    <th>ITEM NAME</th>
                    <th>CATEGORY</th>
                    <th>QUANTITY</th>
                    <th>UNIT PRICE</th>
                    <th>TOTAL</th>
                    <th>STATUS</th>
                </tr>

                <?php
                $username = $_SESSION['username'];
                // echo $username;
                $sql = "SELECT * FROM tbl_order WHERE customername='$username'";
                $result = mysqli_query($conn, $sql);
                $count = 1;
                if (mysqli_num_rows($result) > 0) {
                    while ($value = mysqli_fetch_assoc($result)) {
                        $stmt1 = "SELECT * FROM tbl_products WHERE productid = " . $value['productid'] . "";
                        $rs1 = mysqli_query($conn, $stmt1);
                        $valuep = mysqli_fetch_assoc($rs1);
                ?>
                        <tr>
                            <td colspan="7" style="border-bottom: 1px solid rgb(218, 218, 218); border-top: 2px solid black">
                                <div class="date">
                                    <p>Order Placed on <i><span style="color: grey;"><?php echo $value['orderdate']; ?></span></i></p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="height: 120px; padding:2px 40px;">
                                <img src="images/upload/<?php echo $valuep['img1']; ?>" width="80" height="80" />
                            </td>
                            <td style="text-align:left; padding-left: 20px;">
                                <p class="details"><?php echo $value['productname']; ?></p>
                            </td>
                            <td><?php echo $value['category']; ?></td>
                            <td><?php echo $value['quantity']; ?></td>
                            <td><?php echo $value['price'] ?></td>
                            <td><?php echo $value['totalcost']; ?></td>
                            <td style="height: 120px; padding:2px 40px;"><?php echo $value['status']; ?></td>
                    <?php
                        $count = $count + 1;
                    }
                }
                    ?>

            </tbody>
        </table><br>
    </div>
</body>

</html>
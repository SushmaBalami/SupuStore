<?php
include 'conn.php';
if (isset($_SESSION['log_status'])) {
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM tbl_customer WHERE customer_email = '$email' ";

    $result = mysqli_query($conn, $sql);
    $Values = mysqli_fetch_assoc($result);

    $_SESSION['id'] = $Values['customer_id'];
    $_SESSION['name'] = $Values['customer_name'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
</head>

<body>
    <header>
        <div class="logo">
            <a href="index.php"><img src="./images/logo1.png" width=180px;></a>
        </div>
        <nav>
            <ul>
                <li><a href="index.php" style="color:tomato;">Home</a></li>
                <li><a href="index.php#about">About</a></li>
                <li><a href="index.php#service">Service</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="index.php#contact">Contact</a></li>
                <?php
                if (isset($_SESSION['log_status'])) {
                ?>
                    <li>
                        <div class="dropdown">
                            <div class="dropbtn"><?php echo $_SESSION['name']; ?></div>
                            <div class="dropdown-content">
                                <a href="cart.php">Cart</a>
                                <a href="myorder.php">My Order</a>
                                <a href="changepw.php">Change Password</a> 
                                <a href="logout.php" onclick="if (confirm(`Are You sure you want to logout?`)){return true;}else{event.stopPropagation(); event.preventDefault();};">Log out</a>                
                            </div>
                        </div>
                    </li>


                    <li><a href="cart.php"><i class="fa fa-shopping-cart" style="font-size: 30px;"></i></a></li>

                <?php
                } else {
                ?>
                    <li>
                        <input class="srch" type="search" name="" placeholder="Type to text">
                        <a href="#"><button class="btn">Search</button></a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </nav>
    </header>
</body>

</html>
<?php
include 'include/conn.php';
session_start();
?>

<?php
if (isset($_POST['submit'])) {
    $quantity = $_POST['quantity'];
    $pid = $_POST['pid'];
    header('location:buyproduct.php?quantity=' . $quantity . '&pid=' . $pid);
}
if (isset($_POST['addtocart'])) {
    $quantity = $_POST['quantity'];
    $pid = $_POST['pid'];
    
    //to get the data of the customer
    $cemail = $_SESSION['email'];
    $stmt = "SELECT * FROM tbl_customer WHERE customer_email = '$cemail'";
    $rs = mysqli_query($conn,$stmt);
    $valuec = mysqli_fetch_assoc($rs);
    //$valuec has all the value of the customer 

    //to get the data of the product
        $stmt1 = "SELECT * FROM tbl_products WHERE productid = '$pid'";
        $rs1 = mysqli_query($conn,$stmt1);
        $valuep = mysqli_fetch_assoc($rs1);
    //$valuep has all the value of the product

        $cid = $valuec['customer_id'];
        $price = $valuep['price'];
        $stmt = "INSERT INTO tbl_cart(customer_id,product_id,price,quantity) VALUES('$cid','$pid','$price','$quantity')";


        if(mysqli_query($conn,$stmt))
        {
            echo "<script>
            alert('Product added in cart successfully !'); </script>";    
            
        }
        else
        {
            echo "<script>alert('Failed');</script>";
        }
}
?>

<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>SuPu Shopping | Womensware</title>
    <style>
        .hidden {
            display: none;
        }
    </style>
    <link rel="icon" href="./images/logo.png" />
</head>

<body>
    <div class="heading">
        <?php
        include 'include/header.php';
        ?>
    </div>

    <div class="container">

        <div class="category">Womensware</div>

        <div class="dropdown1">
            <button class="dropbtn1">Categories</button>
            <div class="dropdown-content1">
                <a href="products.php">All Categories</a>
                <a href="mens.php">Mensware</a>
                <a href="kids.php">Kidsware</a>
            </div>
        </div>

        <div class=" product" id="myBtn">
            <?php
            $sql = "SELECT * FROM tbl_products WHERE category = 'womensware'";
            $result = mysqli_query($conn, $sql);
            $i = 0;
            if (mysqli_num_rows($result) > 0) {
                while ($value = mysqli_fetch_assoc($result)) {
            ?>
                    <div class="item" onclick="show('<?php echo $i; ?>')">
                        <div class="image">
                            <img src="images/upload/<?php echo $value['img1']; ?>" alt="" height="200px" width="200px" ;>
                        </div>
                        <div class="desc">
                            <div class="productname">
                                <?php echo $value['productname']; ?>
                            </div>
                            <div class="title">
                                <?php echo $value['title']; ?>
                            </div>
                            <div class="price">
                                <?php echo "Rs " . $value['price']; ?>
                            </div>
                        </div>
                    </div>

                    <div id='<?php echo $i; ?>' class="modal">
                        <div class="modal-content">
                            <span class="close" onclick="closeWindow(<?php echo $i; ?>)">&times;</span>

                            <form action="#" method="POST" enctype="multipart/form-data">
                                <div class="image">
                                    <img src="images/upload/<?php echo $value['img1']; ?>" alt="" height="400px" width="380px" ;>
                                </div>
                                <div class="information">
                                    <div class="pname">
                                        <?php echo $value['productname']; ?>
                                    </div>
                                    <div class="ptitle">
                                        <b><label>Title : </label></b>
                                        <?php echo $value['title']; ?>
                                    </div>
                                    <div class="pdescription">
                                        <b><label>Description : </label></b>
                                        <?php echo $value['description']; ?>
                                    </div>
                                    <div class="pprice">
                                        <?php echo "Rs. " . $value['price']; ?>
                                    </div>

                                    <input class="hidden" type="text" name="pid" value="<?php echo $value['productid']; ?>">

                                    <?php
                                        if (isset($_SESSION['log_status'])) {
                                        ?>
                                    <div class="pquantity">
                                        <b><label for="quantity">Quantity : </label></b>
                                        <input type="number" id="quantity" name="quantity" min="1" max="5" value="1">
                                    </div>
                                    
                                    <div class="bottonss">
                                        <input class="button" type="submit" value="Buy Now" name="submit" style="background-color: #2596be;">
                                        <input class="button" type="submit" value="Add to Cart" name="addtocart" style="background-color: tomato;">
                                    </div>
                                    <?php
                                        } else {
                                        ?>
                                        <p class="warning">Please Login first to make order</p>
                                        <div class="buttonss loginbtn">
                                            <button class="button" style="background-color: tomato;">
                                                <a href="index.php">Log In Now</a>
                                            </button>
                                        </div>
                                        <?php
                }
                ?>
                            </form>
                        </div>
                    </div>
        </div>
<?php
                    $i++;
                }
            }
?>

    </div>

    </div>

    <script src="js/productinfo.js"></script>

</body>

</html>
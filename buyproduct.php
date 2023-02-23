<?php
include 'include/conn.php';
session_start();
if(isset($_GET['quantity']) && isset($_GET['pid']))
{
    $quantity = $_GET['quantity'];
    $pid = $_GET['pid'];
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

    $total = ($valuep['price'] * $quantity)+70;

    if(isset($_POST['submit']))
    {
        $cname = $valuec['customer_name'];
        $cphone = $valuec['customer_phone'];
        $category = $valuep['category'];
        $pname = $valuep['productname'];
        $price = $valuep['price'];
        $address = $valuec['customer_address'];
        $message = $_POST['message'];
        $stmt = "INSERT INTO tbl_order(customername,category,productid,productname,price,quantity,address,totalcost,message,phone) VALUES('$cname','$category','$pid','$pname','$price','$quantity','$address','$total','$message','$cphone')";


        if(mysqli_query($conn,$stmt))
        {
            echo "<script>alert('Your order is submitted. We\'ll contact you soon.');</script>";    
            
        }
        else
        {
            echo "<script>alert('Your order is not submitted');</script>";
        }
    }
}
else
{
    header('location:products.php');
}

?>

<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="css/buyitem.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>SuPu Shopping | All products</title>
    <link rel="icon" href="./images/logo.png" />
</head>

<body>
    <div class="heading">
        <?php
        include 'include/header.php';
        ?>
    </div>

    <div class="container">
        <div class="firstcontainer">
            <h1><?php echo $valuep['productname'];?></h1>
            <div class="intro">
                <img src="images/upload/<?php echo $valuep['img1']?>" alt="" width="200px" height="200px">
                <p class="desc"><?php echo $valuep['title'];?><br><?php echo $valuep['description'];?></p>
                <p class="price">Price <br>Rs <?php echo $valuep['price'];?></p>
                <p class="qty">Quantity <br><?php echo $quantity;?></p>
            </div>  
        </div>'

        <div class="secondcontainer">
            <div class="moredetail">
                <h2>Shipping Address</h2>
                <div class="personalinfo">
                    <p><b>Name:</b> <?php echo $valuec['customer_name']?></p>
                    <p><b>Phone:</b> <?php echo $valuec['customer_phone']?></p>
                    <p><b>Email:</b> <?php echo $valuec['customer_email']?></p>
                    <p><b>Address:</b> <?php echo $valuec['customer_address']?></p>
                </div>
                <hr style="margin-bottom: 20px ;">

                <h2>Order Summary</h2>
                <div class="priceinfo">
                <p>Item Price <span>Rs <?php echo $valuep['price'];?></span></p>
                <p>Shipping Fee <span>Rs 70</span></p>
                <hr style="position:absolute; width:80px; right:30px;">
                <b><p style="margin-top: 10px;">Total Price <span>Rs <?php echo $total;?></span></p></b>
                </div>
                <hr style="margin-bottom: 20px ;">

                <form action="#" method="post">
                    <p class="caption">Mention color and size of the product if mentioned in details of product</p>
                    <textarea name="message" id="" placeholder="Message"></textarea>
                    <input type="submit" name="submit" value="Confirm Order" class="button">
                </form>
            </div>
            

        </div>

    </div>

</body>

</html>
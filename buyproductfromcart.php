<?php
include 'include/conn.php';
session_start();
$cemail = $_SESSION['email'];
    
$stmt = "SELECT * FROM tbl_customer WHERE customer_email = '$cemail'";
$rs = mysqli_query($conn,$stmt);
$valuec = mysqli_fetch_assoc($rs);
//$valuec has all the value of the customer 
$cid = $valuec['customer_id'];
$stmt = "SELECT * FROM tbl_cart WHERE customer_id = '$cid'";
$rs = mysqli_query($conn,$stmt);

$total = 0;

if(isset($_POST['submit']))
{
    $count=0;
    while($vo=mysqli_fetch_assoc($rs))
    {
        //$vo has cart details
        $pid = $vo['product_id'];
        $stmt4 = "SELECT * FROM tbl_products WHERE productid = $pid";
        $rs4 = mysqli_query($conn,$stmt4);
        $valueop = mysqli_fetch_assoc($rs4);
        //$valueop has product details

        $cname = $valuec['customer_name'];
        $cphone = $valuec['customer_phone'];
        $category = $valueop['category'];
        $pname = $valueop['productname'];
        $price = $vo['price'];
        $quantity = $vo['quantity'];
        $address = $valuec['customer_address'];
        $message = $_POST['message'];

        $total = ($price* $quantity)+70;
        $stmt3 = "INSERT INTO tbl_order(customername,category,productid,productname,price,quantity,address,message,totalcost,phone) VALUES('$cname','$category','$pid','$pname','$price','$quantity','$address','$message','$total','$cphone')";
        if(!(mysqli_query($conn,$stmt3)))
        {
            $count++;
        }
        
    }
    if($count>0)
    {
        echo "not done";
    }
    else{
        $sql = "DELETE FROM `tbl_cart`";
        if(mysqli_query($conn,$sql))
        {
            echo "<script>
                    alert('Your order is submitted. We\'ll contact you soon.');
                    window.location='products.php';
                </script>";
        }
        else
    {
        echo "<script>
                alert('Error in performing opertaion');
                window.location='products.php';
            </script>";
    }
        }
}
?>

<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="css/buyproduct.css">
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
        <?php
        $num = mysqli_num_rows($rs);
        if(mysqli_num_rows($rs)>0)
        {
            while($valueo=mysqli_fetch_assoc($rs))
            {
                $pid = $valueo['product_id'];
                $stmt1 = "SELECT * FROM tbl_products WHERE productid = $pid";
                $rs1 = mysqli_query($conn,$stmt1);
                $valuep = mysqli_fetch_assoc($rs1);
            ?>
        <div class="firstcontainer">
            <h1><?php echo $valuep['productname'];?></h1>
            <div class="intro">
                <img src="images/upload/<?php echo $valuep['img1']?>" alt="" width="100px" height="100px">
                <p class="desc"><?php echo $valuep['title'];?><br><?php echo $valuep['description'];?></p>
                <p class="price">Price <br>Rs <?php echo $valueo['price'];?></p>
                <p class="qty">Quantity <br><?php echo $valueo['quantity'];?></p>
            </div>  
        </div>
            <?php
            $total += $valueo['price']*$valueo['quantity'];
            }
        }
        else{
            echo "No value found";
        }
        ?>
        

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
                <p>Total Price <span>Rs <?php echo $total;?></span></p>
                <p>Shipping Fee <span>Rs <?php echo 70*$num;?></span></p>
                <hr style="position:absolute; width:80px; right:30px;">
                <b><p style="margin-top: 10px;">Total Price <span>Rs <?php echo $total+(70*$num);?></span></p></b>
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
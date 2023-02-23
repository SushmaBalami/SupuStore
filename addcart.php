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

        $cid = $valuec['customer_id'];
        $price = $valuep['price'];
        $stmt = "INSERT INTO tbl_cart(customer_id,product_id,price,quantity) VALUES('$cid','$pid','$price','$quantity')";


        if(mysqli_query($conn,$stmt))
        {
            echo "<script>
            alert('Added');
            window.location.href = 'products.php'; </script>";    
            
        }
        else
        {
            echo "<script>alert('Failed');</script>";
        }
}
?>
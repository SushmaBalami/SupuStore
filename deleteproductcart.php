<?php
include "include/conn.php";
if(isset($_GET['productid']))
{
    $productid = $_GET['productid'];
    $sql = "DELETE FROM `tbl_cart` WHERE `product_id` = '$productid'";
    if(mysqli_query($conn,$sql))
    {
        echo "<script>
                alert('Deleted Successfully');
                window.location='cart.php';
            </script>";
    }
    else
    {
        echo "<script>
                alert('Error in performing opertaion');
                window.location='cart.php';
            </script>";
    }
}
else
{
    header('location:cart.php');
}
?>
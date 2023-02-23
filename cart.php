<?php
include 'include/conn.php';
session_start();

$cemail = $_SESSION['email'];
$stmt = "SELECT * FROM tbl_customer WHERE customer_email = '$cemail'";
$rs = mysqli_query($conn,$stmt);
$valuec = mysqli_fetch_assoc($rs);
//$valuec has all the value of the customer 
$cid = $valuec['customer_id'];
$stmt1 = "SELECT * FROM tbl_cart WHERE customer_id = '$cid'";
$rs1 = mysqli_query($conn,$stmt1);

if(isset($_POST['submit']))
{
    $quantity = $_POST['quantity'];
    $poid=[];
    $i=0;
    while($valueoo = mysqli_fetch_assoc($rs1)){
        array_push($poid,$valueoo['id']);
    }
    $length = mysqli_num_rows($rs1);
    echo $length;
    for($j=0;$j<$length;$j++)
    {
        $sql = "UPDATE tbl_cart SET quantity = ".$quantity[$i]." WHERE customer_id = '$cid' and id=".$poid[$i]."";
        mysqli_query($conn,$sql);
        $i++;   
        header('location:buyproductfromcart.php');
    }
}
?>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SuPu Store | My Cart</title>
    <link rel="icon" href="./images/logo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='css/cart.css' type='text/css' media='all' />

</head>

<body>
    <div class="heading">
        <?php
        include 'include/header.php';
        ?>
    </div>
    <h2>My Cart</h2>
    <div class="cart">
        <table class="table">
            <tbody>
                <form action="#" method="post" enctype="multipart/form-data">
                <tr>
                    <th></th>
                    <th style="width: 350px;">ITEM NAME</th>
                    <th>QUANTITY</th>
                    <th>UNIT PRICE</th>
                    <th>ITEMS TOTAL</th>
                </tr>
                <?php
                if(mysqli_num_rows($rs1)>0)
                {
                    $i=0;
                    while($valueo = mysqli_fetch_assoc($rs1)){
                        $pid = $valueo['product_id'];
                        $stmt2 = "SELECT * FROM tbl_products WHERE productid = '$pid'";
                        $rs2 = mysqli_query($conn,$stmt2);
                        $valuep = mysqli_fetch_assoc($rs2);
                ?>
                <tr>
                    <td colspan="7" style="border-bottom: 1px solid rgb(218, 218, 218); border-top: 2px solid black">
                        <div class="date" style="font-size: 24px;">
                           <b><i><span style="color: black;"><?php echo $valuep['productname']; ?></span></i></b> 
                        </div>
                    </td>
                </tr>
                <tr>
                    <td  style="height: 120px; padding:2px 20px 20px 44px;"><img src="images/upload/<?php echo $valuep['img1'];?>" width="80" height="80" /></td>
                    <td style="text-align:left; padding-left: 20px;">
                        <p class="details"> <?php echo $valuep['title'];?></p><br>
                        <div class="removeitem">
                            <a href="deleteproductcart.php?productid=<?php echo $valuep['productid'];?>" onclick="confirmDelete()">Remove Item</a>
                        </div>
                    </td>
                    <td>
                        
                            <div class="pquantity">
                                <input type="number" id="quantity<?php echo $i?>" name="quantity[]" min="1" max="5" value="<?php echo $valueo['quantity'];?>" onchange="ctotal('quantity<?php echo $i?>','price<?php echo $i?>','total<?php echo $i?>')">
                            </div>
                        
                    </td>
                    <td style="font-size: 20px;" id="price<?php echo $i?>"> <?php echo $valuep['price'];?></td>
                    <td style="font-size: 20px;" id="total<?php echo $i?>"> <?php echo $valueo['quantity']*$valuep['price'];?></td>
                </tr>
                <?php
                    $i++;
                    }
                }
                ?>

                <tr>
                    <td colspan="5" style="border-top: 2px solid black;">
                        <input type="submit" class="button" name="submit" value="Check Out">
                    </td>
                </tr>
                </form>
            </tbody>
        </table>
    </div>
    <script>
    function confirmDelete(){
        confirmValue = confirm('Delete this product?');
        if(!confirmValue)
        {
            event.preventDefault();
        }
        }
    </script>
    <script>
        function ctotal(qt,p,t)
        {
            let quantity = Number(document.getElementById(qt).value);
            let price = Number(document.getElementById(p).innerHTML);
            document.getElementById(t).innerHTML= quantity*price;

        }
    </script>
</body>

</html>
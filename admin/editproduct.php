<?php
include "includes/conn.php";

if(isset($_GET['productid']) && isset($_GET['category']))
{
    $productid = $_GET['productid'];
    $category = $_GET['category'];

    if($category == "mensware") 
        $sql = "SELECT * FROM tbl_products WHERE productid = '$productid'";
    else if($category == "womensware") 
        $sql = "SELECT * FROM tbl_products WHERE productid = '$productid'";
    else
        $sql = "SELECT * FROM tbl_products WHERE productid = '$productid'";
        $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0)
    {
        $row = mysqli_fetch_assoc($result);
    }
    else{
        echo "<script>
                alert('Category found');
                window.location='manageproducts.php';
            </script>";
    }
    
    if(isset($_POST['submit']))
    {
        $productname = $_POST['productname'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];

        // database insert SQL code
        if($category == "mensware") 
            $sql = "UPDATE tbl_products SET productname = '$productname', title = '$title', description = '$description', price = '$price'  WHERE productid = '$productid'";
        else if($category == "womensware") 
            $sql = "UPDATE tbl_products SET productname = '$productname', title = '$title', description = '$description', price = '$price' WHERE productid = '$productid'";
        else
            $sql = "UPDATE tbl_products SET productname = '$productname', title = '$title', description = '$description', price = '$price' WHERE productid = '$productid'";
        // insert in database 
        if($submit = mysqli_query($conn, $sql)){
            echo "<script>
                alert('Updated Successfully');
                window.location='manageproducts.php';
            </script>";
        }
        else {
            echo "<script>
            alert('Error in updating');
            window.location='manageproducts.php';
        </script>";
        }
    }

}
else
{
    header('location:managecategory.php');
}
?>

<!DOCTYPE html>
<head>
<link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Edit Brand</title>
    <link href="img/logo.png" rel="icon">
</head>

<body>
<?php
    include 'includes/header.php';
?>
<div class="container">
    <div class="title">Edit Category</div><br><hr><br>
        <div class="form-container">  
            <form method="POST" action="#">
                <table>
                    <tr><td colspan="3" style="background-color: tomato; padding:16px;">Form Fields</td></tr>
                    <tr>
                        <div class="input-box">
                            <td><label>Product Name</label></td>
                            <td colspan="2"><input type="text" class="abc" name="productname"  id="productname" value="<?php if(isset($productname)){ echo $productname;} else { echo $row['productname'];}?>"></td>
                        </div>
                    </tr>

                    <tr>
                        <div class="input-box">
                            <td><label>Title</label></td>
                            <td colspan="2"><input type="text" class="abc" name="title"  id="title" value="<?php if(isset($title)){ echo $title;} else { echo $row['title'];}?>"></td>
                        </div>
                    </tr>

                    <tr>
                        <div class="input-box">
                            <td><label>Description</label></td>
                            <td colspan="2"><input type="text" class="abc" name="description"  id="description" value="<?php if(isset($description)){ echo $description;} else { echo $row['description'];}?>"></td>
                        </div>
                    </tr>

                    <tr>
                        <div class="input-box">
                            <td><label>Price</label></td>
                            <td colspan="2"><input type="text" class="abc" name="price"  id="price" value="<?php if(isset($price)){ echo $price;} else { echo $row['price'];}?>"></td>
                        </div>
                    </tr>
                    
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Update" name="submit" class="button"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>	
</div>
</body>
</html>
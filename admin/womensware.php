<?php
    session_start();
    error_reporting(0);
    include "includes/conn.php";

    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        if(isset($_POST['submit']))
        {
            $category = "womensware";
            $productname = $_POST['productname'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            
            function imageUpload($image)
            {
                
                $imgName = $image['name'];
                $imgSize = $image['size'];
                $imgError = $image['error'];
                $imgTmpName = $image['tmp_name'];

                if($imgError == 0)
                {
                    $imgEx = pathinfo($imgName,PATHINFO_EXTENSION);
                    $imgExlc = strtolower($imgEx);
                    
                    $newImgName = uniqid("IMG-",true).'.'.$imgExlc;
                    $imgPath = '../images/upload/'.$newImgName;
                    move_uploaded_file($imgTmpName,$imgPath);
                    return $newImgName;
                }
                else
                {
                    return "Error";
                }
            }

            $img1 = $img2 = $img3 = NULL;
            if($_FILES['img1']['size']>0){
                $img1 = imageUpload($_FILES['img1']);
            }

            
            $sql = "INSERT INTO tbl_products(category, productname, title, description, price, img1) VALUES('$category','$productname','$title','$description','$price','$img1')";

            if(mysqli_query($conn,$sql)){
                $msg = "Product Created Successfully";
            }
            else{
                $error="Something went wrong. Please try again";
            }
        }     
    }
?>

 
<!DOCTYPE html>
<head>
<link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>SuPu Store | Add Product for Women</title>
    <link href="img/logo.png" rel="icon">
    <style>
        .errorWrap {
            padding: 10px;
            margin: 0 155px 10px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }
        .succWrap{
            padding: 10px;
            margin: 0 155px 10px 0;
            background: #fff;
            border-left: 4px solid #5cb85c;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }
    </style>
</head>

<body>
<?php
    include 'includes/header.php';
?>
<div class="container">
    <div class="title">Create Category</div><br><hr><br>
        <div class="form-container">  
            <form method="POST" action="#" id="form" enctype="multipart/form-data">
                <table>
                    <tr><td colspan="3" style="background-color: tomato; padding:16px;">Fields</td></tr>
                    <?php 
                    if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                    else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                    <tr>
                        <div class="input-box">
                            <td><label>Category</label></td>
                            <td colspan="2"><input type="text" name="category" id="category" class="abc" value="Womensware" disabled></td>
                        </div>
                    </tr>

                    <tr>
                        <div class="input-box">
                            <td><label>Product Name</label></td>
                            <td colspan="2">
                                <select name="productname" class="abc" id="productname">
                                    <option value="0">Product *</option>
                                    <?php
                                    {
                                        $sql = "SELECT * FROM `tbl_category` WHERE category='womensware'";
                                        $result = mysqli_query($conn,$sql);
                                        if(mysqli_num_rows($result)>0)
                                        {
                                            while($value = mysqli_fetch_assoc($result))
                                            {
                                        ?>
                                        <option value="<?php echo $value['name'];?>"><?php echo $value['name'];?></option>
                                        <?php
                                            }
                                        }
                                    }
                                    ?>

                                </select>
                            </td>
                        </div>
                    </tr>

                    <tr>
                        <div class="input-box">
                            <td><label>Title</label></td>
                            <td colspan="2"><input type="text" class="abc" name="title"  id="title" required></td>
                        </div>
                    </tr>

                    <tr>
                        <div class="input-box">
                            <td><label>Description</label></td>
                            <td colspan="2"><input type="text" class="abc" name="description"  id="description" required></td>
                        </div>
                    </tr>

                    <tr>
                        <div class="input-box">
                            <td><label>Price</label></td>
                            <td colspan="2"><input type="text" class="abc" name="price"  id="price" required></td>
                        </div>
                    </tr>

                    <tr>
                        <div class="input-box">
                        <td><label>Upload Images * <span style="color: red;">(in jpg format)</span></label></td>
                        <td colspan="2" >
                            <input type="file" id="img1" name="img1" class="abc" required>
                        </td>   
                    </tr>
                    
                    <tr>
                        <td></td>
                        <td style="display: flex;"><input type="submit" value="Submit" name="submit" class="button" onclick="validate()">&nbsp;
                        &nbsp;&nbsp;<input type="reset" value="Cancel" name="reset" class="button"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>	
</div>
</body>
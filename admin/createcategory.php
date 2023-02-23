<?php
    session_start();
    error_reporting(0);
    include "includes/conn.php";
    if(isset($_POST['submit']))
    {
        $category = $_POST['category']; 
        $clothes = $_POST['clothes'];
        // database insert SQL code
        if($category == "mensware") 
            $sql = "INSERT INTO `tbl_category` (`name`,`category`) VALUES ('$clothes','mensware')";
        else if($category == "womensware") 
            $sql = "INSERT INTO `tbl_category` (`name`,`category`) VALUES ('$clothes','womensware')";
        else
            $sql = "INSERT INTO `tbl_category` (`name`,`category`) VALUES ('$clothes','kidsware')";
        // insert in database 
        if($submit = mysqli_query($conn, $sql)){
            $msg = "Category Created Successfully";
        }
        else {
            $error="Something went wrong. Please try again";	
        }
    }
?>
 
<!DOCTYPE html>
<head>
<link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>SuPu Store | Create Category</title>
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
            <form method="POST" action="#">
                <table>
                    <tr><td colspan="3" style="background-color: tomato; padding:16px;">Fields</td></tr>
                    <?php 
                    if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                    else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                    <tr>
                        <div class="input-box">
                            <td><label>Category</label></td>
                            <td colspan="2">
                                <select name="category" class="abc">
                                    <option value="mensware">Mensware</option>
                                    <option value="womensware">Womensware</option>
                                    <option value="kidsware">Kidsware</option>
                                </select>
                            </td>
                        </div>
                    </tr>

                    <tr>
                        <div class="input-box">
                            <td><label>Type of Clothes</label></td>
                            <td colspan="2"><input type="text" class="abc" name="clothes"  id="clothes" required></td>
                        </div>
                    </tr>
                    
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Submit" name="submit" class="button"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>	
</div>
</body>
</html>
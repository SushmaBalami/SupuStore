<?php
include "includes/conn.php";

if(isset($_GET['id']) && isset($_GET['category']))
{
    $id = $_GET['id'];
    $category = $_GET['category'];

    if($category == "mensware") 
        $sql = "SELECT * FROM tbl_category WHERE id = '$id'";
    else if($category == "womensware") 
        $sql = "SELECT * FROM tbl_category WHERE id = '$id'";
    else
        $sql = "SELECT * FROM tbl_category WHERE id = '$id'";
        $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0)
    {
        $row = mysqli_fetch_assoc($result);
    }
    else{
        echo "<script>
                alert('Category found');
                window.location='managecategory.php';
            </script>";
    }
    
    if(isset($_POST['submit']))
    {
        $name = $_POST['name'];
        // database insert SQL code
        if($category == "mensware") 
            $sql = "UPDATE tbl_category SET name = '$name' WHERE id = '$id'";
        else if($category == "womensware") 
            $sql = "UPDATE tbl_category SET name = '$name' WHERE id = '$id'";
        else
            $sql = "UPDATE tbl_category SET name = '$name' WHERE id = '$id'";
        // insert in database 
        if($submit = mysqli_query($conn, $sql)){
            echo "<script>
                alert('Updated Successfully');
                window.location='managecategory.php';
            </script>";
        }
        else {
            echo "<script>
            alert('Error in updating');
            window.location='managecategory.php';
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
                            <td><label>Type of Clothes</label></td>
                            <td colspan="2"><input type="text" class="abc" name="name"  id="name" value="<?php if(isset($name)){ echo $name;} else { echo $row['name'];}?>"></td>
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
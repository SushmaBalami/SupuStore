<?php
include "includes/conn.php";

if(isset($_GET['id']) && isset($_GET['category']))
{
    $id = $_GET['id'];
    $category = $_GET['category'];

    if($category == "mensware") 
        $sql = "DELETE FROM tbl_category WHERE id = '$id'";
    else if($category == "womensware") 
        $sql = "DELETE FROM tbl_category WHERE id = '$id'";
    else
        $sql = "DELETE FROM tbl_category WHERE id = '$id'";

    if(mysqli_query($conn,$sql))
    {
        echo "<script>
                alert('Deleted Successfully');
                window.location='managecategory.php';
            </script>";
    }
    else
    {
        echo "<script>
                alert('Error in performing opertaion');
                window.location='managecategory.php';
            </script>";
    }
}
else
{
    header('location:managecategory.php');
}
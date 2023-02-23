<?php
include 'includes/conn.php';
if(isset($_GET['id']))
{
    $stmt = "UPDATE tbl_order SET status = 'Completed' WHERE id = ".$_GET['id'];
    if(mysqli_query($conn,$stmt))
    {
        header('location:managebookings.php');
    }
    else
    {
        echo"
            <script>
                alert('Error in performing the action')
            </script>
        ";
    }
}
else
{
    header('location:managebookings.php');
}
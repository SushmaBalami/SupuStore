<?php
include 'includes/conn.php';
if(isset($_GET['customer_id']))
{
    $stmt = "UPDATE tbl_msg SET status = 'Read' WHERE customer_id = ".$_GET['customer_id'];
    if(mysqli_query($conn,$stmt))
    {
        header('location:message.php');
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
    header('location:message.php');
}
<?php
    include 'include/conn.php';
    session_start();

    if(isset($_POST['login']))
    {
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        // echo $password;
        $sql = "SELECT * FROM tbl_customer WHERE customer_email = '$email' AND customer_pass = '$password'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) == 1)
        {
            $value = mysqli_fetch_assoc($result);
            $_SESSION['log_status'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['username'] = $value['customer_name'];
            echo "<script> 
                window.location.href='index.php'; 
            </script>";
        }
        else
        {
            header('location:index.php');
            $_SESSION['error'] = "E-mail or password incorrect";
        }
    }
?>
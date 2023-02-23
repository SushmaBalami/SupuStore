<?php
    session_start();
    error_reporting(0);
    include "includes/conn.php";
?>
<?php
	session_start();
	error_reporting(0);
	include('includes/config.php');
	if(strlen($_SESSION['alogin'])==0)
		{	
	header('location:index.php');
	}
	else{
	// Code for change password	
	if(isset($_POST['submit']))
		{
	$password=md5($_POST['password']);
	$newpassword=md5($_POST['newpassword']);
	$username=$_SESSION['alogin'];
	$sql ="SELECT Password FROM tbl_admin WHERE UserName=:username and Password=:password";
	$query= $dbh -> prepare($sql);
	$query-> bindParam(':username', $username, PDO::PARAM_STR);
	$query-> bindParam(':password', $password, PDO::PARAM_STR);
	$query-> execute();
	$results = $query -> fetchAll(PDO::FETCH_OBJ);
	if($query -> rowCount() > 0)
	{
	$con="update tbl_admin set Password=:newpassword where UserName=:username";
	$chngpwd1 = $dbh->prepare($con);
	$chngpwd1-> bindParam(':username', $username, PDO::PARAM_STR);
	$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
	$chngpwd1->execute();
	$msg="Your Password succesfully changed";
	}
	else {
	$error="Your current password is not valid.";	
	}
}
?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>SuPu | Change Password</title>
    <link href="img/logo.png" rel="icon">
	<script type="text/javascript">
	function valid()
	{
		if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
		{
			alert("New Password and Confirm Password Field do not match  !!");
			document.chngpwd.confirmpassword.focus();
			return false;
		}
		return true;
	}
	</script>
	<style>
		.errorWrap {
		padding: 10px;
		margin: 0 0 20px 0;
		background: #fff;
		border-left: 4px solid #dd3d36;
		-webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
		box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
	}
	.succWrap{
		padding: 10px;
		margin: 0 0 20px 0;
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
	<div class="title">Change Password</div><br><hr><br>
        <div class="form-container">  
			<table>  
				<form  method="post" name="chngpwd" class="form-horizontal" onSubmit="return valid();">
					<?php 
						if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
						else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }
					?>
					<tr><td colspan="3" style="background-color: tomato; padding:16px;">Change your password</td></tr>
					<tr>
					<div class="input-box">
						<td><label>Current Password</label></td>
						<td colspan="2"><input type="password" class="abc" name="password"  id="password" required></td>
					</div>
					</tr>
					<tr>
					<div class="input-box">
						<td><label>New Password</label></td>
						<td colspan="2"><input type="password" class="abc" name="newpassword"  id="newpassword" required></td>
					</div>
					</tr><tr>
					<div class="input-box">
						<td><label>Confirm Password</label></td>
						<td colspan="2"><input type="password" class="abc" name="confirmpassword"  id="confirmpassword" required></td>
					</div>
					</tr>
					<tr>
					<div >
						<td></td>
						<td><input class="button" type="submit" value="Save" name="submit">&nbsp;&nbsp;
						<a href="change-password.php" class="button" width="500px">Reset</a></td>
					</div>
					</tr>
				</form>
			</table>
		</div>
	</div>
</body>
</html>
<?php } ?>
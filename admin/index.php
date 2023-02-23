<?php
session_start();
include('includes/config.php');
if(isset($_POST['login']))
{
$email=$_POST['username'];
$password=md5($_POST['password']);
$sql ="SELECT UserName,Password FROM tbl_admin WHERE UserName=:email and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['alogin']=$_POST['username'];
echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
} else{
  echo "<script>alert('Invalid Details');</script>";

}

}

?>
<!doctype html>
<head>
	<title>SuPu | Admin Panel</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="img/logo.png" rel="icon">
	<link rel="stylesheet" href="css/login.css">
</head>

<body>
	<div class="boom">
		<div class="left">
			<h2>Admin Section</h2>
			<p>Where you can add new brand, clothes, shoes & delete <br> and can even change the details of the products</p>
		</div>
		<div class="container">
			<div class="forms">
				
				<div class="form-content">
					<div class="title">SuPu Admin Login</div>
					<form method="post">
						<div class="input-boxes">
							<div class="input-box">
								<i class="fas fa-envelope"></i>
								<input type="text" placeholder="Username" name="username" required>
							</div>	
							<div class="input-box">
								<i class="fas fa-lock"></i>
								<input type="password" placeholder="Password" name="password" required>
							</div>
							<div class="button input-box">
								<input type="submit" value="Login" name="login">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>	
</body>

</html>

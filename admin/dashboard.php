<?php
session_start();
include 'includes/conn.php';
?>

<!doctype html>

<head>
	<link rel="stylesheet" href="css/dashboard.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<title>Rent Vehicle | Dashboard</title>
	<link href="img/logo.png" rel="icon">
</head>

<body>
	<?php
	include 'includes/header.php';
	?>
	<div class="container">
		<div class="title">Dashboard</div><br>
		<hr>
		<div class="allbox">
			<a href="regusers.php">
				<div class="box">
					<p>Registered Users</p>
					<h2>
						<?php  
						$sql = "SELECT COUNT(customer_id) AS total FROM tbl_customer;";
						$result = $conn->query($sql);
						$data =  $result->fetch_assoc();
						echo $data['total'];
						?>
					</h2>
				</div>
			</a>

			<a href="manageproducts.php">
				<div class="box">
					<p>Our Products</p>
					<h2>
					<?php  
						$sql = "SELECT COUNT(productid) AS total FROM tbl_products;";
						$result = $conn->query($sql);
						$data =  $result->fetch_assoc();
						echo $data['total'];
						?>
					</h2>
				</div>
			</a>

			<a href="managebookings.php">
				<div class="box">
					<p>Bookings</p>
					<h2>
					<?php  
						$sql = "SELECT COUNT(id) AS total FROM tbl_order;";
						$result = $conn->query($sql);
						$data =  $result->fetch_assoc();
						echo $data['total'];
						?>
					</h2>
				</div>
			</a>

			<a href="message.php">
				<div class="box">
					<p>Messages</p>
					<h2>
					<?php  
						$sql = "SELECT COUNT(customer_id) AS total FROM tbl_msg;";
						$result = $conn->query($sql);
						$data =  $result->fetch_assoc();
						echo $data['total'];
						?>
					</h2>
				</div>
			</a>

			<a href="managecategory.php">
				<div class="box">
					<p>Men's Category</p>
					<h2>
					<?php  
						$sql = "SELECT COUNT(id) AS total FROM tbl_category WHERE category='mensware';";
						$result = $conn->query($sql);
						$data =  $result->fetch_assoc();
						echo $data['total'];
						?>
					</h2>
				</div>
			</a>

			<a href="managecategory.php">
				<div class="box">
					<p>Womens's Category</p>
					<h2>
					<?php  
						$sql = "SELECT COUNT(id) AS total FROM tbl_category WHERE category='womensware';";
						$result = $conn->query($sql);
						$data =  $result->fetch_assoc();
						echo $data['total'];
						?>
					</h2>
				</div>
			</a>

			<a href="managecategory.php">
				<div class="box">
					<p>Kids's Category</p>
					<h2>
					<?php  
						$sql = "SELECT COUNT(id) AS total FROM tbl_category WHERE category='kidsware';";
						$result = $conn->query($sql);
						$data =  $result->fetch_assoc();
						echo $data['total'];
						?>
					</h2>
				</div>
			</a>
		</div>
	</div>
</body>

</html>
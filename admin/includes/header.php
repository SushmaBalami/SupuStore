<html>

<head>
	<link href="../img/logo.png" rel="icon">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/header.css">
</head>

<body>
	<header>
		<div class="logo">
			<a href="dashboard.php" class="sp"><img src="img/logo1.png" width="180px"> </a>
			<a class="admin">ADMIN PANEL</a>
		</div>

		<nav>
			<ul>
				<li><a href="dashboard.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
				<li><button class="dropdown-btn"><i class="fa fa-clone"></i>Category <i class="fa fa-caret-down"></i>
					</button>
					<div class="dropdown-container">
						<a href="createcategory.php">&#x270E; Create Category</a>
						<a href="managecategory.php">&#9638; Manage Category</a>
					</div>
				</li>
				<li><button class="dropdown-btn"><i class="fa fa-edit"></i>Products <i class="fa fa-caret-down"></i>
					</button>
					<div class="dropdown-container">
						<a href="createproducts.php">&#x270E; Create Products</a>
						<a href="manageproducts.php">&#9638; Manage Products</a>
					</div>
				</li>

				<li><a href="managebookings.php"><i class="fa fa-book"></i> Manage Booking</a></li>
				<div class="notification" style="height: 20px; width:20px; background-color:red; border-radius:50%; margin:38px 0 0 -20px; z-index:100;">
					<p style="text-align: center; color: white;">
					<?php  
						$sql = "SELECT COUNT(customername) AS total FROM tbl_order WHERE status='pending';";
						$result = $conn->query($sql);
						$data =  $result->fetch_assoc();
						echo $data['total'];
						?>
					</p>
				</div>
				<li><a href="message.php"><i class="fa fa-desktop"></i> Conatct Us Query</a></li>
				<div class="notification" style="height: 20px; width:20px; background-color:red; border-radius:50%; margin:38px 0 0 -20px; z-index:100;">
					<p style="text-align: center; color: white;">
					<?php  
						$sql = "SELECT COUNT(cname) AS total FROM tbl_msg WHERE status='Pending';";
						$result = $conn->query($sql);
						$data =  $result->fetch_assoc();
						echo $data['total'];
						?>
					</p>
				</div>
				<li><a href="regusers.php"><i class="fa fa-users"></i> Reg Users</a></li>
				<li><a href="change-password.php"><i class="fa fa-cogs"></i> Change Password</a></li>
				<li><a href="logout.php" onclick="if (confirm(`Are You sure you want to logout?`)){return true;}else{event.stopPropagation(); event.preventDefault();};"><i class="fa fa-sign-out"></i> Log out</a></li>
			</ul>
		</nav>
	</header>

	<script>
		var dropdown = document.getElementsByClassName("dropdown-btn");
		var i;

		for (i = 0; i < dropdown.length; i++) {
			dropdown[i].addEventListener("click", function() {
				this.classList.toggle("active");
				var dropdownContent = this.nextElementSibling;
				if (dropdownContent.style.display === "block") {
					dropdownContent.style.display = "none";
				} else {
					dropdownContent.style.display = "block";
				}
			});
		}
	</script>

</body>

</html>
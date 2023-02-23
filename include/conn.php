<?php
	$serverName = 'localhost';
	$dbname = 'supu';
	$dbuser = 'root';
	$dbpass = '';
	$conn = mysqli_connect($serverName,$dbuser,$dbpass,$dbname);

	if(!($conn)){
		echo "error occured in db connection".mysqli_connect_error();
	}

?>
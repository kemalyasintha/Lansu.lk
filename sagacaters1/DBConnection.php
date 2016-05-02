<!DOCTYPE HTML> 
<html>
  <head>
  	<title>
  		Database Connection
  	</title>
  </head>
<body>
	<?php
		$hostname = "localhost";
		$username = "root";
		$password = "1234";

		$conn = mysqli_connect($hostname, $username, $password);

		if(!$conn){
			die("Error!");
		}else{
			//echo "Database connection is succeeded!";
		}

		mysqli_select_db($conn, "sagacaters") or die("NO Database exists!");
	?>
</body>
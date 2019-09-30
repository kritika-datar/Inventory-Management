<?php
	/*session_start();
	if(!isset($_SESSION['username']))
	{                             
		header("Location: login.php");   
	} */         
	include 'admin_home.php';
	include("serverconfig.php");
	$connection = mysqli_connect($servername, $username, $password, $dbname);
	if(mysqli_connect_errno())
	{
		die("Connection to Database failed:" .mysqli_connect_error()." (".mysqli_connect_errno().")");
	}
?>  
<html>
	<head>
		<title>Inventory Management System</title>
	</head>
	<body>
		<center>
		<form action="as_on_list.php" method="post">
						<br><br><label><b>From : </b></label><input type="date" name="fromdte" required>
						<label><b>To : </b></label><input type="date" name="todte" required>
						<input type="submit" value="View">
						<br><br>
						
					</form>
		</center>
		
		<a href="viewindent.php" style="color:blue; text-decoration:none;font-size: 18px; float: right;margin-right:20px;"><< <b>Back</b></a>

	</body>
</html>
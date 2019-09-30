<?php
	/*session_start();
	if(!isset($_SESSION['username']))
	{                             
		header("Location: ../index.php");
	}*/
	include 'admin_home.php';
	include 'serverconfig.php';
?>  
<html>
	<head>
		<title>Inventory Management System</title>
		
	</head>
	<body style="background-color:#ffff99;">
		<center>
				<div Style="font-size:18px; color:blue;"><b>Indent Report</b></div><br>
				<form action="utd_summary.php" name="myform" method="post">	
					<label class="required" ><b>Departments : </b></label>
					<select name="utd" required style="width:300;">
						<option  value="" disabled selected>Select</option>
						<?php
							$connection = mysqli_connect($servername, $username, $password, $dbname);
							if(mysqli_connect_errno())
							{
								die("Connection to Database failed:" .mysqli_connect_error()." (".mysqli_connect_errno().")");
							}
							$query="select username,name from login where type='utd'";
							$result=mysqli_query($connection,$query);
							while($row=mysqli_fetch_assoc($result))
							{
						?>
						<option value="<?php echo $row['name'];?>"><?php echo $row['name']; ?></option>
						<?php
							}
						?>
					</select><br><br>
					<label><b>From : </b></label><input type="date" name="fromdte" required>
					<label><b>To : </b></label><input type="date" name="todte" required>
					<br><br><br><input type="submit" value="View">
				</form>
		</center>
		<a href="viewindent.php" style="color:blue; text-decoration:none;font-size: 18px; float: right;margin-right:20px;"><< <b>Back</b></a>

	</body>
</html>
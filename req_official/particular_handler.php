<?php 
include("add.php");
?>
<?php
	//session_start();
	if(!isset($_SESSION['username']))
	{                             
	
	}
	include("serverconfig.php");
	
	$connection = mysqli_connect($servername, $username, $password, $dbname);
	
	if(mysqli_connect_errno())
	{
		die("Connection to Database failed:" .mysqli_connect_error()." (".mysqli_connect_errno().")");
	}
		
	$p=$_POST['par'];
	$t=$_POST['type'];
	$query="insert into stocklist(particular,type) values('$p','$t')";
	
	$result = mysqli_query($connection,$query);
?>
<html>
	<head>
		<title>Inventory Management System</title>
	<style>
	.flash
			{
				animation-name: flash;
	
				animation-duration: 0.2s;
    
				animation-timing-function: linear;
    
				animation-iteration-count: infinite;
    
				animation-direction: alternate;
    
				animation-play-state: running;
				
			}
			@keyframes flash 
			{
				from {color: red;} to {color: black;}
			}
		</style>
	</head>
	<body style="background-color:#ffff99;">
		<center>
		<div>
			<br>
			<?php 
				if(!$result)
				{
			?>
				<div class="flash" style="font-size:20px;padding-top:20px; min-height:100px; font-weight: bold;">
				Particular already present!</div>
			<?php	
				}
				else
				{	
			?>
			    <div class="flash" style="font-size:20px;padding-top:20px; min-height:100px; font-weight: bold;">
				Particular added successfully!</div>
			<?php
				}
			?><br><br>
			<a href="officialhome.php" style="color:blue; text-decoration:none;font-size: 18px; float: right;margin-right:20px;"><< <b>Back to Home</b></a>
		</div>
	</body>
</html>
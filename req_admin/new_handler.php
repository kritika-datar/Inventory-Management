<?php
	include 'admin_home.php';
	include("serverconfig.php");
	
	session_start();
	/*if(!isset($_SESSION['username']))
	{                             
		header("Location: login.php");   
	} */
	$connection = mysqli_connect($servername, $username, $password, $dbname);
	if(mysqli_connect_errno())
	{
		die("Connection to Database failed:" .mysqli_connect_error()." (".mysqli_connect_errno().")");
	}
	if(isset($_SESSION['id']))
	{  
		$_SESSION['id'];
	}
	$id=$_SESSION['id'];
	if(isset($_SESSION['utd']))
	{  
		$_SESSION['utd'];
	}
	$utd=$_SESSION['utd'];
	$date=date("Y-m-d");		
	if(isset($_POST['submit']))
	{
		$query="update masterims set status=2,approved_date='$date' where Indent_id='$id'";
		$result=mysqli_query($connection,$query);
		foreach($_POST['par'] as $row=>$par)
		{
			$particular=$par;
			$aq=$_POST['aq'][$row];
			$involve="update childims set admin_qty='$aq' where Particular='$particular' and Indent_id='$id'";
			$t=mysqli_query($connection,$involve);
		}
	}
	$execute="select * from childims inner join masterims on childims.Indent_id=masterims.Indent_id where masterims.Indent_id='$id'";
	$res = mysqli_query($connection,$execute);
	$number_of_rows = mysqli_num_rows($res);
	$e=mysqli_fetch_row(mysqli_query($connection,"select Date from masterims where Indent_id='$id'"));
	
?>
<html>
	<head>
		<title>Inventory Management System</title>
		<style>
		table 
			{
				table-layout:fixed;
			}
			td 
			{
				word-wrap:break-word;
			}
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
				from {color: red;}
				to {color: black;}
			}
		</style>
	</head>
	<body style="background-color:#ffff99;">
		<center>
				<div class="header" style="color:blue;"><h3>  <?php echo $utd;?> </h3></div>
				<div class="flash" style="font-size:20px;padding-top:20px;height:100px;">Submitted Successfully!!!</div>
				<?php 	 
					echo "<div align='center'>";
					echo "<table border='3' cellpadding='5' cellspacing='5' width='1130'>";
					echo "<tr><td colspan='6' align='right' bgcolor='white'><div><b><label>Date:</label>";
					echo "$date </b></div></td></tr>";
					echo "<tr><td colspan='6' bgcolor='white' align='right'><div><b><label>Indent-ID:</label>";
					echo "$id </b><br><b><label>Date of Entry:</label>";
					echo "$e[0] </b></div></td></tr>";
					echo "<tr><td bgcolor='#CCCCCC' align='center'><b>Particular(s)</b></td>";
					echo "<td bgcolor='#CCCCCC' align='center'><b>Quantity</b></td>";
					echo "<td bgcolor='#CCCCCC' align='center'><b>Previous Available Stock</b></td>";
					echo "<td bgcolor='#CCCCCC' align='center'><b>Last indent Date</b></td>";
					echo "<td bgcolor='#CCCCCC' align='center'><b>Remarks</b></td>";
					echo "<td bgcolor='#CCCCCC' align='center'><b>Approved Quantity</b></td></tr>";
					while($row = mysqli_fetch_array($res))
					{
						echo "<tr bgcolor='white'>";
						echo "<td align='center'>".$row['Particular']."</td>";
						echo "<td align='center'>".$row['Qty']."</td>";
						echo "<td align='center'>".$row['Prevstock']."</td>";
						echo "<td align='center'>".$row['Lastindentdate']."</td>";
						echo "<td align='center'>".$row['Remarks']."</td>";
						echo "<td align='center'>".$row['Approved']."</td>";
						echo "</tr>\n";
					}
					echo "</table>";
					mysqli_close($connection);
				?> <br>
				<center><input type="button" onclick="window.print()" value="Print"></center></div>
		</center>
		
	<a href="new_list.php" style="color:blue; text-decoration:none;font-size: 18px; float: right;margin-right:20px;"><< <b>Back</b></a>

	</body>
</html>
								 
								 
								 
<?php 	
	/*session_start();
	if(!isset($_SESSION['username']))
	{                             
		header("Location: login.php");   
	} */
	include ("add.php");
	include("serverconfig.php");
	$connection = mysqli_connect($servername, $username, $password, $dbname);
	if(mysqli_connect_errno())
	{
		die("Connection to Database failed:" .mysqli_connect_error()." (".mysqli_connect_errno().")");
	}
	$date=date("Y-m-d");
	if(isset($_POST['id']))
	{  
		$_SESSION['id']=$_POST['id'];
	}
	$id=$_SESSION['id'];
	if(isset($_POST['utd']))
	{  
		$_SESSION['utd']=$_POST['utd'];
	}
	$utd=$_SESSION['utd'];
	$e=mysqli_fetch_row(mysqli_query($connection,"select Date from masterims where Indent_id='$id'"));
	$query="select childims.Particular,childims.Qty,childims.Remarks,childims.Prevstock,childims.Lastindentdate,masterims.Date,masterims.Indent_id from childims inner join masterims on childims.Indent_id=masterims.Indent_id where masterims.Indent_id='$id'";
	$result = mysqli_query($connection,$query);
	$number_of_rows = mysqli_num_rows($result);
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
	tr:nth-child(even)
	{
		background-color: #ede8dd;
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
    
    <div style="color:blue; margin-bottom:10px; font-size:20px;padding-top: 10px;"> <b><?php echo strtoupper($utd);?></b><br/> </div>
	<br>
	<div>
		<?php  
			if($number_of_rows >0)
			{	 
					echo "<div >";
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
					while($row = mysqli_fetch_array($result))
					{
						echo "<tr bgcolor='white'>";
						echo "<td align='center'><form action='new_handler.php' method='post'><input type='text' readonly value='". $row['Particular']. "' name='par[]' size='15'></td>";
						echo "<td align='center'>".$row['Qty']."</td>";
						echo "<td align='center'>".$row['Prevstock']."</td>";
						echo "<td align='center'>".$row['Lastindentdate']."</td>";
						echo "<td align='center'>".$row['Remarks']."</td>";
						echo "<td align='center'><input type='text' name='aq[]' size='10'></td>";
						echo "</tr>\n";
					}
					echo "</table>";
					echo "<center><br><br><input type='submit' name='submit' value='Submit'></form>";
					echo "&nbsp; &nbsp; <input type='button' onclick='window.print()' value='Print'></center></div>";
			}
		?>
			
	</div>
	</center>
	<a href="new_list.php" style="color:blue; text-decoration:none;font-size: 18px; float: right;margin-right:20px;"><< <b>Back</b></a>
	</body>
</html>
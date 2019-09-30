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
	$utd= $_POST['utd'];
	$fdate=$_POST["fromdte"]; 
	$fd=date('d-m-Y',strtotime($fdate));
	$tdate=$_POST["todte"]; 
	$td=date('d-m-Y',strtotime($tdate));
    $query="select childims.Particular,childims.Qty,childims.Remarks,childims.Approved,childims.admin_qty,childims.Prevstock,childims.Lastindentdate,
				masterims.approved_date,masterims.Date,masterims.Indent_id from childims inner join masterims on childims.Indent_id=masterims.Indent_id 
					where name='$utd' AND (date BETWEEN '$fdate' AND '$tdate')";
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
			<div Style="font-size:18px; color:blue;"><b>Indent Report</b></div><br>
			<div style="color:blue; margin-bottom:10px; font-size:20px;padding-top: 10px;"> <b> <?php echo strtoupper($utd); ?></b><br/> </div>
			
			<?php  
				if($number_of_rows >0)
				{
					echo "<div align='center'>";
					$count=1;
					$rowcount=mysqli_num_rows($result);
					if($rowcount>0)
					{
						echo "<table border='3' cellpadding='5' cellspacing='5' width='1150'><tr>";
						echo "<td colspan='10' align='right' bgcolor='white'>";
						echo "<div><b><label>Date:</label>". $fd  ." to ". $td ."</b></div></td></tr>";
						echo "<tr><td bgcolor='#CCCCCC' align='center'><b>Indent ID</b></td>";
						echo "<td bgcolor='#CCCCCC' align='center'><b>Particular</b></td>";
						echo "<td bgcolor='#CCCCCC' align='center'><b>Quantity</b></td>";
						echo "<td bgcolor='#CCCCCC' align='center'><b>Previous Available Stock</b></td>";
						echo "<td bgcolor='#CCCCCC' align='center'><b>Last indent Date</b></td>";
						echo "<td bgcolor='#CCCCCC' align='center'><b>Remarks</b></td>";
						echo "<td bgcolor='#CCCCCC' align='center'><b>Indent Date</b></td>";
						echo "<td bgcolor='#CCCCCC' align='center'><b>SO Approved Quantity</b></td>";
						echo "<td bgcolor='#CCCCCC' align='center'><b>SO Approved Date</b></td>";
						echo "<td bgcolor='#CCCCCC' align='center'><b>Admin Approved Qunatity</b></td></tr>";
						while($row = mysqli_fetch_array($result))
						{
							echo "<tr bgcolor='white'>";
							echo "<td align='center'>".$row['Indent_id']."</td>";
							echo "<td align='center'>".$row['Particular']."</td>";
							echo "<td align='center'>".$row['Qty']."</td>";
							echo "<td align='center'>".$row['Prevstock']."</td>";
							echo "<td align='center'>".$row['Lastindentdate']."</td>";
							echo "<td align='center'>".$row['Remarks']."</td>";
							echo "<td align='center'>".$row['Date']."</td>";
							echo "<td align='center'>".$row['Approved']."</td>";
							echo "<td align='center'>".$row['approved_date']."</td>";
							echo "<td align='center'>".$row['admin_qty']."</td>";
							echo "</tr>\n";
						}
						echo "</table>";
					}
					echo "<center><br><br><input type='button' onclick='window.print()' value='Print'></center>";
					echo "</div>";
				}
				else
				{
			?>
					<div class="flash" style="font-size:20px;padding-top:20px; min-height:100px; font-weight: bold;">
			<?php 
						echo "No Indents Between $fd and $td!";
				}
			?>
					</div>
		</center>
		<a href="utd_listadmin.php" style="color:blue; text-decoration:none;font-size: 18px; float: right;margin-right:20px;"><< <b>Back</b></a>

	</body>
</html>
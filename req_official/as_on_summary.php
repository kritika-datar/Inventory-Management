<?php
	/*session_start();
	if(!isset($_SESSION['username']))
	{                             
		header("Location: login.php");   
	} */
	include 'add.php';
	include("serverconfig.php");
	$connection = mysqli_connect($servername, $username, $password, $dbname);
	if(mysqli_connect_errno())
	{
		die("Connection to Database failed:" .mysqli_connect_error()." (".mysqli_connect_errno().")");
	}
	$utd=$_POST['m'];
	$id=$_POST['id'];
	if(isset($_SESSION['fromdte']))
	{  
		$_SESSION['fromdte'];
	}	
	if(isset($_SESSION['todte']))
	{  
		$_SESSION['todte'];
	}
	$fdate= $_SESSION['fromdte'];
	$fd=date('d-m-Y',strtotime($fdate));
	$tdate=$_SESSION['todte'];
	$td=date('d-m-Y',strtotime($tdate));
    $query="select * from childims inner join masterims on childims.Indent_id=masterims.Indent_id 
					where ((masterims.name='$utd' AND (date BETWEEN '$fdate' AND '$tdate') and masterims.Indent_id='$id'))";
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
		</style>
	</head>
	<body style="background-color:#ffff99;">
		<center>
				<div Style="font-size:18px; color:blue;"><b>Indent Report</b></div><br>
				<div style="color:blue; margin-bottom:10px; font-size:20px;padding-top: 10px;"> <b> <?php echo strtoupper($utd); ?></b><br/> </div>
				
					<table border='5' cellpadding='5' cellspacing='5' width='1130'>
							<tr>
								<td colspan='9' align='right' bgcolor='white' >
									<div><b><label>Indent-ID:</label><?php echo "$id";?></b><br>
									<b><label >Date:</label><?php echo "$fd to $td";?></b></div>
								</td>
							</tr>
							<tr>
								<td bgcolor='#CCCCCC' align='center'><b>Particular</b></td>
								<td bgcolor='#CCCCCC' align='center'><b>Quantity Ordered</b></td>
								<td bgcolor='#CCCCCC' align='center'><b>Previous Available Stock</b></td>
								<td bgcolor='#CCCCCC' align='center'><b>Last Indent Date</b></td>
								<td bgcolor='#CCCCCC' align='center'><b>Remarks</b></td>
								<td bgcolor='#CCCCCC' align='center'><b>Indent Date</b></td>
								<td bgcolor='#CCCCCC' align='center'><b>SO Approved Quantity</b></td>
								<td bgcolor='#CCCCCC' align='center'><b>SO Approved Date</b></td>
								<td bgcolor='#CCCCCC' align='center'><b>Admin Approved Quantity</b></td>
							</tr>
							<?php				
								while($row = mysqli_fetch_array($result))
								{
									echo "<tr bgcolor='white'>";
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
							?>
					</table>
						<br><br><center><input type='button' onclick='window.print()' value='Print'></center>
						
				</div>
		</center>
		<a href="as_on_list.php" style="color:blue; text-decoration:none;font-size: 18px; float: right;margin-right:20px;"><< <b>Back</b></a>
		</body>
</html>
<?php
	/*session_start();
	if(!isset($_SESSION['username']))
	{                             
		header("Location: login.php");   
	}
	#ede8dd
							<table border='3' cellpadding='5' cellspacing='5' width='800'>
						<tr>
							<td colspan='2' align='right' bgcolor='#008080' style="color:white">
								<div><b><label></b></div>
							</td>
						</tr>
						<tr>
							<td bgcolor='white' colspan="2" align='center' style="color:black"><b></b></td>
						</tr>
							<!-- <tr>
										<th  bgcolor="#0000FF" style="color:white"></th>
									</tr> -->
tr:nth-child(odd){
		background-color: #008080;
		align:center;
} tr:nth-child(even){
		background-color: white;
		align:center;
}
	*/         
	include ("add.php");
	include("serverconfig.php");
	$connection = mysqli_connect($servername, $username, $password, $dbname);
	if(mysqli_connect_errno())
	{
		die("Connection to Database failed:" .mysqli_connect_error()." (".mysqli_connect_errno().")");
	}
	$dte=date("Y-m-d");
	$utd="select name,Indent_id from masterims where date='$dte'";
	$r= mysqli_query($connection,$utd);
	$number_of_rows=mysqli_num_rows($r);
?>
<html lang='en'>
	<head>
		<title>Inventory Management System</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body style="background-color:#ffff99;">
		<center>
		<div Style="font-size:18px; color:blue;"><b>Indent Report</b></div><br>
				
					<?php  
						if($number_of_rows >0)
						{
					?>
					    
					<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
						<tr>
							<td>
								<table width="300" border="4" cellpadding="5" cellspacing="5" bgcolor="#FFFFFF" align="center">
									<tr>
										<td colspan="2" align="right" bgcolor="white">
											<div style="color:black;"><b>Date:<?php echo $dte; ?></b></div>
										</td>
									</tr>
																	
					<?php
										while($f=mysqli_fetch_row($r))
										{						
											//<!---------------php loop ------------------- -->
					?>						<tr>
												<td align="center" bgcolor="#CCCCCC">
													<form action="today_summary.php" method="post">
														<br><input type="text" readonly value="<?php echo $f[0];?>" name="m"  size="50">
												</td>
												<td style="display:none">
													<input type="hidden" readonly value="<?php echo $f[1]; ?>" name="id">
												</td>
												<td align="center" bgcolor="#CCCCCC">
													<input type="submit" value="View"/>
													</form>
												</td>
											</tr>
					<?php
										}
					?>
									
								</table>
							</table>
							
					<?php	
						}
						else
						{
							echo "<div class='flash' style='font-size:20px;padding-top:20px; min-height:100px; font-weight: bold;'>There are no Indent forms for Date: ".$dte."</div>";
						} 
					?>
				
		</center>
		 <a href="viewindent.php" style="color:blue; text-decoration:none;font-size: 18px; float: right;margin-right:20px;"><< <b>Back</b></a>
	</body>
</html>
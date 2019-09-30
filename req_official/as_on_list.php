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
	if(isset($_POST['fromdte']))
	{  
		$_SESSION['fromdte']=$_POST['fromdte'];
	}	
	if(isset($_POST['todte']))
	{  
		$_SESSION['todte']=$_POST['todte'];
	}
	$fdate= $_SESSION['fromdte'];
	$fd=date('d-m-Y',strtotime($fdate));
	$tdate=$_SESSION['todte'];
	$td=date('d-m-Y',strtotime($tdate));
	$utd="select name,Indent_id from masterims where date between '$fdate' and '$tdate'";
	$r= mysqli_query($connection,$utd);
	$number_of_rows=mysqli_num_rows($r);
?>
<html>
	<head>
		<title>Inventory Management System</title>
	</head>
	<body style="background-color:#ffff99;">
		<center>
						<?php  
							if($number_of_rows >0)
							{
						?>
								<table border="5" cellpadding="4" cellspacing="5" width="500px">
								<tbody>
								<tr>
										<td colspan="2" align="right" bgcolor="white">
											<div style="color:black;"><b>Date: <?php echo $fd ." to ". $td; ?></b></div>
										</td>
									</tr>
								<tr>
						<?php

								while($f=mysqli_fetch_row($r))
								{						
									//<!---------------php loop ------------------- -->
									
						?>	
										<td align='center'>
											<form action="as_on_summary.php" method="post">
													<br><input type="text" readonly value="<?php echo $f[0];?>" name="m" size="50">
										</td>
										<td style="display:none">
											<input type="hidden" readonly value="<?php echo $f[1]; ?>" name="id">
										</td>
										<td align='center'>
											<input type="submit" value="View"/>
										</td>
											</form>
							</tr>
						<?php
									
								}
							}
							else
							{
	
						?>
								<div class="flash" style="font-size:20px;padding-top:20px; min-height:100px; font-weight: bold;">There are no Indent forms between Date: <?php echo "$fd to $td"; ?>
					
						<?php 
							} 
						?>
						</tbody>
					</table>
				</div>
			</center>
			<a href="viewindent.php" style="color:blue; text-decoration:none;font-size: 18px; float: right;margin-right:20px;"><< <b>Back</b></a>
	</body>
</html>
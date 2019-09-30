<?php
	session_start();
	if(!isset($_SESSION['username']))
	{                             
		header("Location: login.php");   
	}          
	include("admin_home.php");
	$connection = mysqli_connect($servername, $username, $password, $dbname);
	if(mysqli_connect_errno())
	{
		die("Connection to Database failed:" .mysqli_connect_error()." (".mysqli_connect_errno().")");
	}
	$sql="SELECT name,Indent_id FROM masterims WHERE status = 1";
	$result=mysqli_query($connection, $sql);
	$count=mysqli_num_rows($result);
	
	
?>
<body style="background-color:#ffff99;">
		<center>
		<div Style="font-size:18px; color:blue;"><b>Indent Report</b></div><br>
				
					<?php  
					if($count >0)
					{
						?>
					    
					<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
						<tr>
							<td>
								<table width="300" border="4" cellpadding="5" cellspacing="5" bgcolor="#FFFFFF" align="center">
																	
					<?php
										
		
		while($f=mysqli_fetch_row($result))
		{						
			//<!---------------php loop --------------------->
			/*$row=$f[1];
			$response = $response . "<div class='notification-item'>" .
									"<div class='notification-subject'><form action='new_summary.php' method='post'>
									<input type='text' readonly name='id' value='".$row."' hidden>
									<input type='text' name='utd' value='".$f[0]."' STYLE='color:black'>
									<input type='submit' name='submit' value='View' STYLE='color:black'></form></div>" . 
									"</div>";			
		}
		if(!empty($response)) 
		{
			print $response;
		}*/
	
											//<!---------------php loop ------------------- -->
					?>						<tr>
												<td align="center" bgcolor="#CCCCCC">
													<form action="new_summary.php" method="post">
														<br><input type="text" readonly value="<?php echo $f[0];?>" name="utd"  size="50">
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
							echo "<div class='flash' style='font-size:20px;padding-top:20px; min-height:100px; font-weight: bold;'>There are no new Indent forms.</div>";
						} 
					?>
				
		</center>
		<a href="viewindent.php" style="color:blue; text-decoration:none;font-size: 18px; float: right;margin-right:20px;"><< <b>Back</b></a>

	</body>
</html>
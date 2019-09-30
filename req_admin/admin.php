<html>

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
				from {color: red;} to {color: blue;}
			}
			
#out{
	position:relative;
	top:300px;
}		
#his{   position:fixed;
	 margin-left:700px; 
	 margin-top:20px;
}	
		</style>
<body>
<?php

include("serverconfig.php");
	$connection = mysqli_connect($servername, $username, $password, $dbname);
	if(mysqli_connect_errno())
	{
		die("Connection to Database failed:" .mysqli_connect_error()." (".mysqli_connect_errno().")");
	}
	$qry="select qty, cqty from stocklist";
	$result = mysqli_query($connection,$qry);
	while($row=mysqli_fetch_assoc($result))
    { $s=$row['qty']; $c=$row['cqty'];}
	if($s<=$c)
    { ?>
		<div id="out" ><marquee direction="right" scrollamount="3" behaviour="slide"><a href="out.php" Style="font-size:20px;color:red; text-decoration:none;" class="flash"  ><b>Items Running Out Of Stock !</b></a></marquee></div>
	<?php	
	}
  ?>
  
  <center>
  <br>
 <div >
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" >
<tr>
<td>
<table width="300" border="4" cellpadding="5" cellspacing="5" bgcolor="#FFFFFF">

<tr>
					<td colspan="2" align="center">
						<div style="color:blue;"><b><u>TASKS</u></b></div>
					</td>
				</tr>
				
				<tr><td><b>1.</b></td>
<td bgcolor="#CCCCCC">
<div style="font-size:17px;"><strong><a href="viewindent.php" style="text-decoration:none">View Indent Forms</a></strong></div>
</td>
</tr>

<tr><td><b>2.</b></td>
<td>
<div style="font-size:17px;"><strong><a href="stock_reg.php" style="text-decoration:none">Stock/Deadstock Register</a></strong></div>
</td>
</tr>
<tr>
<td><b>3.</b></td>
<td bgcolor="#CCCCCC">
<div style="font-size:17px;"><strong><a href="viewstock.php" style="text-decoration:none">View Stock Register</a></strong></div>
</td>
</tr>
<tr>
<td><b>4.</b></td>
<td>
<div style="font-size:17px;"><strong><a href="Viewupdate.php" style="text-decoration:none">View Stock Balance</a></strong></div>
</td>
</tr>
<tr><td ><b>5.</b></td>
<td bgcolor="#CCCCCC">
<div style="font-size:17px;"><strong><a href="viewdeadstock.php"  style="text-decoration:none">View Dead Stock Register</a></strong></div>
</td>
</tr>
<tr>
<td ><b>6.</b></td>
<td>
<div style="font-size:17px;"><strong><a href="viewupdate2.php" style="text-decoration:none">View Deadstock Balance</a></strong></div>
</td>
</tr>
<tr><td><b>7.</b></td>
<td bgcolor="#CCCCCC">
<div style="font-size:17px;"><strong><a href="add_particular.php" style="text-decoration:none">Add Particular</a></strong></div>
</td>
</tr>
<tr><td><b>8.</b></td>
<td>
<div style="font-size:17px;"><strong><a href="critical.php" style="text-decoration:none">Add Critical Quantity</a></strong></div>
</td>
</tr>


</table>
</td>
</tr>
</table>
</div>
<br><br>
<input type="submit" name="logout" value="Logout" onClick="location.href='logout.php'">
 </div>

</center>
</body>
</html>
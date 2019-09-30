<?php
include'add.php';
include'indent_option.php';
?>
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
						<div style="color:blue; font-size:20px;"><b>View Indent Forms</b></div>
					</td>
				</tr>
				
				

<tr><td><b>2.</b></td>
<td>
<div style="font-size:17px;"><strong><a href="new_list.php" style="text-decoration:none">New Indents (<?php if($new>0) { echo $new; } ?>)</a></strong></div>
</td>
</tr>
<tr>
<td><b>3.</b></td>
<td bgcolor="#CCCCCC">
<div style="font-size:17px;"><strong><a href="pending_list.php" style="text-decoration:none">Pending Indents (<?php if($pen>0) { echo $pen; } ?>)</a></strong></div>
</td>
</tr>
<tr>
<td><b>4.</b></td>
<td>
<div style="font-size:17px;"><strong><a href="approved_list.php" style="text-decoration:none">Approved Indents (<?php if($app>0){echo $app;}?>)</a></strong></div>
</td>
</tr>
<tr><td ><b>5.</b></td>
<td bgcolor="#CCCCCC">
<div style="font-size:17px;"><strong><a href="today_list.php"  style="text-decoration:none">Today's Indents</a></strong></div>
</td>
</tr>
<tr>
<td ><b>6.</b></td>
<td>
<div style="font-size:17px;"><strong><a href="utd_listadmin.php" style="text-decoration:none">DepartmentWise Indents</a></strong></div>
</td>
</tr>
<tr><td><b>7.</b></td>
<td bgcolor="#CCCCCC">
<div style="font-size:17px;"><strong><a href="date.php" style="text-decoration:none">Date wise Indents</a></strong></div>
</td>
</tr>
</table>
</td>
</tr>
</table>
</div>
<br><br>
 </div>

</center>
<a href="officialhome.php" style="color:blue; text-decoration:none;font-size: 18px; float: right;margin-right:20px;"><< <b>Back</b></a>
</body>
</html>
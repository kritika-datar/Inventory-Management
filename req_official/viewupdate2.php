<?php 
include("add.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Inventory Management System</title>
<style>

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
				from {color: red;} to {color: black;}
			}
			</style>
</head>
<body style="background-color:#ffff99;">
<center>
 <br>
   <?php
	  
include("serverconfig.php");
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn)
	die("Could not connect");
mysqli_select_db($conn,"IMS");
$result = mysqli_query($conn,"SELECT particular,qty FROM stocklist where type='deadstock' order by particular");
if (!$result)
die("Could not retreive data" . mysql_error());
 $rowcount=mysqli_num_rows($result);
 if($rowcount>0)
 {?>
  <div Style="font-size:20px; color:blue;"><b> Deadstock Balance Report</b></div><br>
	 <?php
echo "<table border='3'cellpadding='5' cellspacing='5' width='500px'><tr >";
echo "</tr>";
echo "<tr><td  bgcolor='#CCCCCC' align='center'><b>Particular(s)</b></td><td  bgcolor='#CCCCCC' align='center'><b>Balance</b></td><td></td></tr>";
while($row = mysqli_fetch_array($result) )
{
echo "<tr bgcolor='white'>";
echo "<td><form method='post' action='view_handler1.php'><input type='text' Size='65' value='".$row['particular']."' name='particular' readonly></td>";
 echo "<td  align='center'>".$row['qty']."</td>";
echo "<td><input type='submit' value='View Details' name='submit'></form></td>";

echo "</tr>\n";

}
echo "</table>";
 }

mysqli_free_result($result);

?><br>
</center>
<a href="officialhome.php" style="color:blue; text-decoration:none;font-size: 18px; float: right;margin-right:20px;"><< <b>Back to Home</b></a>
</body>
</html>

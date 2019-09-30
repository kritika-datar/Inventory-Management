<?php 
include("add.php");
?>
<html>
<head><title>Inventory Management System</title></head>
<body style="background-color:#ffff99;" link="purple" vlink="purple" alink="purple">
<center>
<br>
<?php
	  
include("serverconfig.php");
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn)
	die("Could not connect");
mysqli_select_db($conn,"IMS");
$q="select particular, qty from stocklist where qty<=cqty order by particular";
$res=mysqli_query($conn,$q);

	?>
  <div Style="font-size:20px; color:blue;"><b>Items out of Stock</b></div><br>
	 <?php
echo "<table border='3'cellpadding='5' cellspacing='5'width='500'>";
echo "<tr><td  bgcolor='#CCCCCC' align='center'><b>Select</b></td><td  bgcolor='#CCCCCC' align='center'><b>Particular(s)</b></td><td  bgcolor='#CCCCCC' align='center'><b> Balance</b></td></tr>";
while($row = mysqli_fetch_array($res) )
{
echo "<tr bgcolor='white'>";
echo "<td><form method='post' action='notesheet.php'><input type='checkbox' name='part[]' value='".$row['particular']."'></td>";
echo "<td>".$row['particular']."</td>";
echo "<td align='center'>".$row['qty']."</td>";
echo "</tr>\n";

}
echo "</table><br>";
echo "<center><input type='submit' name='Submit'></form></center>";
mysqli_free_result($res);

?>
<a href="officialhome.php" style="color:blue; text-decoration:none;font-size: 18px; float: right;margin-right:20px;"><< <b>Back to home</b></a>
</body>
</html>
<?php 
include("add.php");
?>
<!DOCTYPE html>
<html>
<head >
<style type="text/css">tr:nth-child(odd){background-color:white;}
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
.required:after{content:'*'; color:#EF5F5F; }
</style>
<title>Inventory Management System</title>
</head>
<body style="background-color:#ffff99;">
<center>
<div>
  <br>
  
   <?php
 //session_start();
	if(isset($_POST['particular']))
	{
		$_SESSION['particular']=$_POST['particular'];
	}
	$par=$_SESSION['particular'];
include("serverconfig.php");
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn)
	die("Could not connect");
mysqli_select_db($conn,"IMS");

$m="select qty from stocklist where particular='$par'";
$z=mysqli_query($conn,$m);
while($row=mysqli_fetch_assoc($z))
{ $y=$row['qty'];}

$qt="update storeitem set totalqty='$y' where particular='$par'";
$ru=mysqli_query($conn,$qt);

$pt="select Max(pid) from storeitem where Particular='$par'";
$pd=mysqli_query($conn,$pt);
while($row=mysqli_fetch_assoc($pd))
{ $k=$row['Max(pid)'];}

$q="select date,billno,totalqty,rate,amount,firm from storeitem where (particular='$par' and pid='$k')";
$r=mysqli_query($conn,$q);
if (!$r)
die("Could not retreive data" . mysql_error());
if($y==0)
{ ?> 
<div class="flash" style="font-size:20px;padding-top:20px; min-height:100px; font-weight: bold;">
<?php echo "Particular not Purchased yet !"; }
else {
?>
   <div Style="font-size:20px; color:blue;"><b>Purchase Details of <?php echo $par; ?> </b></div> <br>
 
<?php
 
echo "<table  height='70px' border='3' cellpadding='8' cellspacing='8'>";
echo "<tr ><td bgcolor='#CCCCCC' align='center'><b>Bill No.</b></td><td bgcolor='#CCCCCC'  align='center'><b>Total Quantity</b></td>
<td bgcolor='#CCCCCC'  align='center'><b>Rate</b></td><td bgcolor='#CCCCCC'  align='center'><b>Amount</b></td><td bgcolor='#CCCCCC'  align='center'><b>Firm</b></td><td bgcolor='#CCCCCC'  align='center'><b>Date of purchase</b></td></tr>";
while($row = mysqli_fetch_array($r) )
{
echo "<tr bgcolor='white'>";
echo "<td  align='center'>".$row['billno']."</td>";
echo "<td align='center'>".$row['totalqty']."</td>";
echo "<td align='center'>".$row['rate']."</td>";
echo "<td>".$row['amount']."</td>";
echo "<td>".$row['firm']."</td>";
echo "<td align='center'>".date('d-m-Y',strtotime($row['date']))."</td>";

echo "</tr>\n";
}
echo "</table>";
?>
<br>
 <div Style="font-size:20px; color:blue;"><b>Enter Issue Details</b></div> <br>
<div >
<form  method="post" action="stock_handler.php">
<table width="300" height="150" border="1" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" >
<tr>
<td>
<table  width="500" height="100%" border="3" cellpadding="6" cellspacing="6" bgcolor="#FFFFFF">
   <tr>
<td>
<label class="required"><b>Issued Quantity</b></label></td><td><input type="number" name="issued" id="issued" min='0' max='4294967295' required>
</td>
</tr>
<tr bgcolor="#ede8dd">
<td>
<label class="required"><b>Date of issue</b></label></td><td><input type="date" name="date" value="2018/1/01" required>

</td>
</tr>
<tr>
<td>
<label class="required" ><b>Issuing Department</b></label></td>
 <td> <select name="dept" required  style="width:300;"> 
  <option  value=""disabled selected>Select</option>
  <?php
  $dp="select name from login";
	$rs=mysqli_query($conn,$dp);
   while($rse=mysqli_fetch_row($rs))
   { echo "<option value='$rse[0]'>$rse[0]</option>";}
  ?>
  </select>
</td>
</tr>
<tr>
<td>
<label><b>Remarks</b></label></td><td> <input type="text" name="rem" id="rem" placeholder="(if any)">
</td>
</tr>

</table>
</td>
</tr>
</table>
<br>
</div>
<input type="submit" name="submit" value="Submit" size="100%"></form>
<?php } ?>
<br><br><br>
<a href="stock_reg.php" style="color:blue; text-decoration:none;font-size: 18px; float: right;margin-right:20px;"><< <b>Back</b></a>
</div>


</center>
</body>
</html>
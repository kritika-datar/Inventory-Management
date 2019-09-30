<?php 
include("add.php");
?>
<?php
	//session_start();
	
   
	
	include("serverconfig.php");
	$connection = mysqli_connect($servername, $username, $password, $dbname);
	if(mysqli_connect_errno())
	{
		die("Connection to Database failed:" .mysqli_connect_error()." (".mysqli_connect_errno().")");
	}
		
	$fdate=$_POST["fromdte"]; $fd=date('d-m-Y',strtotime($fdate));
	$tdate=$_POST["todte"]; $td=date('d-m-Y',strtotime($tdate));
	$rn=$_POST["utd"];
	$qry="select name from login where (username = '$rn' and type='utd')";
	$result = mysqli_query($connection,$qry);
	while($row=mysqli_fetch_assoc($result))
    { $s=$row['name'];}
	$query="SELECT  st.particular, st.bill, st.open, st.iqty, st.bal, st.d_o_i, st.utd, st.remarks, storeitem.date, storeitem.rate, storeitem.amount, storeitem.firm from st INNER JOIN storeitem on st.pid=storeitem.pid where (st.d_o_i BETWEEN '$fdate' AND '$tdate') AND (st.utd='$s') AND (st.type='stock') order by particular";
	$rt = mysqli_query($connection,$query);
	if (!$rt)
die("Could not retreive data" . mysql_error());
 
?>  

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
 <div Style="font-size:20px; color:blue;"><b><?php echo $s; ?></b></div><br>
				<?php
	$rowcount=mysqli_num_rows($rt);
 if($rowcount>0)
 {?>
  <div Style="font-size:20px; color:maroon;"><b>Issue Report: <?php echo $fd  ." to ". $td ; ?></b></div><br>
 
  
	 <?php
	 
echo "<table height='80px' border='3'cellpadding='4' cellspacing='4'><tr align='center'>";

echo "</tr>";
echo "<tr ><td bgcolor='#CCCCCC' align='center'><b>Particular</b></td>
<td bgcolor='#CCCCCC' align='center'><b>Bill Number</b></td>
<td bgcolor='#CCCCCC' align='center'><b>Rate</b></td>
<td bgcolor='#CCCCCC' align='center'><b>Amount</b></td>
<td bgcolor='#CCCCCC'  align='center'><b>Firm</b></td>
<td bgcolor='#CCCCCC'  align='center'><b>Date of Purchase</b></td>
<td bgcolor='#CCCCCC'  align='center'><b>Opening Balance</b></td>
<td bgcolor='#CCCCCC'  align='center'><b>Issued Quantity</b></td>
<td bgcolor='#CCCCCC'  align='center'><b>Balance</b></td>
<td bgcolor='#CCCCCC'  align='center'><b>Remarks</b></td></tr>";
while($row = mysqli_fetch_array($rt) )
{
echo "<tr bgcolor='white'>";

echo "<td  align='center'>".$row['particular']."</td>";
echo "<td  align='center'>".$row['bill']."</td>";
echo "<td  align='center'>".$row['rate']."</td>";
echo "<td  align='center'>".$row['amount']."</td>";
echo "<td  align='center'>".$row['firm']."</td>";
echo "<td align='center'>".date('d-m-Y',strtotime($row['date']))."</td>";
echo "<td  align='center'>".$row['open']."</td>";
echo "<td align='center'>".$row['iqty']."</td>";
echo "<td align='center'>".$row['bal']."</td>";
echo "<td>".$row['remarks']."</td>";
echo "</tr>\n";

}
echo "</table>";
 }
else
{?>
</div>
<div class="flash" style="font-size:20px;padding-top:20px; min-height:100px; font-weight: bold;">
	<?php echo "No Particulars Issued between ".$fd." and ".$td;
}
mysqli_free_result($rt);

?><br><br><br><br>

	
		</center>
		<a href="department.php" style="color:blue; text-decoration:none;font-size: 18px; float: right;margin-right:20px;"><< <b>Back</b></a>
	</body>
</html>
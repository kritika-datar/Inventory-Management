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
$dte=$_POST["date"]; $nd=date('d-m-Y',strtotime($dte));
$result = mysqli_query($conn,"SELECT  st.particular, st.bill, st.open, st.iqty, st.bal, st.d_o_i, st.utd, st.remarks, storeitem.date, storeitem.rate, storeitem.amount, storeitem.firm from st INNER JOIN storeitem on st.pid=storeitem.pid where (st.d_o_i='$dte' and st.type='deadstock') order by particular");
if (!$result)
die("Could not retreive data" . mysql_error());
 $rowcount=mysqli_num_rows($result);
 if($rowcount>0)
 {?>
  <div Style="font-size:20px; color:blue;"><b>Date Wise Accounting Report</b></div><br>
  
	 <?php
echo "<table height='50px' border='3'cellpadding='4' cellspacing='4'><tr >";
echo "<td colspan='11' align='right' bgcolor='white' ><b><label >Date of Issue: </label>"  .$nd. "</b></td>";
echo "</tr>";

echo "<tr ><td bgcolor='#CCCCCC' align='center'><b>Bill Number</b></td>
<td bgcolor='#CCCCCC'  align='center'><b>Date of Purchase</b></td>
<td bgcolor='#CCCCCC'  align='center'><b>Firm</b></td>
<td bgcolor='#CCCCCC' align='center'><b>Particular</b></td>
<td bgcolor='#CCCCCC' align='center'><b>Rate</b></td>
<td bgcolor='#CCCCCC' align='center'><b>Amount</b></td>
<td bgcolor='#CCCCCC'  align='center'><b>Opening Balance</b></td>
<td bgcolor='#CCCCCC'  align='center'><b>Issued Quantity</b></td>
<td bgcolor='#CCCCCC'  align='center'><b>Balance</b></td>
<td bgcolor='#CCCCCC'  align='center'><b>Issuing Department</b></td>
<td bgcolor='#CCCCCC'  align='center'><b>Remarks</b></td></tr>";
while($row = mysqli_fetch_array($result) )
{
echo "<tr bgcolor='white'>";

echo "<td  align='center'>".$row['bill']."</td>";
echo "<td align='center'>".date('d-m-Y',strtotime($row['date']))."</td>";
echo "<td  align='center'>".$row['firm']."</td>";
echo "<td  align='center'>".$row['particular']."</td>";
echo "<td  align='center'>".$row['rate']."</td>";
echo "<td  align='center'>".$row['amount']."</td>";
echo "<td  align='center'>".$row['open']."</td>";
echo "<td align='center'>".$row['iqty']."</td>";
echo "<td align='center'>".$row['bal']."</td>";
echo "<td>".$row['utd']."</td>";
echo "<td>".$row['remarks']."</td>";
echo "</tr>\n";

}
echo "</table>";
 }
else
{?>
</div>
<div class="flash" style="font-size:20px;padding-top:20px; min-height:100px; font-weight: bold;">
	<?php echo "No Particulars Issued on " .$nd;
}
mysqli_free_result($result);

?><br>
</center>
<a href="viewdeadstock.php" style="color:blue; text-decoration:none;font-size: 18px; float: right;margin-right:20px;"><< <b>Back</b></a>
</body>
</html>

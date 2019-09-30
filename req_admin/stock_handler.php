<?php 
include("admin_home.php");
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
<div>
   <?php
   //session_start();
	if(isset($_SESSION['particular']))
	{
		$_SESSION['particular'];
	}
	  	$par=$_SESSION['particular']; 
	  
include("serverconfig.php");
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn)
	die("Could not connect");
mysqli_select_db($conn,"IMS");

$iq=$_POST["issued"];
$dte=$_POST["date"];
$re=$_POST["rem"];
$dpt=$_POST["dept"];

$pt="select Max(pid) from storeitem where Particular='$par'";
$pd=mysqli_query($conn,$pt);
while($row=mysqli_fetch_assoc($pd))
{ $k=$row['Max(pid)'];}

$q="select qty from stocklist where particular='$par'";
$r=mysqli_query($conn,$q);
while($row=mysqli_fetch_assoc($r))
{ $s=$row['qty'];}

$g="select type from stocklist where Particular='$par'";
$x=mysqli_query($conn,$g);
while($row=mysqli_fetch_assoc($x))
{ $n=$row['type'];}

$h="select billno from storeitem where(Particular='$par' and pid='$k')";
$bill=mysqli_query($conn,$h);
while($row=mysqli_fetch_assoc($bill))
{ $l=$row['billno'];}

if($iq>$s)
{?>
<div class="flash" style="font-size:20px;padding-top:20px; min-height:100px; font-weight: bold;">
	<?php echo "Item out of stock."; }
else {
	$ob=$s;
	$b=$s-$iq; 
$query="Insert into st(pid,bill,particular,open,iqty,bal,d_o_i,utd,remarks,type)values('$k','$l','$par','$ob','$iq','$b','$dte','$dpt','$re','$n')";
$result=mysqli_query($conn,$query);
$qt="update stocklist set qty='$b' where particular='$par'";
$ru=mysqli_query($conn,$qt);
$er=mysqli_error($conn);
echo $er;
if(!$result)
	die("Could not enter data.");
else
	?>
    <div class="flash" style="font-size:20px;padding-top:20px; min-height:100px; font-weight: bold;">
	<?php echo "Submitted Successfully !";
}

mysqli_close($conn);
?>
<br><br><br><br><br><br>
<a href="stock.php" style="color:blue; text-decoration:none;font-size: 18px; float: right;margin-right:20px;"><< <b>Back</b></a>
</center>
</body>
</html>

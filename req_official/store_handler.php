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
<div>
<br>

<?php
	  
include("serverconfig.php");
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn)
	die("Could not connect");
mysqli_select_db($conn,"IMS");
$billn=$_POST["Bill"];
$par=$_POST["particular"];
$date=$_POST["date"];
$qty=$_POST["qtity"];
$rate=$_POST["Rate"];
$firm=$_POST["firm"];
$dt=date('Y-m-d');
$amt=$_POST["amt"];

$x="select type from stocklist where Particular='$par'";
$y=mysqli_query($conn,$x);
while($row=mysqli_fetch_assoc($y))
{ $l=$row['type'];}

$query="Insert into storeitem(Particular,date,billno,qtty,rate,amount,firm,ondate,type)values('$par','$date','$billn','$qty','$rate','$amt','$firm','$dt','$l')";
$result=mysqli_query($conn,$query);
$q="select qty from stocklist where particular='$par'";
$res=mysqli_query($conn,$q);
while($row=mysqli_fetch_assoc($res))
{ $s=$row['qty'];}
$qty=$s+$qty;
$qu="update stocklist set qty='$qty' where particular='$par'";
$r=mysqli_query($conn,$qu);

$pt="select Max(pid) from storeitem where Particular='$par'";
$pd=mysqli_query($conn,$pt);
while($row=mysqli_fetch_assoc($pd))
{ $k=$row['Max(pid)'];}

$qwerty="Insert into st(pid,bill,particular,open,bal,type)values('$k','$billn','$par','$qty','$qty','$l')";
$copy=mysqli_query($conn,$qwerty);
$er=mysqli_error($conn);
echo $er;

if(!$result)
	die("Could not enter data.");
else
	?>
<div class="flash" style="font-size:20px;padding-top:20px; min-height:100px; font-weight: bold;">
	<?php
	echo "Submitted Successfully !";
mysqli_close($conn);
?></div><br>
 <input type="button" name="b2" value="Back" onClick="location.href='store.php'"> 
</center>
</body>
</html>

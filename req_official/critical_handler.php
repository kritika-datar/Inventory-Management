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
$par=$_POST["particular"];
$qty=$_POST["qtity"];

$qu="update stocklist set cqty='$qty' where particular='$par'";
$r=mysqli_query($conn,$qu);


$er=mysqli_error($conn);
echo $er;
if(!$r)
	die("Could not enter data.");
else
	?>
<div class="flash" style="font-size:20px;padding-top:20px; min-height:100px; font-weight: bold;">
	<?php
	echo "Submitted Successfully !";
	
mysqli_close($conn);
?></div><br><br>
 <input type="button" name="b2" value="Back" onClick="location.href='critical.php'"> 
</center>
</body>
</html>

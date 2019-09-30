<?php
	//include'add.php';
	include("serverconfig.php");
?>
<html>
	<head>
		<title>Inventory Management System</title>
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
			#out
			{
					position:relative;
					top:10px;
			}		
			#his
			{
					position:fixed;
					margin-left:700px; 
					margin-top:20px;
			}	
		</style>
	</head>
	<body style="background-color:#ffff99;" link="purple" vlink="purple" alink="purple">
		<center>   
			<div Style="font-size:35px; margin-top:50px;"><b>Devi Ahilya Vishwavidyalaya</b></div>
			<div Style="font-size:20px; margin-top:10px; color:black; margin-bottom:10px;"><b><?php echo date("Y"); ?>&nbsp;-&nbsp;<?php echo date("y")+1;?></b></div>
		</center>
	</body>
</html>
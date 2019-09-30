<?php 

	session_start();
		if(!isset($_SESSION['username'])){                             
		header("Location: index.php");   }  
        include("add.php");		
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
			
#out{
	position:relative;
	top:300px;
}		
#his{   position:fixed;
	 margin-left:700px; 
	 margin-top:20px;
}	
		</style>

</head>                                                                

<body style="background-color:#ffff99;">                               
<center>                                                               
   
   <span class="header"><h3> <?php echo strtoupper($_SESSION['name']);?>  </h3></span>
    <br>                                

  
  <center>
  <br>
 <div >
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" >
<tr>
<td>
<table width="300" border="4" cellpadding="5" cellspacing="5" bgcolor="#FFFFFF">

<tr>
					<td colspan="2" align="center">
						<div style="color:blue;"><b><u>TASKS</u></b></div>
					</td>
				</tr>
				
				<tr><td><b>1.</b></td>
<td bgcolor="#CCCCCC">
<div style="font-size:17px;"><strong><a href="indentform1.php" style="text-decoration:none">Add Indent</a></strong></div>
</td>
</tr>

<tr><td><b>2.</b></td>
<td>
<div style="font-size:17px;"><strong><a href="utdindentsummary.php" style="text-decoration:none">View Indent</a></strong></div>
</td>
</tr>
</table>
</td>
</tr>
</table>
</div>
<br><br>
<input type="submit" name="logout" value="Logout" onClick="location.href='logout.php'">
 </div>

</center>
</body>
</html>                            
                                                                       
</div>                                                                 
</center>                                                              
</body>                                                                
</html>                                                                
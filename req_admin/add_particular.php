<?php 
include("admin_home.php");
?>
<?php 
	//session_start();
	if(!isset($_SESSION['username']))
	{                             
	
	}
?>
<html>
	<head>
		<title>Inventory Management System</title>
	</head>
	<body style="background-color:#ffff99;">
		<center>
		<div>
			<br>
			 <div style="font-size:20px ; color:blue;"><b>Add Particular(s)</b></div> <br>
			
							<form method="post" action="particular_handler.php">
						<table border='0'>
                          <tr>						
						<td><label><strong>Particular : </strong></label></td>
					    <td> <input type="text" name="par" id="par"  size="40" required></td></tr>
						<tr> <td><label><strong>Type : </strong></label></td>
	                     <td><select name="type"  required > 
                        <option  value="" disabled selected>Select</option>
						<option value="stock">Stock</option>
						<option value="deadstock">Deadstock</option>
						  </select></td></tr></table>
							<br><br>
			<div style="font-size:17px;" div align="center"><strong><input type="submit" name="add" value="Add" "></strong></div>
				</form>		<br><br><br>
			<a href="home.php" style="color:blue; text-decoration:none;font-size: 18px; float: right;margin-right:20px;"><< <b>Back to Home</b></a>
		</div>
		
		</center>
	</body>
</html>
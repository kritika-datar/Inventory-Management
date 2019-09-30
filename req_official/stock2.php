<?php 
include("add.php");
?>
<!DOCTYPE html>
<html>
<head >
<style type="text/css">tr:nth-child(odd){background-color:white;}

.required:after{content:'*'; color:#EF5F5F; }
</style>
<title>Inventory Management System</title>
</head>
<body style="background-color:#ffff99;">
<center>
<div>
  <br>
  <div style="color:blue;font-size:20px"><b>Stock/Deadstock Register</b></div> 
  <br><br><br>
<div >

<form method="post" name="input" action="stock.php">
<label ><b>Particular : </b></label></td>
<select name="particular" required  style="width:300;"> 
  <option  value=""disabled selected>Select</option>
  <?php 
 	  
include("serverconfig.php");
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn)
	die("Could not connect");
mysqli_select_db($conn,"IMS");
    $sql="select particular from stocklist";
	$res=mysqli_query($conn,$sql);
   while($r=mysqli_fetch_row($res))
   { echo "<option value='$r[0]'>$r[0]</option>";}

?>
   </select>
<br><br>
</div>
<input type="submit" name="submit" value="Submit" size="100%"></form>
<br><br><br><br><br><br><br>
<a href="officialhome.php" style="color:blue; text-decoration:none;font-size: 18px; float: right;margin-right:20px;"><< <b>Back</b></a>
</div>


</center>
</body>
</html>
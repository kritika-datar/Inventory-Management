<!DOCTYPE html>
<html>
<?php 
include("add.php");
?>
<head>
<title>Inventory Management System</title>
</head>
<body style="background-color:#ffff99;">
<center>
<div>
   <br>
 <form method="post" name="input" action="view_handler1.php">
<label>Particular</label></td>
 <td> <select name="particular" placeholder="Select" required> 
 <option value=""disabled selected>Select</option>
 
  <?php 
 	  
include("serverconfig.php");
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn)
	die("Could not connect");
mysqli_select_db($conn,"IMS");
    $sql="select particular from stocklist where type='stock'";
	$res=mysqli_query($conn,$sql);
   while($r=mysqli_fetch_row($res))
   { echo "<option value='$r[0]'>$r[0]</option>";}

?>
   </select>
  <input type="submit" name="submit" value="View" size="100%">
</form><br><br><br><br><br><br><br><br>
<a href="viewstock.php" style="color:blue; text-decoration:none;font-size: 18px; float: right;margin-right:20px;"><< <b>Back</b></a>
</center>

</body>
</html>

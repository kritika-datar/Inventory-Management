<?php 
include("add.php");
?>
<html>
<head>
<style>
tr:nth-child(odd)
{
  background-color:white;
}
.required:after{content:'*'; color:#EF5F5F; }
</style>
<title>Inventory Management System</title>
</head>
<body style="background-color:#ffff99;">
<center>
<div>
   
 <br>
    <div Style="font-size:20px; color:blue;"><b>Enter Critical Quantity</b></div> <br>
 <div >
<table width="300" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC" >
<tr>
<form name="Store Items" method="post" action="critical_handler.php">

<table width="500" border="4" cellpadding="6" cellspacing="7" bgcolor="#ffffff">


<tr>
<td>
<label class="required"><b>Particular</b></label></td>
<td><select name="particular" required="required" >
     <option value=""disabled selected >Select</option>
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
   </select><br> <br> 
</td>
</tr>
<tr bgcolor="#ede8dd">
<td>
<label  class="required"><b>Critical Quantity</b></label></td><td><input  type="number"  name="qtity"  min='0' max='4294967295' required >  
</td>
</tr>
</tr>
</table>
</tr>
</table>
<br> <br>
<input type="submit" name="submit" value="Update">   

</form>
<br><br><br><br>

</div>
<br> <br>
</center>
<a href="officialhome.php" style="color:blue; text-decoration:none;font-size: 18px; float: right;margin-right:20px;"><< <b>Back to home</b></a>
</body>
</html>
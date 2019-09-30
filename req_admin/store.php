<?php 
include("admin_home.php");
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
<div><br>
    <div Style="font-size:20px; color:blue;"><b>Enter Purchase Details</b></div> <br>
 <div >
<table width="300" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC" >
<tr>
<form name="Store Items" method="post" action="store_handler.php">

<table width="500" border="4" cellpadding="6" cellspacing="7" bgcolor="#ffffff">
<tr><td colspan="2" align="right"><div><b><label >Date of Entry : </label><?php echo date('d-m-Y');?></b></div></td></tr>
<tr bgcolor="#ede8dd">
<td width="100">
<label class="required"><b>Bill Number</b></label></td> 
<td><input type="text" name="Bill" required="required"> 
</td>
</tr>
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
<label  class="required"><b>Quantity</b></label></td><td><input  type="number"  name="qtity"  min='0' max='4294967295' required >  
</td>
</tr>
<tr>
<td><label class="required"><b>Rate</b></label></td>
<td>
<input type="text" name="Rate"><br> <br> </td>
</tr>
<tr>
<td><label class="required"><b>Amount</b></label></td>
<td>
<input type="text" name="amt" ><br> <br> </td>
</tr>
<tr>
<tr >
<td bgcolor="#ede8dd">
<label for="Date" class="required"><b> Date of Purchase</b></label></td><td bgcolor="#ede8dd"><input id="date" type="date"  name="date" min='0' max='4294967295' required > 
</td>
</tr>
<td><label class="required"><b>Firm</b></label></td>
<td>
<input type="text" name="firm" Style="width:300" required><br> <br> </td>
</tr>

</tr>
</table>
</tr>
</table>
<br> <br>
<input type="submit" name="submit" value="Submit">   

</form>






</center>
 <a href="stock_reg.php" style="color:blue; text-decoration:none;font-size: 18px; float: right;margin-right:20px;"><< <b>Back</b></a>
</body>
</html>
<?php 
include("admin_home.php");
?>
<html>
<head>
<title>Inventory Management System</title>

</head>
<body style="background-color:#ffff99;">
<center>
<div>
   

 <br><br><br>
 <form method="post" name="input" action="viewdeadpurchase.php">
 <label><b>Date of Purchase</b></label>  <input type="date" name="date" required>
 <input type="submit" name="submit" value="View" size="100%">
</form><br><br><br><br><br><br>

</div>


</center>
<a href="viewdeadstock.php" style="color:blue; text-decoration:none;font-size: 18px; float: right;margin-right:20px;"><< <b>Back</b></a>
</body>
</html>

<?php 
include("admin_home.php");
?>
<html>
<head>
<div>
<title>Iventory Management System</title>
</head>
<body style="background-color:#ffff99;">
<center>

   <div Style="font-size:20px; color:blue;"><b> View DeadStock Details</b></div><br>
 <pre> <input type="button" value="Date Wise Accounting(Purchase)" size="100%" onClick="location.href='viewdpdate.php'"> <input type="button" value="Date Wise Accounting(Issue)" size="100%" onClick="location.href='viewdateo2.php'">   <input type="button" value="Item Wise Accounting" size="100%" onClick="location.href='viewdeaditem.php'">   <input type="button" value="Department Wise Accounting" size="100%" onClick="location.href='deaddept.php'">
 </pre><br><br><br>
 <a href="home.php" style="color:blue; text-decoration:none;font-size: 18px; float: right;margin-right:20px;"><< <b>Back to Home</b></a>
</center>

</body>
</html>
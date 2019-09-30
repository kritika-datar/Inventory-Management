<?php
include'admin_home.php';
?>
<html>
<head>
<div>
<title>Iventory Management System</title>
</head>
<body style="background-color:#ffff99;">
<center>
   <div Style="font-size:20px; color:blue;"><b> View Stock Details</b></div><br>
 <pre> <input type="button" value="Date Wise Accounting(Purchase)" size="100%" onClick="location.href='viewpdate.php'"> <input type="button" value="Date Wise Accounting(Issue)" size="100%" onClick="location.href='viewdateo.php'">   <input type="button" value="Item Wise Accounting" size="100%" onClick="location.href='viewitem.php'">   <input type="button" value="Department Wise Accounting" size="100%" onClick="location.href='department.php'">
 </pre><br><br><br>
 <a href="home.php" style="color:blue; text-decoration:none;font-size: 18px; float: right;margin-right:20px;"><< <b>Back to Home</b></a>
</center>

</body>
</html>
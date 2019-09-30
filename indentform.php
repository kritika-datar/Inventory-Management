<?php 	session_start();
		if(!isset($_SESSION['username'])){                             
		header("Location: login.php");   }     
      include("add.php");			
?>  
<html>
<head>
<title>Inventory Management System</title>
<style>
.flash {
   animation-name: flash;
    animation-duration: 0.2s;
    animation-timing-function: linear;
    animation-iteration-count: infinite;
    animation-direction: alternate;
    animation-play-state: running;
}

@keyframes flash {
    from {color: red;}
    to {color: black;}
}
</style>
</head>
<body style="background-color:#ffff99;">
<center>
<div style="border:5px solid black; width:800px; height:600px;">
   
   
   <div Style="font-size:35px; margin-top:50px;"><b>Devi Ahilya Vishwavidyalaya, Indore</b></div>
  <div Style="font-size:25px; margin-top:10px; color:red; margin-bottom:10px;"><b>Inventory Management System</b></div>
   <div Style="font-size:20px; margin-top:10px; color:red; margin-bottom:10px;"><b>2018 - 2019</b></div>
   <img src="logo.png" alt="logo" style="width:150px; height:150px;"><br><br>
   <div class="header"><h3>  <?php echo strtoupper($_SESSION['name']);?> </h3></div>

<br/>
<div >

<input style="margin-right: 20px;" type="button" onclick="location.href='indentform1.php'; " value="Add Items"/>
<input style="margin-right: 20px;" type="button" onclick="location.href='utdindentsummary.php';" value="View Indent"/>
<br/>

</div>
<div class="flash" style="font-size:20px;padding-top:20px;height:100px;">
<b>
<?php 
if(isset($_SESSION['message']))
{
echo  $_SESSION["message"] ;
} 
?></b>
</div>
<a href="homepage.php" style="color:blue; text-decoration:none;font-size: 18px; float: right;margin-right:20px;"><< <b>Back to Home</b></a>
<?php 
unset($_SESSION['message']);
?>
</div>
</center>
</body>
</html>
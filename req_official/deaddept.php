 <?php 
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


<br/>
<div >
<form>
<input style="margin-right: 20px;" type="button" onclick="location.href='utd_deadlist.php'; " value="UTD"/>
<input style="margin-right: 20px;" type="button" onclick="location.href='rnt_deadlist.php';" value="RNT"/>
<br/>
</form>
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
<a href="viewdeadstock.php" style="color:blue; text-decoration:none;font-size: 18px; float: right;margin-right:20px;"><< <b>Back</b></a>
</div>
</center>
</body>
</html>
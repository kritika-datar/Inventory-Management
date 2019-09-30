<?php 	session_start();
		if(!isset($_SESSION['username'])){                             
		header("Location: index.php");   }
        include("add.php");		
?> 
<html>
<head>
<title>Requirement and Information Gathering System</title>
</head>
<?php 
include("serverconfig.php");
$connection = mysqli_connect($servername, $username, $password, $dbname);
if(mysqli_connect_errno()){
	die("Connection to Database failed:" .mysqli_connect_error()." (".mysqli_connect_errno().")");}
	$utd=$_SESSION['username'];
	if(isset($_POST['submit1'])){
		$post=$_POST['post'];
		$sp=$_POST['sp'];
		$req=$_POST['req'];
		$ls=$_POST['ls'];
		$fp=$_POST['fp'];
		
		
	}else if(isset($_POST['submit2'])){
		$post=$_POST['post'];
		$sp=$_POST['sp'];
				$ls=$_POST['ls'];
		$query="delete from childims where particular='$post'&& Qty='$sp'&& Lastindentdate='$ls'";
		$result=mysqli_query($connection,$query);
	if(!$result)  
	die("error:Data cannot be deleted");  
	header('Location: utdindentsummary.php');
	}
	else{
		die('Server is down.');
	}
	
?>
<body style="background-color:#ffff99;">
<center>
<div >
   
   
   <div Style="font-size:35px; margin-top:30px;"><b>Devi Ahilya Vishwavidyalaya, Indore</b></div>
   <div Style="font-size:20px; margin-top:10px; color:red; margin-bottom:10px;"><b>2018- 2019</b></div>
   <div class="header"><h3> <?php echo strtoupper($_SESSION['name']);?>   </h3></div>
<div style="color:blue; margin-bottom:10px; font-size:20px;padding-top: 10px;"> <b>Editing block</b> </div>

<!--<div style="color:blue; margin-bottom:10px; font-size:20px;padding-top: 10px;"> <b>Other Requirements</b> </div-->
<form action="view_hand_handler.php" method="POST">
<table border="5" id="table" cellspacing="10" cellpadding="10"  >

 <tr>
    <th>Particular(s)</th>
    <th>Quantity</th>
    <th>Previous stock</th>
    <th>Last Recieved</th>
	<th>Remarks</th>
	
</tr>
<tr>
        <th><input type="textarea" value="<?php  echo $post;?>" name="post" readonly="readonly"></th>
	<td><input type="number" value="<?php  echo $sp?>"  name="sp" ></td>
	<td><input type="number" value="<?php echo $req;?>" name="req" ></td>
	<td><input type="date" value="<?php  echo $ls;?>" name="ls" ></td>
	<td><input type="text" value="<?php  echo $fp;?>" name="fp" ></td>
</tr>
</table>
<br />
<center><input type="submit"  name="submit" value="Confirm and Save"></center>
</form>
<br />

	
</div>

<a href="utdindentsummary.php" style="color:blue; text-decoration:none;font-size: 18px; float: right;margin-right:20px;margin-top:200px;"><< <b>Back </b></a>

</div>
</center>
</body>
</html>

<html>
<body>
<center>
<?php
include'add.php';

	//session_start();
	if(!isset($_SESSION['username']))
	{                             
		header("Location: login.php");   
	}          
	include("serverconfig.php");
	$connection = mysqli_connect($servername, $username, $password, $dbname);
	if(mysqli_connect_errno())
	{
		die("Connection to Database failed:" .mysqli_connect_error()." (".mysqli_connect_errno().")");
	}
	$sql="SELECT name,Indent_id FROM masterims WHERE status = 2";
	$result=mysqli_query($connection, $sql);
	$count=mysqli_num_rows($result);
	if($count >0)
	{
		$response='';
		while($f=mysqli_fetch_row($result))
		{						
			//<!---------------php loop --------------------->
			$row=$f[1];
			$response = $response . "<div class='notification-item'>" .
									"<div class='notification-subject'><form action='approved_summary.php' method='post'>
									<input type='text' readonly name='id' value='".$row."' hidden>
									<input type='text' name='utd' value='".$f[0]."' STYLE='color:black'>
									<input type='submit' name='submit' value='View' STYLE='color:black'></form></div>" . 
									"</div>";			
		}
		if(!empty($response)) 
		{
			print $response;
		}
	}
?>
</center>
<br><br>
<a href="viewindent.php" style="color:blue; text-decoration:none;font-size: 18px; float: right;margin-right:20px;"><< <b>Back</b></a>
</body>
</html>
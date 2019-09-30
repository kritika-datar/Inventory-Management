<?php 
	//error_reporting(E_ERROR | E_PARSE | E_NOTICE);
	if(isset($_POST["submit"]))
	{
		include("serverconfig.php");
		$connection = mysqli_connect($servername, $username, $password, $dbname);	
		if(mysqli_connect_errno())
		{
			die("Connection to Database failed:" .mysqli_connect_error()." (".mysqli_connect_errno().")");
		}
		if(isset($_POST["username"]))
		{
			$username=$_POST["username"];
		}
		else
		{
			$username="";
		}
		if(isset($_POST["password"]))
		{
			$password=$_POST["password"];
		}
		else
		{
			$password="";
		}

		$query1="select * from login where username='$username' and password='$password'";
		$result1 = mysqli_query($connection,$query1);
		$number_of_rows1 = mysqli_num_rows($result1);
	
/*		$query2="select * from loginadmin where username='$username' and password='$password'";
		$result2 = mysqli_query($connection,$query2);
		$number_of_rows2 = mysqli_num_rows($result2);
	
		$query3="select * from loginofficial where username='$username' and password='$password'";
		$result3 = mysqli_query($connection,$query3);
		$number_of_rows3 = mysqli_num_rows($result3);
	*/	
		while($s=mysqli_fetch_array($result1))
		{
			$row=$s['type'];
			$u=$s['name'];
		}
		if($row=='utd')
		{
			session_start();
			$_SESSION['username']=strtolower($username);
			$row = mysqli_fetch_assoc($result1);
			$_SESSION['name']=$u;
			header("Location: homepage.php");
		}
		else if($row=='admin')
		{
			session_start();
			$_SESSION['username']=strtolower($username);
			echo"<script>alert('success');";
			header("Location: req_admin\home.php");
		}
		else if($row=='official')
		{
			session_start();
			$_SESSION['username']=strtolower($username);
			$row = mysqli_fetch_assoc($result3);
			$_SESSION['name']=$row['name'];
			header("Location: req_official\officialhome.php");
		}
		else
		{ 
			session_start();
			echo"<script>alert('Wrong username/password combination');
			window.location='login.php';</script>";
		}
	}
	else
	{
		die('Sorry, there was a problem connecting to database, Please try again!');
	}
?>

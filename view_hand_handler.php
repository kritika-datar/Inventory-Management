<?php 	session_start();
		if(!isset($_SESSION['username'])){                             
		header("Location: index.php");   }      

include("serverconfig.php");
$connection = mysqli_connect($servername, $username, $password, $dbname);
if(mysqli_connect_errno()){
	die("Connection to Database failed:" .mysqli_connect_error()." (".mysqli_connect_errno().")");}
	$utd=$_SESSION['username'];
	
	if(isset($_POST['submit'])){
		if(($_POST['post'])!=''){
			$post=$_POST['post'];
		}
		else{$post="Not Mentioned";}
		
		if(($_POST['sp'])!=''){
			$sp=$_POST['sp'];
		}
		else{$sp=0;}
		
		if(($_POST['fp'])!=''){
			$fp=$_POST['fp'];
		}
		else{$fp=0;}
		
		if(($_POST['req'])!=''){
			$req=$_POST['req'];
		}
		else{$req=0;}
		if(($_POST['ls'])!=''){
			$ls=$_POST['ls'];
		}
		else{$ls=0;}
		
		
		
			$query="UPDATE childims set Prevstock='$req',Lastindentdate='$ls',Qty='$sp',Remarks='$fp' where Particular='$post'";
			$result=mysqli_query($connection,$query);
	if(!$result)  
	die("error:Data cannot be updated");  
	header('Location: utdindentsummary.php');
}
		
?> 
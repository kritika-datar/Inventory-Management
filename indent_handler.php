<?php 	session_start();
	  	$utd=$_SESSION['name'];
		$date=date('Y-m-d');
		
		       include("serverconfig.php");
			   include("add.php");
                   $conn = mysqli_connect($servername, $username, $password, $dbname);
                   if(mysqli_connect_errno()){
                  	die("Connection to Database failed:" .mysqli_connect_error()." (".mysqli_connect_errno().")");}
		               
                  
							
							 if(isset($_POST['Submit']))
							 {      $master="insert into masterims (Date,Name) values ('$date','$utd')";
								  $r=mysqli_query ($conn,$master);
								   $u= mysqli_insert_id($conn);
								 foreach($_POST['BX_NAME'] as $row=>$par)
								 {
									 $particular=$par;
									 $quantity=$_POST['BX_qty'][$row];
									 $remarks=$_POST['BX_rem'][$row];
									 $availstock=$_POST['BX_prev'][$row];
									 $lstindent=$_POST['BX_date'][$row];
								    
                                       $involve="insert into childims (Particular,Qty,Prevstock,Lastindentdate,Remarks,Indent_id) values('$particular','$quantity','$availstock','$lstindent','$remarks','$u')";
	                                   $t=mysqli_query($conn,$involve);
								 /* foreach($_POST['particular'] as $row=>$par)
								  { $particular=mysqli_real_escape_string($conn,$par);
									 $quantity=mysqli_real_escape_string($conn,$_POST['qty'][$row]);
									 $remarks=mysqli_real_escape_string($conn,$_POST['remarks'][$row]);
                                           								 
								 }*/ } 
								 }?>		 
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
<div >
   
   
   <div Style="font-size:35px; margin-top:50px;"><b>Devi Ahilya Vishwavidyalaya, Indore</b></div>
  
   <div Style="font-size:20px; margin-top:10px; color:red; margin-bottom:10px;"><b>2018 - 2019</b></div>
   <img src="logo.png" alt="logo" style="width:150px; height:150px;"><br><br>
   <div class="header"><h3>  <?php echo strtoupper($_SESSION['name']);?> </h3></div>

<br/>

<br>
<div class="flash" style="font-size:20px;padding-top:20px;height:100px;">
<b>
<?php 
if(isset($_SESSION['message']))
{
echo  $_SESSION["message"] ;
} 

								 echo "Submitted Successfully!";
							  mysqli_close($conn);
                       ?></b>
</div><br><br><br>
<a href="homepage.php" style="color:blue; text-decoration:none;font-size: 18px; float: right;margin-right:20px;"><< <b>Back to Home</b></a>
<?php 
unset($_SESSION['message']);
?>
</div>
</center>
</body>
</html>
								 
								 
								 
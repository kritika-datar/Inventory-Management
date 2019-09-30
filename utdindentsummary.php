<?php 	session_start();
		if(!isset($_SESSION['name'])){                             
		header("Location: login.php");   }          
			include("serverconfig.php");
			include("add.php");	
             $connection = mysqli_connect($servername, $username, $password, $dbname);
                if(mysqli_connect_errno()){
	             die("Connection to Database failed:" .mysqli_connect_error()." (".mysqli_connect_errno().")");}
	 	
	               $utd=strtolower($_SESSION['name']);
	                 $date=date("Y-m-d");
                     $query="select childims.Particular,childims.Qty,childims.Prevstock,childims.Lastindentdate,childims.Remarks from childims INNER JOIN masterims on childims.Indent_id=masterims.Indent_id where Name='$utd 'and Date='$date'";
                 	$result = mysqli_query($connection,$query);
                	$number_of_rows = mysqli_num_rows($result);
					$i = $number_of_rows;

	             /*  $b="select name from loginutd where name='$utd'" ;
	               $resu = mysqli_query($connection,$b);
	              while($row=mysqli_fetch_assoc($resu))
                  {    $s=$row['name'];}*/
        ?>  
<html>
<head>
<title>Inventory Management System</title>
<style>
 tr:nth-child(odd){background-color:#ede8dd;}
tr:nth-child(even){
		background-color: #ede8dd;
}
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
	
  <div style="color:black; margin-bottom:10px; font-size:20px;padding-top: 10px;"><b> <?php echo  strtoupper($utd); ?> </b><br/> </div><br><br>
     
<br>
	<div style="margin-right:80px" >
	<?php  
		if($number_of_rows >0){
	
			//$count=1;
		 
			//$rowcount=mysqli_num_rows($result);
		//if($rowcount>0)
			?>
				<table border="5" id="table" cellspacing="10" cellpadding="10" align="right" >
		    <?php while($row = mysqli_fetch_array($result)){
		
		$temp_array[]=$row;
	
		}
		?>


 <tr>
    <th>Particular(s)</th>
    <th>Quantity</th>
    <th>Previous stock</th>
    <th>Last Recieved</th>
	<th>Remarks</th>
	<th></th>
	<th></th>
	
</tr>

<?php
$j=0;
				for($j=0;$j<$i;$j++){
					
					$row = $temp_array[$j];
					$post = $row['Particular'];
					$sp = $row['Qty'];	
				
				$req=$row['Prevstock'];
				$ls=$row['Lastindentdate'];
					$fp = $row['Remarks'];

?>

<tr>
<form action="viewindent_handler.php" method="POST">
	<th><input type="textarea" value="<?php  echo $post;?>" name="post" readonly="readonly"></th>
	<td><input type="number" value="<?php  echo $sp?>"  name="sp" readonly="readonly"></td>
	<td><input type="number" value="<?php echo $req;?>" name="req" readonly="readonly"></td>
	<td><input type="date" value="<?php  echo $ls;?>" name="ls" readonly="readonly"></td>
	<td><input type="text" value="<?php  echo $fp;?>" name="fp" readonly="readonly"></td>
	<td><input type="submit" name="submit1"  value="Edit" ></td><td><input type="submit"  onclick="confirm('Please confirm before deleting requirement.')" name="submit2"  value="Delete" ></td>
</form>
</tr>


	<?php 
				
} }else{
	?><br /><br />
	<div class="flash" style="font-size:20px;padding-top:20px; min-height:100px; font-weight: bold;">No Data found!!</div>
	<?php 
mysqli_error($connection);} 
				?>			
</table>						
			
</div>

</center>
<a href="homepage.php" style="color:blue; text-decoration:none;font-size: 18px; float: right;margin-right:20px;"><< <b>Back to Home</b></a>


</body>
</html>
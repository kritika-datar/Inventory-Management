<?php 	session_start();
	  	
		
		       include("serverconfig.php");
                   $conn = mysqli_connect($servername, $username, $password, $dbname);
                   if(mysqli_connect_errno()){
                  	die("Connection to Database failed:" .mysqli_connect_error()." (".mysqli_connect_errno().")");}
		 		
		if(!isset($_SESSION['username'])){                             
		header("Location: login.php");   }  
        		
                         
	?>		
		
		
		
<!DOCTYPE html>
<html>
<head>
<title>Indent From
</title>
<script type ="text/javascript">

</script>
<style type="text/css">tr:nth-child(odd){background-color:#ede8dd;} tr:nth-child(even){background-color:white;}
</style>
</head>
<body   style="background-color:#ffff99;">
<center>
   
    <div Style="font-size:35px; margin-top:50px;"><b>Devi Ahilya Vishwavidyalaya, Indore</b></div>
<div Style="font-size:25px; margin-top:10px; color:red; margin-bottom:10px;"><b>Inventory Management System</b></div>
<div Style="font-size:20px; margin-top:10px; color:red; margin-bottom:10px;"><b>2018 - 2019</b></div>
<span class="header"><h3> <?php echo strtoupper($_SESSION['name']);?>  </h3></span><br>

<div style="color:blue;font-size:20px"><b>Indent Form</b></div> <br>

    <form name="form1" action="indent_handler.php" method="post">
       <div > 
            
		  
				<?php
                  
                             if(empty($_POST['particular'])){
						 echo "No items selected" ;}
                  else{	 ?>
		
		   <table width="300" height="200"  border ="3" align ="center" cellpadding="5" cellspacing="5" bgcolor="#CCCCCC">
           <tr>  <td colspan="6" align="right" bgcolor="white"><div><b><label >Date:</label><?php echo date('d-m-Y');?></b></div></td></tr>
              <tr>
                  <th bgcolor="#CCCCCC">S.NO</th>
                  <th bgcolor="#CCCCCC">Particular(s) </th>
                  <th bgcolor="#CCCCCC">Quantity</th>
                
				  <th bgcolor="#CCCCCC">Previous Available stock </th>
				  <th bgcolor="#CCCCCC">Last recieved</th>
                    <th bgcolor="#CCCCCC">Remarks </th>
				</tr>
				
                  	<?php
                        $chkbox = $_POST['particular'];
                        $i = 0;
						$j=1;
                        While($i < sizeof($chkbox))
                        {
                      
 
                        ?>
 
                        <tr>

                     <td><center><?php echo $j++; ?></center></td>
                     <td>                                                                  
                        <input type= "text" readonly name="particular[]"  value=" <?php   
									
                                     echo  $chkbox[$i] ;
									 $i++;
                                     ?>"/>
							   </td>
              		<td>
                      <input type= "number" required maxlength="25" id="user_lic"  name="qty[]" min="0" max="300" step="1" />
                    </td>
					
					

					
	                  
					  <td>
				      <input type= "number" required maxlength="25" id="avail"  name="availstock[]" min="0" max="300" step="1" />
					  </td>
					 <td>
					 <input type ="date" required id ="lstindent" name="lstindent[]">
					 </td>
					  <td><input type="text" name="remarks[]" align="center" placeholder="(if any)" >
					 </td>
					 
		            </tr>
						<?php     } }  mysqli_close($conn);?>

</table>
</div><br><br>
<input type="submit" name="Submit" value="Submit" >

</form>

</center>
</body>

</html>

	

 
 
 
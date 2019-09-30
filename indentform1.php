
<?php 	session_start();
	  	
	
		       include("serverconfig.php");
                   $conn = mysqli_connect($servername, $username, $password, $dbname);
                   if(mysqli_connect_errno()){
                  	die("Connection to Database failed:" .mysqli_connect_error()." (".mysqli_connect_errno().")");}
		
		if(!isset($_SESSION['username'])){                             
		header("Location: login.php");   }  
          include("add.php");		
?>  	
		
		
		
<!DOCTYPE html>
<html>
<head>
<title>Indent From
</title>
<style type="text/css">tr:nth-child(odd){background-color:#ede8dd;} tr:nth-child(even){background-color:white}
</style>

<script>
function addRow(tableID) {
	var table = document.getElementById(tableID);
	var rowCount = table.rows.length;
	if(rowCount < 10){							// limit the user from creating fields more than your limits
		var row = table.insertRow(rowCount);
		var colCount = table.rows[0].cells.length;
		for(var i=0; i<colCount; i++) {
			var newcell = row.insertCell(i);
			newcell.innerHTML = table.rows[0].cells[i].innerHTML;
		}
	}else{
		  alert("Maximum 10 items allowed ");
			   
	}
}

function deleteRow(tableID) {
	var table = document.getElementById(tableID);
	var rowCount = table.rows.length;
	for(var i=0; i<rowCount; i++) {
		var row = table.rows[i];
		var chkbox = row.cells[0].childNodes[0];
		if(null != chkbox && true == chkbox.checked) {
			if(rowCount <= 1) { 						// limit the user from removing all the fields
				alert("Cannot Remove all the rows.");
				break;
			}
			table.deleteRow(i);
			rowCount--;
			i--;
		}
	}
}
</script> 



</head>
<body >
<center>

<div style="color:blue;font-size:20px"><b> Indent Form</b></div> <br>
 
    
<span class="header"><h3> <?php echo strtoupper($_SESSION['name']);?>  </h3></span><br>
    
<form name="aform"  id ="iform "action="indent_handler.php" method="post">


	 

<!--<table width="500" height="200"  border ="3" align ="center" cellpadding="5" cellspacing="5" bgcolor="#CCCCCC"> 
  <tr><td colspan="2" align="right" bgcolor="white" ><div><b><label >Date:</label><?php// echo date('d-m-Y');?></b></div></td></tr>

  <tr> <th bgcolor="#CCCCCC"> Select Particular(s)</th></tr>-->
				
     <?php                
        /*  $sql="SELECT particular from stocklist where qty>0";
	      $result=mysqli_query($conn,$sql);
		$r=mysqli_fetch_array( $result) or die(mysqli_error($conn));
	$numberofrow=mysqli_num_rows($result);
    for($counter = 1;$counter<=$numberofrow;$counter++){ */


									//while ($r=mysqli_fetch_array( $result ) )
                            ?>
				<div>	
				<p> 
					<input type="button" value="Add  " onClick="addRow('dataTable')" /> 
					<input type="button" value="Remove " onClick="deleteRow('dataTable')"  /> 
					<p>(All actions apply only to entries with checked boxes only.)</p>
				</p>
               <table id="dataTable" width="200px" height="auto"  border ="3" align ="center" cellpadding="5" cellspacing="5" bgcolor="#CCCCCC">
                  <tbody>
                    <tr>
                      <p>
						<td><input type="checkbox" required="required" name="chk[]" checked="checked" /></td>
						<td>
						 	<label for="part"> Particular</label>
							<select id ="part"name="BX_NAME[]" >
                           <option selected="selected" disabled="disabled ">select</option>
                              <?php
                             $sql = mysqli_query($conn, "SELECT * From stocklist");
                              $row = mysqli_num_rows($sql);
                                while ($row = mysqli_fetch_array($sql)){
                              echo "<option value='". $row['particular'] ."'>" .$row['particular'] ."</option>" ;
                            }?>
                           </select>
						 </td>
						 <td>
							<label>Quantity</label>
							<input type="number" required="required" name="BX_qty[]">
						 </td>
						  <td>
							<label>Previous Stock</label>
							<input type="number" required="required" name="BX_prev[]">
						 </td>
						  <td>
							<label>Last Indentdate</label>
							<input type="date" required="required" name="BX_date[]">
						 </td>
						 <td>
							<label for="BX_age">Remarks</label>
							<input type="text"   name="BX_rem[]">
					     </td>
							</p>
                    </tr>
                    </tbody>
                </table>
				</div>
          
                 
									  <?php    mysqli_close($conn);?>
                <br><br><br>
				<input type="submit" name="Submit" value="Confirm & Submit" >
					
				
			</form>
	<a href="homepage.php" style="color:blue; text-decoration:none;font-size: 18px; float: right;margin-right:20px;"><< <b>Back</b></a>
				</center>
			</body>

		</html>

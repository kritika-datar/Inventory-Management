<?php 
include("add.php");
?>


<html>
	<head>
		<title>Inventory Management System</title>
		
	</head>
	<body style="background-color:#ffff99;">
		<center>
			<div>
				<br>
			<div Style="font-size:18px; color:blue;"><b>Issue Report</b></div><br>
				
						<form action="rnt_deadreport.php" name="myform" method="post">	
						<label class="required" ><b>Nalanda Offices : </b></label>
						<select name="rnt" required > 
                        <option  value="" disabled selected>Select</option>
								
								<option value="vc">VC</option>
								<option value="vcoffice">VC Office</option>
								<option value="rgis">Registrar</option>
								<option value="cf">Confidential</option>						
								<option value="dmt">Development</option>
								<option value="exm">Examination</option>
								<option value="str">Store</option>
							    <option value="estb">Establishment</option>
								<option value="acd">Academic</option>
								<option value="acc">Accounts</option>
								<option value="aud">Audit</option>
								<option value="scst">SC/ST</option>
							    <option value="engine">Engineering</option>							
								<option value="dcdc">DCDC</option>
							    <option value="dsw">DSW</option>
								<option value="nss">NSS</option>
					            <option value="admin">Administration</option>
								<option value="ppress">Printing Press</option>
							    <option value="exmc">Exam Controller</option>
							    <option value="shl">Student Home Library, RNT</option>
								<option value="accsf">Accounts(Self Finance)</option>
								<option value="uls">University Legal Section</option>
							    <option value="bcsd">Bahai Chair for Studies in Development</option>
                                </select><br><br>
<label><b>From : </b></label><input type="date" name="fromdte" required> </td>  <td> <label><b>To : </b></label><input type="date" name="todte" required>
			
							<br><br><br><input type="submit" value="View">
						</form><br><br><br>
				<a href="officialhome.php" style="color:blue; text-decoration:none;font-size: 18px; float: right;margin-right:20px;"><< <b>Back</b></a>
			</div>
		</center>
		
	</body>
</html>
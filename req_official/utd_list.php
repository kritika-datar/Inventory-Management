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
				
						<form action="utd_report.php" name="myform" method="post">	
						<label class="required" ><b>University Departments : </b></label>
						<select name="utd" required style="width:300;"> 
                        <option  value="" disabled selected>Select</option>
								
<option value="Asc"> Human Resource Development Centre</option>
<option value="Biochem">School of Biochemistry</option>
<option value="Sobiotech">School of BioTechnology</option>
<option value="Chemsc">School of Chemical Sciences</option>
<option value="Socmrce">School of Commerce</option>
<option value="socsit">School of Computer Science & Information Technology</option>
<option value="Sodsf">School of Data Science & Forecasting</option>
<option value="Soecon">School of Economics</option>
<option value="Soedu">School of Education</option>
<option value="Soex">School of Electronics</option>
<option value="Sees">School of Energy & Environmental Studies</option>
<option value="Soinstru">School of Instrumentation</option>
<option value="Sjmc">School of Journalism & Mass Communication</option></option>
<option value="Solaw">School of Law</option>
<option value="Sols">School of Life Sciences</option>
<option value="Solang">School of Languages</option>
<option value="Somath">School of Mathematics</option>
<option value="Sopharma">School of Pharmacy</option>
<option value="Sopedu">School of Physical Education</option>
<option value="Sophy">School of Physics</option>
<option value="Sostat">School of Statistics</option>
<option value="Soss">School of Social Science</option>
<option value="Ietdavv">Institute of Engineering & Technology</option>
<option value="Imsdavv">Institute of Management Studies</option>
<option value="Iipsdavv">International Institute of Professional Studies</option>
<option value="Compcent">Computer Centre</option>
<option value="itc">Information Technology Centre</option>
<option value="Solib">School of Library and Information Science</option>
<option value="Doll">Department of Life Long Learning</option>
<option value="Emrcdavv">Educational Multimedia Research Centre</option>
<option value="Umcdavv">University Minority Cell</option>
<option value="Ddedavv">Directorate of Distance Education</option>
<option value="Soyoga">School of Yoga</option>
<option value="Ddukkdavv">DDU-Kaushal Kendra</option>
<option value="cwo">Chief Warden Office</option>
<option value="mcc">Model Career Center</option>
<option value="uhc">University Health Center</option>
<option value="usv">University Shishu Vihar</option>
<option value="iqac">Internal Quality Assurance Cell</option>
<option value="cpc">Central Placement Cell</option>
<option value="ucc">University Cultural Centre</option>
<option value="cvc">Central Valuation Center</option>
<option value="dos">Directorate of Sports</option>
<option value="CNO">Central Office</option>
</select>
<br><br>
<label><b>From : </b></label><input type="date" name="fromdte" required> </td>  <td> <label><b>To : </b></label><input type="date" name="todte" required>
			
							<br><br><br><input type="submit" value="View">
						</form><br><br><br>
				<a href="officialhome.php" style="color:blue; text-decoration:none;font-size: 18px; float: right;margin-right:20px;"><< <b>Back</b></a>
			</div>
		</center>
		
	</body>
</html>
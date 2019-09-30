
<html>
<head>
		<title>Inventory Management System</title>
		<style>
			table 
			{
				table-layout:fixed;
			}
			td 
			{
				word-wrap:break-word;
			}
		</style>
	</head>
<body>
<center>







<pre>
                                                       Devi Ahilya Vishwavidyalaya, Indore<br>
                                                    (GRADE ‘A’ UNIVERSITY, ACCREDITATED BY NAAC)			 
													                                                                                        University House, 
                                                                                                                                              RNT Marg,
                                                                                                                                             Indore-452001
No. Store /P.S./ 2018
To,



Subject:- Supply of Items of Stationery and other articles.
Ref.:- Your e-tender for supply of items of stationery and other items.
With reference to your e-tender on the above subject and to inform you that the University has approved the rates submitted under e-tender shown in the column no. 4 and para-2 of this letter. The rates are applicable upto 11/04/2019.

2. Please supply the items mentioned as under:- </pre>
<table border='5' width='1000'>
<tr>
<th>S. No.</th> 
<th>Name of Item</th> 
<th>Quantity</th> 
<th>Rate excluding GST
<th>Total</th>
</tr>
<?php 
	$n=0;
	if(isset($_POST['Submit']))
	{
		if(!empty($_POST['part']))
		{
			$p=$_POST['part'];
			foreach($_POST['part'] as $selected)
			{
				echo "<tr><td>". ++$n ."</td>";
				echo "<td>$selected</td>";
				echo "<td></td>";
				echo "<td></td>";
				echo "<td></td>";
				echo "</tr>";
			}
		}
	}

?>
</table>

3. The bill for the above items may be submitted in the name of Registrar, D.A.V.V for making the payment:-

By Order
Registrar
</center>
</body>
</html>
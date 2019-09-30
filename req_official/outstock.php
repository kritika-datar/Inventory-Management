<?php
				$connection = mysqli_connect($servername, $username, $password, $dbname);
				if(mysqli_connect_errno())
				{
					die("Connection to Database failed:" .mysqli_connect_error()." (".mysqli_connect_errno().")");
				}
				$qry="select qty from stocklist";
				$result = mysqli_query($connection,$qry);
				while($row=mysqli_fetch_assoc($result))
				{ 
					$s=$row['qty'];
				}
				if($s<=50)
				{ 
					echo "<div id='out' >";
					echo "<marquee behavior='alternate' hspace='230px' direction='right' scrollamount='6' ><a href='out.php' Style='font-size:20px;color:red; text-decoration:none;' class='flash'  ><b>Items Running Out Of Stock !</b></a></marquee></div>";
				}
			?>
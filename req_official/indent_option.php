<?php
  
	//session_start();
	if(!isset($_SESSION['username']))
	{                             
		header("Location: login.php");   
	}
	include("serverconfig.php");
	$connection = mysqli_connect($servername, $username, $password, $dbname);
	if(mysqli_connect_errno())
	{
		die("Connection to Database failed:" .mysqli_connect_error()." (".mysqli_connect_errno().")");
	}
	$new=mysqli_num_rows(mysqli_query($connection,"SELECT * FROM masterims WHERE status = 0"));
	$pen=mysqli_num_rows(mysqli_query($connection,"SELECT * FROM masterims WHERE status = 1"));
	$app=mysqli_num_rows(mysqli_query($connection, "SELECT * FROM masterims WHERE status = 2"));
?>  
<html>
	<head>
	<!-- <meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1"> -->
		<title>Inventory Management System</title>
		<style>
		.notification-subject {		
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
		#notification-latest {
			left:200px;
	color: white;
	position: absolute;
	top:84px;
	background: black;
	box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.20);		
	max-width: 300px;
	text-align: center;
	padding-top:10px;
	padding-right:10px;
	padding-bottom:10px;
	padding-left:10px;
}
#notification-l {
			left:200px;
	color: white;
	position: absolute;
	top:150px;
	background: black;
	box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.20);		
	max-width: 300px;
	text-align: center;
	padding-top:10px;
	padding-right:10px;
	padding-bottom:10px;
	padding-left:10px;
}
#notification-la {
			left:200px;
	color: white;
	position: absolute;
	top:110px;
	background: black;
	box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.20);		
	max-width: 300px;
	text-align: center;
	padding-top:10px;
	padding-right:10px;
	padding-bottom:10px;
	padding-left:10px;
}
button#notification-icon {
	background: transparent;
	border: 0;
	position:relative;
	cursor:pointer;
}
#notification-count{
	position: absolute;
	left: 0px;
	top: 0px;
	font-size: 0.8em;		
	color: #de5050;
	font-weight:bold;
}
		</style>
		<!-- <link rel="stylesheet" href="notification-demo-style.css" type="text/css"> -->
		<script src="jquery-2.1.1.js" type="text/javascript"></script>
		<script type="text/javascript">
					function hi()
					{
						$("#notification-latest").hide();
					}
function h()
{					
						$("#notification-l").hide();
}
function hh()
{						
						$("#notification-la").hide();
					}
					function myFunction() 
					{
						$.ajax(
						{
						url: "new_list.php",
						type: "POST",
						processData:false,
						success: function(data)
						{
							$("#notification-count").remove();					
							$("#notification-latest").show();
							$("#notification-latest").html(data);
						},
						error: function(){}           
						});
					}
					$(document).ready(function() 
					{
						$('body').click(function(e)
						{
							if ( e.target.id != 'notification-icon')
							{
								$("#notification-latest").hide();
							}
						});
					});
				/*	function myFun() 
			{
				$.ajax(
				{
					url: "approved_list.php",
					type: "POST",
					processData:false,
					success: function(data)
					{
						$("#notification-count").remove();					
						$("#notification-l").show();
						$("#notification-l").html(data);
					},
					error: function(){}           
				});
			}
			$(document).ready(function() 
			{
				$('body').click(function(e)
				{
					if ( e.target.id != 'notification-icon')
					{
						$("#notification-l").hide();
					}
				});
			});
			function pend() 
			{
				$.ajax(
				{
					url: "pending_list.php",
					type: "POST",
					processData:false,
					success: function(data)
					{
						$("#notification-count").remove();					
						$("#notification-la").show();
						$("#notification-la").html(data);
					},
					error: function(){}           
				});
			}
			$(document).ready(function() 
			{
				$('body').click(function(e)
				{
					if ( e.target.id != 'notification-icon')
					{
						$("#notification-la").hide();
					}
				});
			}); */
		</script>
	</head>
	 <body>
	
	</body>
</html>
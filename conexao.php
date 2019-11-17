<?php
	$con = mysqli_connect('us-cdbr-iron-east-01.cleardb.net', 'b4ac2d6228fe88', 'f317b46c', 'heroku_d66bfcf806906c0');
	mysqli_set_charset($con, 'utf8');
	if (!$con) 
	{
	   echo mysqli_connect_error();
	   exit;
	}
?>
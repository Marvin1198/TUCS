<?php
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$db_name = "cakeshop";
	$con = mysqli_connect($hostname,$username,$password);
	mysqli_select_db($con,$db_name) or die ("Cannot connect the Database");
	//mysql_query("SET NAMES 'utf8'",$con);
?>

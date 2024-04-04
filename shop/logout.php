<?php
	session_start();
	if(isset($_SESSION['seller_id']))
	{
		session_destroy();
		echo "<script>window.location='login.php';</script>";
	}
?>

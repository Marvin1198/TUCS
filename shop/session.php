<?php
	session_start();
	if(!(isset($_SESSION['shop_id'])))
    {
		echo "<script>window.location='login.php';</script>";
    }
?>

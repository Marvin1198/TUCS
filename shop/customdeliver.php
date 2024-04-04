<?php
	include 'connection.php';
    include 'session.php';
	$shop_id = $_SESSION["shop_id"];
	

	if(isset($_GET['cid']))
	{
		$id = $_GET['cid'];
		$a = "update custom_order set status='1' where id='$id'";
		$s = mysqli_query($con,$a) or die("Query Error" . mysqli_error($con));
	}
	$a = "select * from custom_orders where shop_id='$shop_id'";
	$s = mysqli_query($con,$a);
	echo "<script>window.location='view_customorders.php'</script>";
?>
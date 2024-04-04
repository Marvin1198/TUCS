<?php
include('connectdb.php');

//if($_SERVER['REQUEST_METHOD'] == "POST")
//{
	$first_name = $_GET["first_name"];
	$last_name = $_GET["last_name"];

	$query1 = "INSERT into users(first_name,last_name ) values ('$first_name','$last_name')";
	$query2 = mysql_query($query1);

	if($query2>0)
	{
		$data = array("result"=>"200");
	}
	else
	{
		$data = array("result"=>"300");
	}
//}

mysql_close($con);
header('Content-type: application/json');
echo json_encode($data);
?>

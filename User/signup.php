<?php
include('connectdb.php');


	$fn = $_POST["firstname"];
	$ln = $_POST["lastname"];
  $no = $_POST["number"];
  $address = $_POST["address"];
	$query1 = "INSERT into db(firstname,lastname,no,address) values ('$fn','$ln','$no','$address')";
	$query2 = mysqli_query($con,$query1);

	if($query2>0)
	{
		$data = array("result"=>"200");
	}
	else
	{
		$data = array("result"=>"300");
	}


mysqli_close($con);
header('Content-type: application/json');
echo json_encode($data);
?>

<?php
include('connectdb.php');

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$shop_id = $_POST["shop_id"];
    $open_time = $_POST["open_time"];
    $close_time = $_POST["close_time"];
    $address = $_POST["address"];
    $latitude = $_POST["latitude"];
    $longitude = $_POST["longitude"];

    $query2 = "UPDATE cake_shop SET opening_time='$open_time',closing_time='$close_time',address='$address',latitude='$latitude',longitude='$longitude' where id='$shop_id'";
    $query2 = mysqli_query($con,$query2) or die(mysqli_error($con));

    if($query2>0)
    {
        $data = array("result"=>200);
    }
    else
    {
        $data = array("result"=>300);
    }
    
}

mysqli_close($con);
header('Content-type: application/json');
echo json_encode($data);
?>

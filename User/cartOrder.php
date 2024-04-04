<?php
include('connectdb.php');

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $user_id = $_POST["user_id"];
	$date = $_POST["date"];
    $time = $_POST["time"];
    $address = $_POST["address"];
    $payment = $_POST["payment"];
	
	$qry = "select * from cart where user_id='$user_id'";
	$qry = mysqli_query($con,$qry);
	
	while($row = mysqli_fetch_assoc($qry))
	{
		$shop_id = $row["shop_id"];
		$cake_id = $row["product_id"];
		$name_on_cake = $row["name_on_cake"];
		$qty = $row["qty"];
		$price = $row["total"];
		
		$query1 = "INSERT into cake_order(user_id,shop_id,cake_id,name_on_cake,qty,price,date,time,address,payment) values ('$user_id','$shop_id','$cake_id','$name_on_cake','$qty','$price','$date','$time','$address','$payment')";
		$query1 = mysqli_query($con,$query1);
	}

    $query2 = "DELETE FROM cart where user_id='$user_id'";
    $query2 = mysqli_query($con,$query2);

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

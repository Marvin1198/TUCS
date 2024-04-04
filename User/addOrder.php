<?php
include('connectdb.php');

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $user_id = $_POST["user_id"];
    $shop_id = $_POST["shop_id"];
    $cake_id = $_POST["cake_id"];
    $name_on_cake = $_POST["name_on_cake"];
    $price = $_POST["price"];
  	$qty = $_POST["qty"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $address = $_POST["address"];
    $payment = $_POST["payment"];

    $query1 = "INSERT into cake_order(user_id,shop_id,cake_id,name_on_cake,price,qty,date,time,address,payment) values ('$user_id','$shop_id','$cake_id','$name_on_cake','$price','$qty','$date','$time','$address','$payment')";
    $query1 = mysqli_query($con,$query1);

    if($query1>0)
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

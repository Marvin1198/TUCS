<?php
include('connectdb.php');
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $uid = $_POST["user_id"];
  	$shop_id = $_POST["shop_id"];
    $product_id = $_POST["product_id"];
  	$qty = $_POST["qty"];
  	$total = $_POST["total"];
  	$name_on_cake = $_POST["name_on_cake"];

    $query1 = "INSERT into cart(user_id,shop_id,product_id,qty,total,name_on_cake) values ('$uid','$shop_id','$product_id','$qty','$total','$name_on_cake')";
    $query1 = mysqli_query($con,$query1) or die(mysqli_error($con));

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

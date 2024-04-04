<?php
include('connectdb.php');

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $order_id = $_POST["order_id"];
    $status = $_POST["status"];

    $query2 = "UPDATE custom_order SET status='$status' where id='$order_id'";
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

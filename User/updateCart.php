<?php
include('connectdb.php');

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $cart_id = $_POST["cart_id"];
    $name_on_cake = $_POST["name_on_cake"];
    $qty = $_POST["qty"];
    $total = $_POST["total"];
    
    $query2 = "UPDATE cart SET name_on_cake='$name_on_cake',qty='$qty',total='$total' where id='$cart_id'";
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

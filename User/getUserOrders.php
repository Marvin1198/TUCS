<?php
include'connectdb.php';

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $user_id = $_POST["user_id"];
    
    $sql = "SELECT o.*,s.shop_name,s.contact,c.name,c.img from cake_order as o left join cakes as c on o.cake_id = c.id left join cake_shop as s on o.shop_id = s.id where o.user_id='$user_id' order by o.id desc";
    $result = mysqli_query($con,$sql) or die ("Query error: " . mysqli_error($con));

    $records = array("data" => array());

    while($row = mysqli_fetch_assoc($result))
    {		
        array_push($records["data"], $row);
    }
}

mysqli_close($con);
header('Content-type: application/json');
print json_encode($records);
?>


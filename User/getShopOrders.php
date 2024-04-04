<?php
include'connectdb.php';

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $shop_id = $_POST["shop_id"];
    
    $sql = "SELECT o.*,u.first_name,u.mobile,c.name,c.img from cake_order as o left join cakes as c on o.cake_id = c.id left join users as u on o.user_id = u.id where o.shop_id='$shop_id' order by o.id desc";
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


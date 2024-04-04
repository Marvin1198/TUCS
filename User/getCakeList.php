<?php
include'connectdb.php';

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $shop_id = $_POST["shop_id"];
    
    $sql = "SELECT * FROM cakes where shop_id='$shop_id' and status='1' ";
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


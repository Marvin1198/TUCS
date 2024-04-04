<?php
include'connectdb.php';

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $sql = "SELECT * FROM cake_shop";
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


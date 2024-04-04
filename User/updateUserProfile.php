<?php
include('connectdb.php');

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $mobile = $_POST["mobile"];
    $password = $_POST["password"];
    $address = $_POST["address"];

    $query2 = "UPDATE foods SET name='$name',price='$price',img='$path'where id='$cake_id'";
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

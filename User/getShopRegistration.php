<?php
include('connectdb.php');

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $shop_name = $_POST["shop_name"];
    $mobile = $_POST["contact"];
    $password = $_POST["password"];
    $address = $_POST["address"];
    $latitude = $_POST["latitude"];
    $longitude = $_POST["longitude"];
    $opening = $_POST["opening"];
    $closing = $_POST["closing"];
    $map_icon = $_POST["map_icon"];
	
    $query1 = "SELECT contact from cake_shop where contact='$mobile'";
    $query1 = mysqli_query($con,$query1)or die("Query error 1: " . mysqli_error($con));
    
    if (mysqli_num_rows($query1) > 0)
    {
        $data = array("result"=>400);
    }
    else
    {
        $query2 = "INSERT into cake_shop(shop_name,contact,password,address,latitude,longitude,opening_time,closing_time,map_icon) values ('$shop_name','$mobile','$password','$address','$latitude','$longitude','$opening','$closing','$map_icon')";
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
}

mysqli_close($con);
header('Content-type: application/json');
echo json_encode($data);
?>

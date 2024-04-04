<?php
include('connectdb.php');

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $mobile = $_POST["mobile"];
    $password = $_POST["password"];
    
    $query1 = "SELECT * FROM cake_shop where contact='$mobile' and password='$password'";
    $query1 = mysqli_query($con,$query1);
	
    if(mysqli_num_rows($query1)<=0)
    {
        $data = array("result"=>300);       
    }
    else
    {
	$result = mysqli_fetch_array($query1);
        
        if($result['status']=='0')
        {
            $data = array("result"=>400); 
        }
        else
        {
            $data = array("result" => 200, "id" => $result['id'],
                          "shop_name" => $result['shop_name'],"opening" => $result['opening_time'],
                         "closing" => $result['closing_time'],"address" => $result['address'],
                         "latitude" => $result['latitude'],"longitude" => $result['longitude']); 
        } 
    }
}

mysqli_close($con);
header('Content-type: application/json');
echo json_encode($data); 
?>
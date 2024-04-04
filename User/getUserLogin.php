<?php
include('connectdb.php');

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $mobile = $_POST["mobile"];
    $password = $_POST["password"];
    
    $query1 = "SELECT * FROM users where mobile='$mobile' and password='$password'";
    $query1 = mysqli_query($con,$query1);
	
    if(mysqli_num_rows($query1)<=0)
    {
        $data = array("result"=>300);       
    }
    else
    {
	$result = mysqli_fetch_array($query1);
        $data = array("result" => 200, "id" => $result['id'], "firstName" => $result['first_name'], "lastName" => $result['last_name'], "address" => $result['address']); 
    } 
}

mysqli_close($con);
header('Content-type: application/json');
echo json_encode($data); 
?>
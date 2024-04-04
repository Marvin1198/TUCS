<?php
include('connectdb.php');

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $mobile = $_POST["mobile"];
    $password = $_POST["password"];
    $address = $_POST["address"];
	
    $query1 = "SELECT mobile from users where mobile='$mobile'";
    $query1 = mysqli_query($con,$query1)or die("Query error 1: " . mysqli_error($con));
    
    if (mysqli_num_rows($query1) > 0)
    {
        $data = array("result"=>400);
    }
    else
    {
        $query2 = "INSERT into users(first_name,last_name,mobile,password,address) values ('$first_name','$last_name','$mobile','$password','$address')";
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

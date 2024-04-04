<?php
include('connectdb.php');

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $user_id = $_POST["user_id"];
   
    $query2 = "DELETE FROM cart where user_id='$user_id'";
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

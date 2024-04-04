<?php
include('connectdb.php');

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $uid = $_POST["uid"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $notes = mysqli_real_escape_string($con,$_POST["notes"]);

    $query1 = "INSERT into events(user_id,date,time,notes) values ('$uid','$date','$time','$notes')";
    $query1 = mysqli_query($con,$query1) or die(mysqli_error($con));

    if($query1>0)
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

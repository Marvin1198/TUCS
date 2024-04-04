<?php
include('connectdb.php');

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $user_id = $_POST["user_id"];
    $shop_id = $_POST["shop_id"];
    $name_on_cake = $_POST["name_on_cake"];
    $price = $_POST["price"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $address = $_POST["address"];
    $payment = $_POST["payment"];
	
	if(isset($_FILES["img"]))
    {
        $name= time().'_'.$_FILES["img"]["name"];
        $tmp_name=$_FILES["img"]["tmp_name"];
        $path='cakes/'.$name;
        move_uploaded_file($tmp_name,$path);
    }

    $query1 = "INSERT into custom_order(user_id,shop_id,img,name_on_cake,price,date,time,address,payment) values ('$user_id','$shop_id','$path','$name_on_cake','$price','$date','$time','$address','$payment')";
    $query1 = mysqli_query($con,$query1);

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

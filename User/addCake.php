<?php
include('connectdb.php');

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $shop_id = $_POST["shop_id"];
    $Cname = $_POST["name"];
    $price = $_POST["price"];
    $type = $_POST["type"];

    if(isset($_FILES["img"]))
    {
        $name= time().'_'.$_FILES["img"]["name"];
        $tmp_name=$_FILES["img"]["tmp_name"];
        $path='cakes/'.$name;
        move_uploaded_file($tmp_name,$path);
    }

    $query1 = "INSERT into cakes(shop_id,name,price,img,type) values ('$shop_id','$Cname','$price','$path','$type')";
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

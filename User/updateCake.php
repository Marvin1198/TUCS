<?php
include('connectdb.php');

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $cake_id = $_POST["cake_id"];
    $Cname = $_POST["name"];
    $price = $_POST["price"];
    $path = $_POST["path"];

    if(isset($_FILES["img"]))
    {
        $name= time().'_'.$_FILES["img"]["name"];
        $tmp_name=$_FILES["img"]["tmp_name"];
        $path='cakes/'.$name;
        move_uploaded_file($tmp_name,$path);
    }
    
    $query2 = "UPDATE cakes SET name='$Cname',price='$price',img='$path'where id='$cake_id'";
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

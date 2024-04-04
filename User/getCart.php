<?php
include'connectdb.php';

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $user_id = $_POST["user_id"];
    $sql = "SELECT c.*,p.name,p.price,p.img,p.type FROM cart as c left join cakes as p on c.product_id = p.id where user_id='$user_id' order by c.id desc";
    $result = mysqli_query($con,$sql) or die ("Query error: " . mysqli_error($con));
  
  	$totalQuery = "select SUM(total) as total from cart where user_id='$user_id'";
	$total = mysqli_query($con,$totalQuery) or die("Query Error" . mysqli_error($con));
	$total = mysqli_fetch_array($total);

    $records = array("data" => array());

    while($row = mysqli_fetch_assoc($result))
    {		
        array_push($records["data"], $row);
    }
  	$records['total'] = $total['total'];
}

mysqli_close($con);
header('Content-type: application/json');
print json_encode($records);
?>


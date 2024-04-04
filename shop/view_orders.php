<?php
	include 'connection.php';
    include 'session.php';
	$shop_id = $_SESSION["shop_id"];
	 $sql = "SELECT o.*,u.first_name,u.mobile,u.address as uaddress ,c.name,c.img from cake_order as o left join cakes as c on o.cake_id = c.id left join users as u on o.user_id = u.id where o.shop_id='$shop_id' order by o.id desc";
    $s = mysqli_query($con,$sql) or die ("Query error: " . mysqli_error($con));
?>
<!DOCTYPE html>
<html>
	<?php
		include 'head.php';
	?> 
    <body>
		<div class="navbar">
			<div class="navbar-inner">
				<?php include 'header.php'; ?>
			</div>
		</div>
		<div class="container-fluid-full">
			<div class="row-fluid">
				<?php include 'sidemenu.php'; ?>
				<div id="content" class="span10">
					<div class="row-fluid sortable">  
						<div class="box span12">				 
							<table id="tbl" class="table table-bordered">
								<thead>  
									<tr>
										<th>Image</th>
										<th>Cake</th>
										<th>Price</th>
										<th>Name on cake</th>
										<th>Quantity</th>
										<th>Name</th>
				                        <th>Contact</th>
				                        <th>Address</th>
										<th>Time</th>
										<th>Date</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									<?php
									while($row = mysqli_fetch_array($s))
									{?>
									<tr>
										<td>
											<img src="<?php echo "../".$row['img']; ?>" height="100px" width="100px"/>
										</td>
										<td>
											<?php echo $row['name']; ?>
										</td>
										<td>
											<?php echo "₹ ".$row['price']; ?>
										</td>
										<td>
											<?php echo $row['name_on_cake'];?>
										</td>
										<td>
											<?php echo $row['qty'];?>
										</td>
										<td>
											<?php echo $row['first_name'];?>
										</td>
										<td>
											<?php echo $row['mobile'];?>
										</td>
										<td>
											<?php echo $row['uaddress'];?>
										</td>
										<td>
											<?php echo $row['time']; ?>
										</td>
										<td>
											<?php echo $row['date']; ?>
										</td>
										<td>
											<?php if ($row['status']=='0')
											{
												echo 'pending';?>
												<div class="close1"><a href="delivered.php?cid=<?php echo $row['id'];?>"><img src="images/11.png"></a></div>

											<?php }

                                             else
                                              {
                                              	echo 'Delivered';
                                              }

                                              ?>
								
										</td>
									</tr>
												<?php
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="clearfix"></div>
		
		<?php include 'footer.php'; ?>
		<?php include 'script.php'; ?>
		
    </body>
</html>
    
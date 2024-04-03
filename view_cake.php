<?php
	include 'connection.php';
    include 'session.php';
	$shop_id = $_SESSION["shop_id"];
	

	if(isset($_GET['cid']))
	{
		$id = $_GET['cid'];
		$a = "delete from cakes where id='$id'";
		$s = mysqli_query($con,$a) or die("Query Error" . mysqli_error($con));
	}
	$a = "select * from cakes where shop_id='$shop_id' and type='cake' order by id desc";
	$s = mysqli_query($con,$a);
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
										<th>Cake Name</th>
										<th>Price</th>
										<th>Status</th>
										<th>Date</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php
									while($row = mysqli_fetch_array($s))
									{?>
									<tr>
										<td>
											<img src="<?php echo '../'.$row['img']; ?>" height="100px" width="100px"/>
										</td>
										<td>
											<?php echo $row['name']; ?>
										</td>
										<td>
											<?php echo "₹ ".$row['price']; ?>
										</td>
										<td>
											<?php if($row['status']=='1'){ echo 'Active'; }else{ echo 'Not Active';}?>  
										</td>
										<td>
											<?php echo $row['created']; ?>
										</td>
							
										<td style="width: 150px;">
										<a class="btn btn-info" href="update.php?cid=<?php echo $row['id'];?>"  onclick="return confirmdelete();">
												<i class="halflings-icon white edit"></i> 
											</a>											<strong></strong>
											<a class="btn btn-danger" href="view_cake.php?cid=<?php echo $row['id'];?>"  onclick="return confirmdelete();">
												<i class="halflings-icon white trash"></i> 
											</a>
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
    
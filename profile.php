<?php 
    include 'connection.php';
    include 'session.php';
    $shop_id = $_SESSION["shop_id"];
	$a = "select * from cake_shop where id='$shop_id'";
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
										<th>Shop Name</th>
										<th>Contact</th>
										<th>Address</th>
										<th>Opening Time</th>
										<th>Closing time</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php
									while($row = mysqli_fetch_array($s))
									{?>
									<tr>
										<td>
											<?php echo $row['shop_name']; ?>
										<td>
											<?php echo $row['contact']; ?>
										</td>
										<td>
											<?php echo $row['address']; ?>
										</td>
										<td>
										   <?php echo $row['opening_time']; ?>
										</td>
										<td>
											<?php echo $row['closing_time']; ?>
										</td>
							
										
									</tr>
									<?php
									}
									?>

								</tbody>
							</table>
							<h2>Update your details from our Android Application</h2>
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
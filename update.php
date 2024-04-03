<?php
    include 'connection.php';
    include 'session.php';

	$cname = "";    
	$price = ""; 
	$img = "";   
	$type = "";   
			
	if(isset($_GET['cid']))
	{
		    $id = $_GET['cid'];
			$query ="select * from cakes where id='$id'";
			$result = mysqli_query($con,$query) or die("Sql Error " . mysqli_error($con));
			$result = mysqli_fetch_array($result);

			$cname=$result['name'];
			$price=$result['price'];
			$img=$result['img'];
			$type=$result['type'];
		  
	}

	if (isset($_POST['submit']))
	{
		$price = $_POST['price'];
		$id = $_POST['id'];
		$type = $_POST['type'];
		
		$query ="update cakes set price='$price' where id='$id'";
		$result = mysqli_query($con,$query) or die("Sql Error " . mysqli_error($con));

		if($type=='cake'){
			echo "<script>window.location='view_cake.php?menu=cake' </script>";
		}
		else{
			echo "<script>window.location='view_decore.php?menu=decor' </script>";
		}
    }
?>
<!DOCTYPE html>
<html>
	<?php include 'head.php';?> 
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
						
							<div class="box-content">
								<form class="form-horizontal" action="update.php?menu=addProduct"  method="post" enctype="multipart/form-data">
									<div class="control-group">
										<div class="controls">
											<img src="<?php echo '../'.$img;?>" height=100 width=100/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Name</label>
										<div class="controls">
											<input type="text" name="name" value="<?php echo $cname ?>" disabled>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Price</label>	
										<div class="controls">
											<input type="text" name="price" value="<?php echo $price ?>">
											<input type="hidden" name="id" value="<?php echo $id ?>">
											<input type="hidden" name="type" value="<?php echo $type ?>">
										</div>
									</div>
									<div class="control-group">
										<div class="controls">
											<input class="btn btn-primary" type="submit" value="Update" name="submit"/>
										</div>
									</div>
								</form>  
							</div>
							
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


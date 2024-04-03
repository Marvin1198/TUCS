<?php
    include 'connection.php';
    include 'session.php';
  
	$cake_name = "";    
	$decor_name = "";    
	$cake_price = "";    
	$decor_price = "";
	$cake_img = ""; 
	$decor_img = ""; 
    
	if (isset($_POST['submit_cake']))
	{
		$cake_name = $_POST['cake_name'];
		$cake_price = $_POST['cake_price'];
		
		if(!empty($_FILES["cake_img"]["name"]))
		{
			$name = time().'_cake.jpg';
			$cake_img = "cakes/" . $name;
			$cake_img1 = "../cakes/" . $name;
			move_uploaded_file($_FILES["cake_img"]["tmp_name"], $cake_img1);
		}
		
		if (!empty($cake_img)) 
		{
			$shop_id = $_SESSION["shop_id"];
			$query = "INSERT into cakes(shop_id,name,price,img,type) values('$shop_id','$cake_name','$cake_price','$cake_img','cake')";
			$result = mysqli_query($con,$query) or die("Sql Error " . mysqli_error($con));
			if ($result) 
			{
				echo "<script>alert('Cake Uploaded Succesfully');</script>";
				echo "<script>window.location='view_cake.php?menu=cake' </script>";
			} 
			else 
			{
				echo "<script> alert('Cake Not Uploaded');</script>";
			}
		}
		else 
		{
			echo "<script> alert('Please Upload Image');</script>";
		}
	}
	
	if (isset($_POST['submit_decor']))
	{
		$decor_name = $_POST['decor_name'];
		$decor_price = $_POST['decor_price'];
		
		if(!empty($_FILES["decor_img"]["name"]))
		{
			$name = time().'_cake.jpg';
			$decor_img = "cakes/" . $name;
			$decor_img1 = "../cakes/" . $name;
			move_uploaded_file($_FILES["decor_img"]["tmp_name"], $decor_img1);
		}
		
		if (!empty($decor_img)) 
		{
			$shop_id = $_SESSION["shop_id"];
			$query = "INSERT into cakes(shop_id,name,price,img,type) values('$shop_id','$decor_name','$decor_price','$decor_img','decor')";
			$result = mysqli_query($con,$query) or die("Sql Error " . mysqli_error($con));
			if ($result) 
			{
				echo "<script>alert('decor Item Uploaded Succesfully');</script>";
				echo "<script>window.location='view_decore.php?menu=decor' </script>";
			} 
			else 
			{
				echo "<script> alert('decor Item Not Uploaded');</script>";
			}
		}
		else 
		{
			echo "<script> alert('Please Upload Image');</script>";
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
								<form class="form-horizontal" action="add_product.php?menu=addProduct"  method="post" enctype="multipart/form-data">
									<div class="control-group">
										<div class="controls">
											<input type="file" class="input-file uniform_on" id="fileInput" name="cake_img" />
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Cake Name</label>
										<div class="controls">
											<input type="text" name="cake_name" value="<?php echo $cake_name ?>" required>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Cake Price</label>	
										<div class="controls">
											<input type="text" name="cake_price" value="<?php echo $cake_price ?>" required>
										</div>
									</div>
									<div class="control-group">
										<div class="controls">
											<input class="btn btn-primary" type="submit" value="Add Cake" name="submit_cake"/>
										</div>
									</div>
								</form>  
							</div>
							
							<div class="box-content">
								<form class="form-horizontal" action="add_product.php?menu=addProduct"  method="post" enctype="multipart/form-data">
									<div class="control-group">
										<div class="controls">
											<input type="file" class="input-file uniform_on" id="fileInput" name="decor_img" />
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">decor Item Name</label>
										<div class="controls">
											<input type="text" name="decor_name" value="<?php echo $decor_name ?>" required>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">decor Item Price</label>	
										<div class="controls">
											<input type="text" name="decor_price" value="<?php echo $decor_price ?>" required>
										</div>
									</div>
									<div class="control-group">
										<div class="controls">
											<input class="btn btn-primary" type="submit" value="Add decor Item" name="submit_decor"/>
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


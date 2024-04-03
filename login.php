<?php
    include 'connection.php'; 
    if(isset($_REQUEST['submit']))
    {
		$mobile = $_POST['mobile'];
		$password = $_POST['password'];
		$a = "select * from cake_shop where contact='$mobile' and password='$password'";
		$s = mysqli_query($con,$a) or die(mysqli_error($con));
		$row = mysqli_fetch_array($s);
		if (!empty($row))
		{
			session_start();
			$_SESSION['shop_id'] = $row['id'];
			$_SESSION['shop_name'] = $row['shop_name'];
			echo "<script>window.location='Home.php?menu=home'</script>";
		} 
		else 
		{
			echo "<script>alert('Wrong Email or Password');</script>";
		}    
    }  
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Cake Shop</title>

		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
		<link id="base-style" href="css/style.css" rel="stylesheet">
		<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
		
		<link rel="shortcut icon" href="img/cake.png">
		
		<style type="text/css">
			body { background: url(img/bg.jpg) !important; }
		</style>	
	</head> 

	<body>
		<div class="container-fluid-full">
			<div class="row-fluid">	
				<div class="login-box">
					<center><img src="img/cake.png" height="175px" width="175px"/></center>
					<center><h1>LOGIN</h1></center>
					<form class="form-horizontal" action="#" method="post">
					
						<div class="input-prepend" title="Username">
							<span class="add-on"><i class="halflings-icon user"></i></span>
							<input type="text" class="input-large span10" name="mobile"  placeholder="Enter Mobile No" required />
						</div>
						<div class="clearfix"></div>

						<div class="input-prepend" title="Password">
							<span class="add-on"><i class="halflings-icon lock"></i></span>
							<input type="password" class="input-large span10" name="password"  placeholder="Enter Password" required />
						</div>
						<div class="clearfix"></div>
						
						<div class="box-content buttons"><center>
							<input type="submit" name="submit" value="Login" class="btn btn-large btn-success"/>
						</center></div>
				
						<div class="clearfix"></div>
						
					</form>
				
				</div>
			</div>
		</div>	
	</body>
</html>

<?php 
	$name = $_SESSION['shop_name'];
?>

<div class="container-fluid">
	<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</a>
	<a class="brand" href="home.php?menu=home"><span><h1 style="font-family:Forte"><b>Cake Shop</b></h1></span></a>
	<div class="nav-no-collapse header-nav">
		<ul class="nav pull-right">	
			<li class="dropdown">
				<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
					<i class="halflings-icon white user"></i> <?php echo $name ?>
					<span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
					  
					<li><a href="profile.php"><i class="halflings-icon user"></i> Profile</a></li>
					<li><a href="logout.php"><i class="halflings-icon off"></i> Logout</a></li>
				</ul>
			</li>
		</ul>   
	</div>            
</div>
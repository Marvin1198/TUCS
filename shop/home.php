<?php
    include 'connection.php';
    include 'session.php';
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
				<div id="content" class="span10" style="padding: 0px; height: 560px;">
				</div>
			</div>
		</div>
		
		<div class="clearfix"></div>
		
		<?php include 'footer.php'; ?>
		<?php include 'script.php'; ?>
		
	</body>
</html>

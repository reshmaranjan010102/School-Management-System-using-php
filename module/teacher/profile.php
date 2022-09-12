<?php
	include('header.php');
	include_once('main.php');
	include_once('../../service/mysqlcon.php');
?>
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Profile</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
<div class="container-fluid">
	<div class="row">
		<div class="col-6">
			<h3 class="border bg-info shadow rounded p-2">Profile Details:</h3><hr>
			<div class="mt-2">
				<?php
					$sql = "SELECT * FROM teachers WHERE email='$check';";
					$res = mysqli_query($link, $sql);
					while($row = mysqli_fetch_array($res)){?>
				<h6><b>Name: </b> <?php echo $row['name'];?></h6>
				<h6><b>Phone: </b> <?php echo $row['phone'];?></h6>
				<h6><b>Date of Birth: </b> <?php echo $row['dob'];?></h6>
				<h6><b>Email: </b> <?php echo $row['email'];?></h6>
				<h6><b>Sex: </b> <?php echo $row['sex'];?></h6>
				<?php } ?>
				<a href="updateProfile.php" class="btn float-right btn-success mt-3">Update Profile</a>
			</div>
		</div>
	</div>
</div>
</section>
<?php 
	include('footer.php');
?>
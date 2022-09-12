<?php
	include('header.php');
	include_once('main.php');
	include_once('../../service/mysqlcon.php');
	$name=$row['name'];
?>

<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Your Dashboard</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Dashboard</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<?php $sql = "SELECT * FROM teachers WHERE email = '$check'";
	$result = $link->query($sql);
	$row = $result->fetch_assoc();
	if (($row['status'])==3) { 
?>
<section class="content">
	<?php if(isset($_REQUEST['action1'])){?>
		<div class="card col-9 mx-auto">
			<div class="card-header py-2">
				<h3 class="card-title">
					Students
				</h3>
			</div>
			<div class="card-body">
				<div class="table-responsive bg-white">
					<table class="table table-bordered">
						<tr>
							<th>S.No.</th>
							<th>Name</th>
							<th>Gender</th>
							<th>Email</th>
							<th>Father's Name</th>
							<th>Father's email</th>
							<th>Phone no.</th>
							<th>Address</th>
						</tr>
						<?php
						$sql = "SELECT * FROM classes WHERE classteacher='$name'";
						$result = $link->query($sql);
						$row2 = $result->fetch_assoc();
						$class=$row2['class'];
						$count = 1;
						$class_query = mysqli_query($link, "SELECT * FROM admissionform where class='$class'");
						while ($class2 = mysqli_fetch_object($class_query)) {
						?>
						<tr>
							<td><?=$count++?></td>
							<td><?=$class2->name?></td>
							<td><?=$class2->sex?></td>
							<td><?=$class2->email?></td>
							<td><?=$class2->fname?></td>
							<td><?=$class2->femail?></td>
							<td><?=$class2->mob1?></td>
							<td><?=$class2->address?></td>
						</tr>
						<?php } ?>
					</table>
				</div>
			</div>
		</div>
	<?php } else { ?>
		<div class="container-fluid">
			<!-- Info boxes -->
			<div class="row">
				<div class="col-3">
					<div class="info-box">
						<?php
							$sql = "SELECT * FROM classes WHERE classteacher='$name'";
							$result = $link->query($sql);
							$row2 = $result->fetch_assoc();
						?>
						<span class="info-box-icon bg-info elevation-1"><i class="fas fa-graduation-cap"></i></span>
						<div class="info-box-content">
							<span class="info-box-text">Class assigned</span>
							<?php $c=mysqli_num_rows($result);
							if ($c >0){?>
							<span class="info-box-number"><?php echo $row2['class'] ?></span>
							<?php } else {?>
								<span class='info-box-number'>Not a class Teacher</span>
							<?php }?>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->
				<div class="col-3">
					<?php
						if ($c >0){
							$class=$row2['class'];
							$query = "SELECT * FROM students where classid='$class'"; 
							$result = mysqli_query($link, $query); 
							if ($result) 
							{ 
								$row_no_users = mysqli_num_rows($result);       
							}?>
							<a href="?action1">
								<div class="info-box mb-3">
									<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>
									<div class="info-box-content">
										<span class="info-box-text">Total Students</span>
									<?php if ($c>0){?>
									<span class="info-box-number"><?=$row_no_users;?></span>
									<?php } else {?>
										<span class='info-box-number'>0</span>
									<?php }?>
									</div>
									<!-- /.info-box-content -->
								</div>
							</a>
						<?php } else {}?>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
	<?php } ?>
</section>

<?php } else { ?>
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
<?php } 
	include('footer.php');
?>
<?php
	include_once('main.php');
	include('header.php');
	$sql = "SELECT * FROM students WHERE email = '$check'";
	$result = $link->query($sql);
	$row = $result->fetch_assoc();
	if (($row['status'])==((1))) {
		$email1=$row['email'];
?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
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

    <!-- Main content -->
	<div class="card m-4">
		<div class="card-header bg-info">
			<h3 class="text-light">Student Profile</h3>
			<h6 class="text-light">View profile</h6>
		</div>
		<div class="card-body">
			<h2 class="font-weight-bold d-inline-block"><?=$row['name'];?></h2>
			<a href="myreport.php" class="btn btn-warning float-right">View Report</a>
			<a href="updateprofile.php" class="btn btn-info float-right mr-3"><i class="fa fa-paste"></i> Update</a>
			<div class="d-flex justify-content-between mt-3">	
				<div class="border rounded border-muted p-3" style="height:250px; width:435px;">
					<h5 class="text-muted">Personal Details :</h5>
					<h6><b>Phone: </b> <?=$row['phone'];?></h6>
					<h6><b>Email: </b> <?=$email1;?></h6>
					<h6><b>Gender: </b> <?=$row['sex'];?></h6>
					<h6><b>Date of birth: </b> <?=$row['dob'];?></h6>
					<h6><b>Address: </b> <?=$row['address'];?></h6>
				</div>
				<div class="border rounded border-muted p-3" style="height:250px; width:435px;">
					<h5 class="text-muted">Class Details :</h5>
					<h6><b>Class : </b><?=$row['classid'];?></h6>
					<h6><b>Class Teacher : </b></h6> 
					<h6><b>Roll no. : </b></h6>
					<h6><b>Attendance :<b>
					<?php 
						$sq = mysqli_query($link, "SELECT * FROM studentattendance where email='$email1' and status= '1';"); 
						if ($sq) 
						{ 
							$row_no_users = mysqli_num_rows($sq);       
						}
						?>
					<?=$row_no_users;?> days <a href="attendance.php" class="btn btn-sm btn-info">View<a></h6>
				</div>
			</div>
		</div>
	</div>
<?php } else { ?>
	<div class="card m-4" style="height:400px;">
	<div class="card-header bg-info">
		<h3 class="text-light">Student Profile</h3>
		<h6 class="text-light">View profile</h6>
	</div>
	<div class="card-body">
		<img class="mr-3" src="./images/<?=$check.".jpg";?>" height="95" width="95"/>
		<h2 class="font-weight-bold d-inline-block"><?=$row['name'];?></h2>
		<div class="d-flex justify-content-between mt-3">	
			<div class="border rounded border-muted p-3" style="height:130px; width:435px;">
				<h5 class="text-muted">Personal Details :</h5>
				<h6><b>Email: </b> <?=$row['email'];?></h6>
			</div>
			<div class="border rounded border-muted p-3" style="height:130px; width:435px;">
				<h5 class="text-muted">Admission Details :</h5>
				<h6><b>Admission status: 
					<?php 
						$sql = "SELECT * FROM admissionform WHERE email = '$check'";
						$result = $link->query($sql);
						$row1 = $result->fetch_assoc();
						if (($row1['status'])== 2) {
					?>
                        <span class="badge badge-success">Admitted</span>
						<span class="badge badge-success">Admission leter sent</span>
					<?php } else {?>
                        <span class="badge badge-danger">Not Admitted</span>
                    <?php } ?> </b>
				</h6>
			</div>
		</div>
	</div>
<?php } ?>
<?php include('footer.php');?>


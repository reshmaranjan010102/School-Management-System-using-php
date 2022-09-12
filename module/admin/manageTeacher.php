<?php
	include('header.php');
	include_once('../../service/mysqlcon.php');
	include('main.php');
?>
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Manage Teachers</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="index.php">Home</a></li>
					<li class="breadcrumb-item"><a href="#">Manage users</a></li>
					<li class="breadcrumb-item active">Teachers</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
	<div class="row">
    	<div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3">
                  	<h5 class="font-weight-bold d-inline-block text-primary">All Teachers</h5>
					<a href="addTeacher.php" class="btn btn-success mr-4 float-right btn-sm">
						<i class="fa fa-plus"> Add New</i>
					</a>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                  	    <thead class="thead-light">
						    <tr>
								<th>ID</th>
								<th>Name</th>
								<th>DOB</th>
								<th>Phone</th>
								<th>Email</th>
								<th>Address</th>
								<th>Gender</th>
								<th>Subject</th>
								<th>Hire Date</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
            				<?php
								$res= mysqli_query($link, "SELECT * FROM Teachers where status='3';");
								$c=1;
								while($row = mysqli_fetch_array($res)){ ?>
									<tr>
										<td><?=$c++;?></td>
										<td><?=$row['name'];?></td>
										<td><?=$row['dob'];?></td>
										<td><?=$row['phone'];?></td>
										<td><?=$row['email'];?></td>
										<td><?=$row['address'];?></td>
										<td><?=$row['sex'];?></td>
										<td><?=$row['subject'];?></td>
										<td><?=$row['hiredate'];?></td>
										<td><a href="?action=<?=$row['email'];?>"><i class="fas fa-fw fa-trash"></i></a></td>
									</tr>
								<?php } ?>
						</tbody>
					</table>
                </div>
            </div>
        </div>
    </div>
</section>
<?php 
	if(isset($_REQUEST['action'])){
		$id = $_GET['action'];
		$sql = "DELETE FROM teachers WHERE email = '$id';";
		$success = mysqli_query($link, $sql);
		$sql = "DELETE FROM users WHERE userid = '$id';";
		$success = mysqli_query($link, $sql);
		if(!$success) {
			die('Could not Delete data: '.mysqli_error());
		}
		echo "Delete data successfully\n";
	} 
	include("footer.php");
?>
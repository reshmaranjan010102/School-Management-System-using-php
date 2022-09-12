<?php
	include_once('main.php');
	include('header.php');
	$sql = "SELECT * FROM teachers WHERE email = '$check'";
	$result = $link->query($sql);
	$row = $result->fetch_assoc();
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Update Profile</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
	<div class="container">
		<div class="row">
			<div class="border rounded bg-white col-8 mx-auto my-2">
				<h4 class="px-3 pt-3">Profile Details</h4><hr>
				<form  action="" method="POST">
					<div class="container">
						<div class="row mb-2">
							<label class="col-3" for="name">Name:<sup class=text-danger>*</sup></label>
							<input type="text" name="name" class="col-9 form-control" value="<?php echo$row['name'];?>">
						</div>
						<div class="row mb-2">
							<label class="col-3" for="dob">Date of Birth :<sup class=text-danger>*</sup></label>
                            <input type="date" name="dob" class="col-9 form-control">
						</div>
						<div class="row mb-2">
							<label class="col-3" for="email">Email :<sup class=text-danger>*</sup></label>
							<input type="email" id="email" name="email" class="col-9 form-control" value="<?php echo$row['email'];?>" readonly/>
						</div>
						<div class="row mb-2">
							<b class=mx-2>Gender :<sup class=text-danger>*</sup></b> 
							<div class="form-check form-check-inline" style="margin-left:80px;">
								<input class="form-check-input" type="radio" name="sex" value="female" />
								<label class="form-check-label" for="female">Female</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="sex" value="male" />
								<label class="form-check-label" for="male">Male</label>
							</div>
						</div>
						<div class="row mb-2">
							<label class="col-3" for="mob1">Mobile. no (1) :<sup class=text-danger>*</sup></label>
							<input type="tel" id="myform_phone" class="col-9 form-control" name="mob1" pattern="[0-9]{10}" required/>
						</div>
						<div class="row mb-2">
							<label class="col-3" for="address">Address :<sup class=text-danger>*</sup></label>
							<input type="text" name="address" class="col-9 form-control" value="<?php echo$row['address'];?>" />
						</div>
						<input class="btn btn-success float-right mb-3" name="submit" type="submit"/>
					</div>
				</form>
			</div>
		</div>
	</div>
    <?php
	if (isset($_POST['submit'])) 
	{
        $name = $_POST['name'];
		$dob = $_POST['dob'];
		$email = $_POST['email'];
		$sex = $_POST['sex'];
		$address = $_POST['address'];
		$mob1 = $_POST['mob1'];
		mysqli_query($link, "UPDATE teachers set name='$name', dob='$dob', sex='$sex', address='$address', phone='$mob1' where email='$email';");
		echo '<script>alert("Profile Updated Successfully.")</script>'; ?>
	<h4><b class="text-success mb-4 mr-4">Profile updated successfully..!</b></h4>
	<a href="profile.php" class="btn btn-success mb-4">Go Back</a> <?php }?>
</section>

<script type="text/javascript" src="../../javascript/applyformvalidation.js"></script>
<?php include('footer.php');?>
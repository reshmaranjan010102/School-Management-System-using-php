<?php include("header.php"); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Manage Examination Schedules</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Examination</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
	<div class="container">
		<div class="row">
			<?php $exam_query = mysqli_query($link, "SELECT * FROM examtype");
				while($exam = mysqli_fetch_object($exam_query)){?>
					<div class="col-3 border rounded bg-danger m-4 px-4 pt-4 pb-2 shadow">
						<h5><?=$exam->examtype;?></h5>
						<a href="?action=<?=$exam->examtype;?>" class="btn btn-success btn-sm mt-4">View</a>
						<a href="?action1=<?=$exam->examtype;?>" class="btn btn-success btn-sm mt-4">Update</a>
					</div>
			<?php } ?>
		</div>
		<div class="row my-4 mx-auto">
			<?php if(isset($_REQUEST['action'])){
				$id = $_GET['action'];
				if (isset($_POST['send'])){
					mysqli_query($link, "INSERT INTO status (status, name) VALUES ('1', 'examschedule')");
				} ?>
				<div class="col-11 card">
					<div class="card-header py-2">
						<h3 class="card-title"><?=$id;?> Examination TimeTable</h3>
						<div class="card-tools">
							<form action="" method='POST'>
								<button name="send" class="btn btn-success btn-xs">Send notice</button>
							</form>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive bg-white">
							<table class="table table-bordered">
								<tr>
									<th>Date</th><th>Day</th><th>Timings</th><th>I</th><th>II</th><th>III</th><th>IV</th><th>V</th><th>VI</th><th>VII</th><th>VIII</th>
								</tr>
									<?php
										$count = 1;
										$ex_query = "SELECT * FROM exam_schedule where examname='$id'";
										$query = mysqli_query($link, $ex_query);
										while ($exam = mysqli_fetch_object($query)) {      
									?>
								<tr>
									<td><?=$exam->exam_date?></td>
									<td><?=$exam->exam_day?></td>
									<td><?=$exam->exam_time?></td>
									<td><?=$exam->class1?></td>
									<td><?=$exam->class2?></td>
									<td><?=$exam->class3?></td>
									<td><?=$exam->class4?></td>
									<td><?=$exam->class5?></td>
									<td><?=$exam->class6?></td>
									<td><?=$exam->class7?></td>
									<td><?=$exam->class8?></td>
								</tr>
								<?php }?>
							</table>
						</div>
					</div>
				</div>
			<?php }
			if(isset($_REQUEST['action1'])){ 
				$id= $_GET['action1'];?>
				<div class="col-11 card">
					<div class="card-header py-2">
						<h3 class="card-title">Update <?=$id;?> Examination TimeTable</h3>
					</div>
					<div class="card-body">
						<?php
							if (isset($_POST['submit'])){
								$date = $_POST['date'];
								$nameOfDay = date('D', strtotime($date));
								$time = $_POST['time'];
								$class1 = $_POST['class1'];
								$class2 = $_POST['class2'];
								$class3 = $_POST['class3'];
								$class4 = $_POST['class4'];
								$class5 = $_POST['class5'];
								$class6 = $_POST['class6'];
								$class7 = $_POST['class7'];
								$class8 = $_POST['class8'];
								$result2 = mysqli_query($link, "SELECT * FROM exam_schedule where exam_date='$date'");
								$num_rows = mysqli_num_rows($result2);
								if ($num_rows > 0) {
									$query="UPDATE exam_schedule set exam_date='$date', exam_day='$nameOfDay', exam_time='$time', class1='$class1', class2='$class2', class3='$class3', class4='$class4', class5='$class5', class6='$class6', class7='$class7', class8='$class8' , examname='$id' where exam_date='$date'";  
									mysqli_query($link, $query);
								}
								else {
									$query="INSERT INTO exam_schedule (examname, exam_date, exam_day, exam_time, class1, class2, class3, class4, class5, class6, class7, class8) VALUES ('$id', '$date', '$nameOfDay', '$time', '$class1', '$class2', '$class3', '$class4', '$class5', '$class6', '$class7', '$class8')";  
									mysqli_query($link, $query);
								}
							}
						?>
						<form action="" method="POST">
							<div class="container-fluid">
								<div class="row">
									<div class="md-form mb-3 col-2">
										<label for="date">Date :<sup class=text-danger>*</sup></label>
										<input type="date" name="date" class="form-control" required>
									</div>
									<div class="md-form mb-3 col-2">
										<label for="time">Timing :<sup class=text-danger>*</sup></label>
										<input type="time" name="time" class="form-control" required>
									</div>
									<div class="md-form mb-3 col-2">
										<?php $sub_query = mysqli_query($link, "SELECT * FROM classes where class = 'class1'");
										$sub = mysqli_fetch_object($sub_query);
										$subjects = explode(',', $sub->subjects);?>
										<label for="class1">class1 :<sup class=text-danger>*</sup></label>
										<select class="custom-select" name="class1">
											<option selected>-</option>
											<?php
												foreach ($subjects as $subject) {
												$sub_query2 = mysqli_query($link, 'SELECT * FROM subjects WHERE id = '.$subject.'');
												$subject_value = mysqli_fetch_object($sub_query2); ?>
											<option value="<?php echo $subject_value->title; ?>"><?php echo $subject_value->title; ?></option>
										<?php } ?>
										</select>
									</div>
									<div class="md-form mb-3 col-2">
										<?php $sub_query = mysqli_query($link, "SELECT * FROM classes where class = 'class2'");
										$sub = mysqli_fetch_object($sub_query);
										$subjects = explode(',', $sub->subjects);?>
										<label for="class2">class2 :<sup class=text-danger>*</sup></label>
										<select class="custom-select" name="class2">
											<option selected>-</option>
											<?php
												foreach ($subjects as $subject) {
												$sub_query2 = mysqli_query($link, 'SELECT * FROM subjects WHERE id = '.$subject.'');
												$subject_value = mysqli_fetch_object($sub_query2); ?>
											<option value="<?php echo $subject_value->title; ?>"><?php echo $subject_value->title; ?></option>
										<?php } ?>
										</select>
									</div>
									<div class="md-form mb-3 col-2">
										<?php $sub_query = mysqli_query($link, "SELECT * FROM classes where class = 'class3'");
										$sub = mysqli_fetch_object($sub_query);
										$subjects = explode(',', $sub->subjects);?>
										<label for="class3">class3 :<sup class=text-danger>*</sup></label>
										<select class="custom-select" name="class3">
											<option selected>-</option>
											<?php
												foreach ($subjects as $subject) {
												$sub_query2 = mysqli_query($link, 'SELECT * FROM subjects WHERE id = '.$subject.'');
												$subject_value = mysqli_fetch_object($sub_query2); ?>
											<option value="<?php echo $subject_value->title; ?>"><?php echo $subject_value->title; ?></option>
										<?php } ?>
										</select>
									</div>
									<div class="md-form mb-3 col-2">
										<?php $sub_query = mysqli_query($link, "SELECT * FROM classes where class = 'class4'");
										$sub = mysqli_fetch_object($sub_query);
										$subjects = explode(',', $sub->subjects);?>
										<label for="class4">class4 :<sup class=text-danger>*</sup></label>
										<select class="custom-select" name="class4">
											<option selected>-</option>
											<?php
												foreach ($subjects as $subject) {
												$sub_query2 = mysqli_query($link, 'SELECT * FROM subjects WHERE id = '.$subject.'');
												$subject_value = mysqli_fetch_object($sub_query2); ?>
											<option value="<?php echo $subject_value->title; ?>"><?php echo $subject_value->title; ?></option>
										<?php } ?>
										</select>
									</div>
									<div class="md-form mb-3 col-2">
										<?php $sub_query = mysqli_query($link, "SELECT * FROM classes where class = 'class5'");
										$sub = mysqli_fetch_object($sub_query);
										$subjects = explode(',', $sub->subjects);?>
										<label for="class5">class5 :<sup class=text-danger>*</sup></label>
										<select class="custom-select" name="class5">
											<option selected>-</option>
											<?php
												foreach ($subjects as $subject) {
												$sub_query2 = mysqli_query($link, 'SELECT * FROM subjects WHERE id = '.$subject.'');
												$subject_value = mysqli_fetch_object($sub_query2); ?>
											<option value="<?php echo $subject_value->title; ?>"><?php echo $subject_value->title; ?></option>
										<?php } ?>
										</select>
									</div>
									<div class="md-form mb-3 col-2">
										<?php $sub_query = mysqli_query($link, "SELECT * FROM classes where class = 'class6'");
										$sub = mysqli_fetch_object($sub_query);
										$subjects = explode(',', $sub->subjects);?>
										<label for="class6">class6 :<sup class=text-danger>*</sup></label>
										<select class="custom-select" name="class6">
											<option selected>-</option>
											<?php
												foreach ($subjects as $subject) {
												$sub_query2 = mysqli_query($link, 'SELECT * FROM subjects WHERE id = '.$subject.'');
												$subject_value = mysqli_fetch_object($sub_query2); ?>
											<option value="<?php echo $subject_value->title; ?>"><?php echo $subject_value->title; ?></option>
										<?php } ?>
										</select>
									</div>
									<div class="md-form mb-3 col-2">
										<?php $sub_query = mysqli_query($link, "SELECT * FROM classes where class = 'class7'");
										$sub = mysqli_fetch_object($sub_query);
										$subjects = explode(',', $sub->subjects);?>
										<label for="class7">class7 :<sup class=text-danger>*</sup></label>
										<select class="custom-select" name="class7">
											<option selected>-</option>
											<?php
												foreach ($subjects as $subject) {
												$sub_query2 = mysqli_query($link, 'SELECT * FROM subjects WHERE id = '.$subject.'');
												$subject_value = mysqli_fetch_object($sub_query2); ?>
											<option value="<?php echo $subject_value->title; ?>"><?php echo $subject_value->title; ?></option>
										<?php } ?>
										</select>
									</div>
									<div class="md-form mb-3 col-2">
										<?php $sub_query = mysqli_query($link, "SELECT * FROM classes where class = 'class8'");
										$sub = mysqli_fetch_object($sub_query);
										$subjects = explode(',', $sub->subjects);?>
										<label for="class8">class8 :<sup class=text-danger>*</sup></label>
										<select class="custom-select" name="class8">
											<option selected>-</option>
											<?php
												foreach ($subjects as $subject) {
												$sub_query2 = mysqli_query($link, 'SELECT * FROM subjects WHERE id = '.$subject.'');
												$subject_value = mysqli_fetch_object($sub_query2); ?>
											<option value="<?php echo $subject_value->title; ?>"><?php echo $subject_value->title; ?></option>
										<?php } ?>
										</select>
									</div>
								</div>
							</div>
							<button type="submit" name="submit" class="btn btn-success float-right mt-3">Update</button>
						</form>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>
<?php include("footer.php");?>

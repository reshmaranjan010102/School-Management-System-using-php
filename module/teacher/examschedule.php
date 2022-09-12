<?php
	include("header.php");
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Exam Schedules</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Exam Schedule</li>
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
					</div>
			<?php } ?>
		</div>
		<div class="row my-4 mx-auto">
			<?php if(isset($_REQUEST['action'])){
				$id = $_GET['action']; ?>
				<div class="col-11 card">
					<div class="card-header py-2">
						<h3 class="card-title"><?=$id;?> Examination TimeTable</h3>
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
			<?php } ?>
		</div>
	</div>
</section>
<?php include("footer.php");?>

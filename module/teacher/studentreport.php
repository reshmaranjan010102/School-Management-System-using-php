<?php
	include('header.php');
	$name=$row['name'];
?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
		<div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Manage Reports</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Student Reports</li>
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
            <?php if(isset($_REQUEST['semail'])) {
                $class = @$_GET['class'];
                $email = $_GET['semail'];
                $name = @$_GET['sname'];?>
                <h3 class="text-info"><b>Class Test</b></h3>
                <div class="card col-10 mx-auto">
                    <div class="card-header">
                        <h5 class="card-title"><b><?=$name;?></b></h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="table-responsive col-10 mx-auto">
                                <table class="table table-striped title1">
                                    <tr class="text-danger">
                                        <th>S.no.</th>
                                        <th>Subject</th>
                                        <th>Obtained / Total marks</th>
                                        <th>Percentage (%)</th>
                                        <th>Grade</th>
                                    </tr>
                                    <?php
                                        $query = "SELECT students.name, exams.subject, exams.total, exams.posmark, history.score, history.email FROM students JOIN history ON students.email = history.email JOIN exams ON exams.id = history.eid WHERE exams.examname='Class Test' and students.classid = '$class' and history.email = '$email';";
                                        $result = mysqli_query($link, $query);
                                        $rows = mysqli_num_rows($result);
                                        if($rows>= '1'){
                                            $c=1;
                                            $total=0;
                                            $totalscore=0;
                                            while($row = mysqli_fetch_array($result)){
                                                $total=$total+$row['score'];
                                                $totalscore=$totalscore+($row['total']*$row['posmark']);?>
                                                <tr>
                                                    <td><?=$c++;?></td>
                                                    <td><?=$row['subject'];?></td>
                                                    <td><?=$row['score'];?> / <?=$row['total']*$row['posmark'];?></td>
                                                    <?php if(($row['score']/($row['total']*$row['posmark']))*100 >=90){
                                                        $percentage = ($row['score']/($row['total']*$row['posmark']))*100;
                                                        $grade = 'A+';
                                                    } elseif(($row['score']/($row['total']*$row['posmark']))*100 >=80){ 
                                                        $percentage = ($row['score']/($row['total']*$row['posmark']))*100;
                                                        $grade = 'A';
                                                    } elseif(($row['score']/($row['total']*$row['posmark']))*100 >=60){ 
                                                        $percentage = ($row['score']/($row['total']*$row['posmark']))*100;
                                                        $grade = 'B';
                                                    } elseif(($row['score']/($row['total']*$row['posmark']))*100 >=40){ 
                                                        $percentage = ($row['score']/($row['total']*$row['posmark']))*100;
                                                        $grade = 'C';
                                                    } elseif(($row['score']/($row['total']*$row['posmark']))*100 >=30){ 
                                                        $percentage = ($row['score']/($row['total']*$row['posmark']))*100;
                                                        $grade = 'D';
                                                    } else { 
                                                        $percentage = ($row['score']/($row['total']*$row['posmark']))*100;
                                                        $grade = 'F'; 
                                                    } ?>
                                                    <td><?=$percentage;?></td>
                                                    <td><?=$grade;?></td>
                                                </tr>
                                                <?php }?>
                                                <tr>
                                                    <td colspan='2'><b>Total:</b> <?=$total;?> / <?=$totalscore;?></td>
                                                    <td colspan='2'><b>Percentage:</b> <?=($total/$totalscore)*100;?> %</td>
                                                    <td><a href="?action=remarks&name=<?=$name;?>&email=<?=$email;?>&percentage=<?=($total/$totalscore)*100;?>" class="btn btn-info">Write here</a></td>
                                                </tr>
                                        <?php } else { ?>
                                            <h5 class="text-danger m-2"><b>No records found...</b></h5>
                                        <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <h3 class="text-info"><b>Half Yearly Examinations</b></h3>
                <div class="card col-10 mx-auto">
                    <div class="card-header">
                        <h5 class="card-title"><b><?=$name;?></b></h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="table-responsive col-10 mx-auto">
                                <table class="table table-striped title1">
                                    <tr class="text-danger">
                                        <th>S.no.</th>
                                        <th>Subject</th>
                                        <th>Obtained / Total marks</th>
                                        <th>Percentage (%)</th>
                                        <th>Grade</th>
                                    </tr>
                                    <?php
                                        $query = "SELECT exams.subject, exams.total, exams.posmark, history.score, history.email FROM students JOIN history ON students.email = history.email JOIN exams ON exams.id = history.eid WHERE exams.examname='Half Yearly Examination' and students.classid = '$class' and history.email = '$email';";
                                        $result = mysqli_query($link, $query);
                                        $rows = mysqli_num_rows($result);
                                        if($rows>= '1'){
                                            $c=1;
                                            $total=0;
                                            $totalscore=0;
                                            while($row = mysqli_fetch_array($result)){
                                                $total=$total+$row['score'];
                                                $totalscore=$totalscore+($row['total']*$row['posmark']);?>
                                                <tr>
                                                    <td><?=$c++;?></td>
                                                    <td><?=$row['subject'];?></td>
                                                    <td><?=$row['score'];?> / <?=$row['total']*$row['posmark'];?></td>
                                                    <?php if(($row['score']/($row['total']*$row['posmark']))*100 >=90){
                                                        $percentage = ($row['score']/($row['total']*$row['posmark']))*100;
                                                        $grade = 'A+';
                                                    } elseif(($row['score']/($row['total']*$row['posmark']))*100 >=80){ 
                                                        $percentage = ($row['score']/($row['total']*$row['posmark']))*100;
                                                        $grade = 'A';
                                                    } elseif(($row['score']/($row['total']*$row['posmark']))*100 >=60){ 
                                                        $percentage = ($row['score']/($row['total']*$row['posmark']))*100;
                                                        $grade = 'B';
                                                    } elseif(($row['score']/($row['total']*$row['posmark']))*100 >=40){ 
                                                        $percentage = ($row['score']/($row['total']*$row['posmark']))*100;
                                                        $grade = 'C';
                                                    } elseif(($row['score']/($row['total']*$row['posmark']))*100 >=30){ 
                                                        $percentage = ($row['score']/($row['total']*$row['posmark']))*100;
                                                        $grade = 'D';
                                                    } else { 
                                                        $percentage = ($row['score']/($row['total']*$row['posmark']))*100;
                                                        $grade = 'F'; 
                                                    } ?>
                                                    <td><?=$percentage;?></td>
                                                    <td><?=$grade;?></td>
                                                </tr>
                                                <?php }?>
                                                <tr>
                                                    <td colspan='2'><b>Total:</b> <?=$total;?> / <?=$totalscore;?></td>
                                                    <td colspan='2'><b>Percentage:</b> <?=($total/$totalscore)*100;?> %</td>
                                                    <td><a href="?action=remarks&name=<?=$name;?>&email=<?=$email;?>&percentage=<?=($total/$totalscore)*100;?>" class="btn btn-info">Write here</a></td>
                                                </tr>
                                        <?php } else { ?>
                                            <h5 class="text-danger m-2"><b>No records found...</b></h5>
                                        <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <h3 class="text-info"><b>Final Examinations</b></h3>
                <div class="card col-10 mx-auto">
                    <div class="card-header">
                        <h5 class="card-title"><b><?=$name;?></b></h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="table-responsive col-10 mx-auto">
                                <table class="table table-striped title1">
                                    <tr class="text-danger">
                                        <th>S.no.</th>
                                        <th>Subject</th>
                                        <th>Obtained / Total marks</th>
                                        <th>Percentage (%)</th>
                                        <th>Grade</th>
                                    </tr>
                                    <?php
                                        $query = "SELECT students.name, exams.subject, exams.total, exams.posmark, history.score, history.email FROM students JOIN history ON students.email = history.email JOIN exams ON exams.id = history.eid WHERE exams.examname='Final Examination' and students.classid = '$class' and history.email = '$email';";
                                        $result = mysqli_query($link, $query);
                                        $rows = mysqli_num_rows($result);
                                        if($rows>= '1'){
                                            $c=1;
                                            $total=0;
                                            $totalscore=0;
                                            while($row = mysqli_fetch_array($result)){
                                                $total=$total+$row['score'];
                                                $totalscore=$totalscore+($row['total']*$row['posmark']);?>
                                                <tr>
                                                    <td><?=$c++;?></td>
                                                    <td><?=$row['subject'];?></td>
                                                    <td><?=$row['score'];?> / <?=$row['total']*$row['posmark'];?></td>
                                                    <?php if(($row['score']/($row['total']*$row['posmark']))*100 >=90){
                                                        $percentage = ($row['score']/($row['total']*$row['posmark']))*100;
                                                        $grade = 'A+';
                                                    } elseif(($row['score']/($row['total']*$row['posmark']))*100 >=80){ 
                                                        $percentage = ($row['score']/($row['total']*$row['posmark']))*100;
                                                        $grade = 'A';
                                                    } elseif(($row['score']/($row['total']*$row['posmark']))*100 >=60){ 
                                                        $percentage = ($row['score']/($row['total']*$row['posmark']))*100;
                                                        $grade = 'B';
                                                    } elseif(($row['score']/($row['total']*$row['posmark']))*100 >=40){ 
                                                        $percentage = ($row['score']/($row['total']*$row['posmark']))*100;
                                                        $grade = 'C';
                                                    } elseif(($row['score']/($row['total']*$row['posmark']))*100 >=30){ 
                                                        $percentage = ($row['score']/($row['total']*$row['posmark']))*100;
                                                        $grade = 'D';
                                                    } else { 
                                                        $percentage = ($row['score']/($row['total']*$row['posmark']))*100;
                                                        $grade = 'F'; 
                                                    } ?>
                                                    <td><?=$percentage;?></td>
                                                    <td><?=$grade;?></td>
                                                </tr>
                                                <?php }?>
                                                <tr>
                                                    <td colspan='2'><b>Total:</b> <?=$total;?> / <?=$totalscore;?></td>
                                                    <td colspan='2'><b>Percentage:</b> <?=($total/$totalscore)*100;?> %</td>
                                                    <td><a href="?action=remarks&name=<?=$name;?>&email=<?=$email;?>&percentage=<?=($total/$totalscore)*100;?>" class="btn btn-info">Write here</a></td>
                                                </tr>
                                        <?php } else { ?>
                                            <h5 class="text-danger m-2"><b>No records found...</b></h5>
                                        <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } elseif(@$_GET['action']== 'remarks') { 
                    $name = @$_GET['name'];
                    $email = @$_GET['email'];
                    $percentage = @$_GET['percentage'];?>
                    <div class="container">
                        <div class="row">
                            <div class="col-8 mx-auto">
                                <div class="border rounded border-info p-3">
                                    <form action="" method="POST">
                                        <h4 class="text-info mx-auto"><b><?=$name;?></b></h4><hr>
                                        <div class="row">
                                            <div class="form-group col-4">
                                                <label for="email">Email :</label>  
                                                <input type="text" name="email" value="<?=$email;?>" placeholder="<?=$email;?>" readonly/>
                                            </div>   
                                            <div class="form-group col-4">
                                                <label>$percentage :</label>  
                                                <input value="<?=$percentage;?>" placeholder="<?=$percentage;?>" readonly/>
                                            </div>
                                        </div>
                                        <div class="form-group col-12">
                                            <label class="control-label" for="remarks">Remarks :</label>  
                                            <textarea rows="2" cols="8" name="remarks" class="form-control" placeholder="Write remarks here..."></textarea>  
                                        </div>
                                        <input  type="submit" name="submit" class="mx-2 btn btn-primary" value="Submit" class="btn btn-primary"/>                                        
                                    </form>
                                    <?php
                                        if (isset($_POST['submit'])) 
                                        {
                                            $email = $_POST['email'];
                                            $remarks = $_POST['remarks'];
                                            mysqli_query($link, "INSERT INTO remarks (email, remarks) VALUES ('$email','$remarks');");
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php } elseif(isset($_REQUEST['class'])){?>
                <div class="card col-10 mx-auto">
                    <div class="card-header">
                        <h5 class="card-title">Students Results</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped title1">
                                <tr>
                                    <th>S.no.</th>
                                    <th>Student Name</th>
                                    <th>Result</th>
                                </tr>
                                <?php $id = $_GET['class']; 
                                $students = mysqli_query($link, "SELECT * FROM students where classid = '$id'");
                                $c = 1;
                                while($stu = mysqli_fetch_object($students)){ ?>
                                <tr>
                                    <td><?=$c++;?></td>
                                    <td><?=$stu->name;?></td>
                                    <td><a href="?sname=<?=$stu->name;?>&semail=<?=$stu->email;?>&class=<?=$id;?>"><h4 class="col-5 mx-auto px-4 border rounded bg-info">View</h4></a></td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            <?php } else {
                    $class_query = mysqli_query($link, 'SELECT * FROM classes');
                    while ($class = mysqli_fetch_object($class_query)) {  ?>
                    <a href="?class=<?php echo $class->class;?>" name ="view" class="p-3 col-2 m-2 btn btn-success"><h2><?php echo $class->class;?></h2></a>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</section>
<?php include('footer.php');?>
<?php
include_once('main.php');
include('header.php');?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">View Reports</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Report</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container">
        <h3 class="text-info"><b>Half Yearly Examinations</b></h3>
        <div class="row">
            <?php
                $query = "SELECT history.score, history.posmarks, history.negmarks, exams.subject, exams.total, exams.posmark, exams.negmark, history.email FROM history, exams where exams.id = history.eid and exams.examname = 'Half Yearly Examination' and history.email='$check';";
                $result = mysqli_query($link, $query);
                $rows = mysqli_num_rows($result);
                if($rows>= '1'){
                    while($row = mysqli_fetch_array($result)){?>
                            <div class="col-4 shadow border-success border rounded p-2 m-2">
                                <h4 class="text-success mx-auto"><b><?=$sub;?></b></h4><hr>
                                <p><b>Total Questions :</b> <?=$row['total'];?> Questions</p>
                                <p><b>Right Questions :</b> <?=$row['posmarks'];?></p>
                                <p><b>Wrong Questions :</b> <?=$row['negmarks'];?></p>
                                <p><b>Total Score :</b> <?=$row['score'];?> / <?=$row['total']*$row['posmark'];?> Marks</p>
                            </div>
            <?php }} else{?>
                <h5 class="text-danger m-2"><b>No records found...</b></h5>
            <?php } ?>
        </div>
    </div>
    <div class="container">
        <h3 class="text-info"><b>Final Examinations</b></h3>
        <div class="row">
            <?php
                $query = "SELECT history.score, history.posmarks, history.negmarks, exams.subject , exams.total, exams.posmark, exams.negmark, history.email FROM history, exams where exams.id = history.eid and exams.examname = 'Final Examination';";
                $result = mysqli_query($link, $query);
                $rows = mysqli_num_rows($result);
                if($rows== '1'){
                    while($row = mysqli_fetch_array($result)){?>
                        <div class="col-4 shadow border-success border rounded p-2 m-2">
                            <h4 class="text-success mx-auto"><b><?=$row['subject'];?></b></h4><hr>
                            <p><b>Total Questions :</b> <?=$row['total'];?> Questions</p>
                            <p><b>Right Questions :</b> <?=$row['posmarks'];?></p>
                            <p><b>Wrong Questions :</b> <?=$row['negmarks'];?></p>
                            <p><b>Total Score :</b> <?=$row['score'];?> / <?=$row['total']*$row['posmark'];?> Marks</p>
                        </div>
            <?php }} else{?>
                <h5 class="text-danger m-2"><b>No records found...</b></h5>
            <?php } ?>
        </div>
    </div>
    <div class="container">
        <h3 class="text-info"><b>Class Test</b></h3>
        <div class="row">
            <?php
                $query = "SELECT history.score, history.posmarks, history.negmarks, exams.subject, exams.total, exams.posmark, exams.negmark, history.email FROM history, exams where exams.id = history.eid and exams.examname = 'Class Test' and history.email='$check';";
                $result = mysqli_query($link, $query);
                $rows = mysqli_num_rows($result);
                if($rows>= '1'){
                    while($row = mysqli_fetch_array($result)){ ?>
                            <div class="col-4 shadow border-success border rounded p-2 m-2">
                                <h4 class="text-success mx-auto"><b><?=$row['subject'];?></b></h4><hr>
                                <p><b>Total Questions :</b> <?=$row['total'];?> Questions</p>
                                <p><b>Right Questions :</b> <?=$row['posmarks'];?></p>
                                <p><b>Wrong Questions :</b> <?=$row['negmarks'];?></p>
                                <p><b>Total Score :</b> <?=$row['score'];?> / <?=$row['total']*$row['posmark'];?> Marks</p>
                            </div>
            <?php }} else{?>
                <h5 class="text-danger m-2"><b>No records found...</b></h5>
            <?php } ?>
        </div>
    </div>
</section>
<?php include('footer.php');?>

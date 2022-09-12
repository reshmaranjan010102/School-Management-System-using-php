<?php
	include("header.php");
    $sql = "SELECT * FROM students WHERE email = '$check'";
	$result = $link->query($sql);
	$row = $result->fetch_assoc();
    $class = $row['classid'];
    $email = $row['email'];
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Welcome in Examination Room!</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Examination Room</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
    <div class="container-fluid">
        <!-- history start -->
        <?php if(@$_GET['q']== 2) { 
            $q = mysqli_query($link,"SELECT * FROM history WHERE email='$email' ORDER BY date DESC " )or die('Error197');?>
            <div class="container card col-10">
                <div class="card-header">
                    <h3 class="card-title"><b>History</b></h3>
                </div>
                <div class="card-body">
                    <div class="panel mx-auto">
                        <div class="table-responsive">
                            <table class="table table-striped title1">
                                <tr style="color:red">
                                    <td><b>S.N.</b></td>
                                    <td><b>Quiz</b></td>
                                    <td><b>Question Solved</b></td>
                                    <td><b>Right</b></td>
                                    <td><b>Wrong<b></td>
                                    <td><b>Score</b></td>
                                </tr>
                                <?php $c=0;
                                while($row=mysqli_fetch_array($q) ) {
                                    $eid=$row['eid'];
                                    $s=$row['score'];
                                    $w=$row['negmark'];
                                    $r=$row['posmark'];
                                    $qa=$row['level'];
                                    $q23=mysqli_query($link,"SELECT subject FROM quiz WHERE  eid='$eid' " )or die('Error208');
                                    while($row=mysqli_fetch_array($q23) ) {
                                        $subject=$row['subject'];
                                    } $c++; ?>
                                    <tr>
                                        <td><?=$c?></td>
                                        <td><?=$subject?></td>
                                        <td><?=$qa?></td>
                                        <td><?=$r?></td>
                                        <td><?=$w?></td>
                                        <td><?=$s?></td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <!-- history end -->

        <!-- exam start -->
        <?php } elseif(@$_GET['q']== 'quiz' && @$_GET['step']== 2) {
            $eid=@$_GET['eid'];
            $sn=@$_GET['n'];
            $total=@$_GET['t'];
            $q=mysqli_query($link,"SELECT * FROM questions WHERE eid='$eid' AND sn='$sn' " ); ?>
            <div class="panel" style="margin:5%">
            <?php while($row=mysqli_fetch_array($q) ) {
                $qns=$row['ques'];
                $qid=$row['qid']; ?>
            <b>Question &nbsp;<?=$sn?>&nbsp;::<br /><?=$qns?></b>
            <?php } $q=mysqli_query($link,"SELECT * FROM options WHERE qid='$qid' " ); ?>
            <form action="updateexam.php?q=quiz&step=2&eid=<?=$eid?>&n=<?=$sn?>&t=<?=$total?>&qid=<?=$qid?>" method="POST"  class="form-horizontal"><br />
                <?php while($row=mysqli_fetch_array($q) ) {
                    $option=$row['option'];
                    $optionid=$row['optionid']; ?>
                <input type="radio" name="ans" value="<?=$optionid?>"><?=$option?><br />
                <?php } ?>
                <br /><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp;Submit</button></form></div>
        <!-- exam end -->
        
        <!-- result display start -->
        <?php } elseif(@$_GET['q']== 'result' && @$_GET['eid']) {
            $eid=@$_GET['eid'];
            $q=mysqli_query($link,"SELECT * FROM history WHERE eid='$eid' AND email='$email' " )or die('Error157'); ?>
            <div class="container card col-10">
                <div class="card-header">
                    <h3 class="card-title"><b>Result</b></h3>
		            <a href="myreport.php" class="btn btn-sm btn-warning float-right">View Report</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped title1">
                        <?php while($row=mysqli_fetch_array($q) ) {
                            $s=$row['score'];
                            $w=$row['negmarks'];
                            $r=$row['posmarks'];
                            $qa=$row['level']; ?>
                            <tr style="color:#66CCFF">
                                <td><b>Total Questions</b></td>
                                <td><b><?=$qa?></b></td>
                            </tr>
                            <tr style="color:#99cc32">
                                <td><b>Right Answer</b></td>
                                <td><b><?=$r?></b></td>
                            </tr> 
                            <tr style="color:red">
                                <td><b>Wrong Answer</b></td>
                                <td><b><?=$w?></b></td>
                            </tr>
                            <tr style="color:#66CCFF">
                                <td><b>Score</b></td>
                                <td><?=$s?></td>
                            </tr>
                        <?php }
                            $q=mysqli_query($link,"SELECT * FROM rank WHERE  email='$email' " )or die('Error157');
                            while($row=mysqli_fetch_array($q) ) {
                                $s=$row['score']; ?>
                                <tr style="color:#990000">
                                    <td><b>Overall Score</b></td>
                                    <td><b><?=$s?></b></td>
                                </tr>
                            <?php }?>
                        </table>
                    </div>
                </div>
            </div>
        <!-- result display end -->

        <!-- view exam start -->
        <?php } else {
            $result = mysqli_query($link,"SELECT * FROM exams where class='$class'"); ?>
            <div class="container card col-10">
                <div class="card-header">
                    <h3 class="card-title"><b>Exams</b></h3>
                    <div class="card-tool">
		                <a href="exams.php?q=2" class="btn float-right btn-info btn-sm">History</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped title1">
                            <tr>
                                <td><b>S.N.</b></td>
                                <td><b>Subject</b></td>
                                <td><b>Total question</b></td>
                                <td><b>Marks</b></td>
                                <td><b>Time limit</b></td>
                                <td></td>
                            </tr>
                            <?php
                                $c=1;
                                while($row = mysqli_fetch_array($result)) {
                                    $subject = $row['subject'];
                                    $total = $row['total'];
                                    $posmark = $row['posmark'];
                                    $time = $row['time'];
                                    $id = $row['id'];
                                    $q12 = mysqli_query($link,"SELECT score FROM history WHERE eid='$id' AND email='$email'" );
                                    $rowcount = mysqli_num_rows($q12);	
                                    if($rowcount == 0){ ?>
                                        <tr>
                                            <td><?=$c++;?></td>
                                            <td><?=$subject;?></td>
                                            <td><?=$total;?></td>
                                            <td><?=$posmark*$total;?></td>
                                            <td><?=$time;?>&nbsp;min</td>
                                            <td><a href="exams.php?q=quiz&step=2&eid=<?=$id?>&n=1&t=<?=$total?>"><b>Start</b></span></a></td>
                                        </tr>
                                    <?php } 
                                } 
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        <?php } ?>
        <!-- view exam end --> 

</section>
<?php include('footer.php'); ?>
<?php 
include('header.php');
//remove quiz
if(@$_GET['q']== 'rmquiz') {
    $eid=@$_GET['eid'];
    $result = mysqli_query($link,"SELECT * FROM questions WHERE eid='$eid' ") or die('Error');
    while($row = mysqli_fetch_array($result)) {
        $qid = $row['qid'];
        $r1 = mysqli_query($link,"DELETE FROM options WHERE qid='$qid'") or die('Error');
        $r2 = mysqli_query($link,"DELETE FROM answer WHERE qid='$qid' ") or die('Error');
    }
    $r3 = mysqli_query($link,"DELETE FROM questions WHERE eid='$eid' ") or die('Error');
    $r4 = mysqli_query($link,"DELETE FROM exams WHERE id='$eid' ") or die('Error');
    $r4 = mysqli_query($link,"DELETE FROM history WHERE eid='$eid' ") or die('Error'); ?>
    <h4 class="mx-4"><b class="text-success"> exam removed successfully!</b></h4>
    <a href="examination.php?q=5" class="mx-4 btn btn-success">Go Back</a>
<?php }

//add quiz
if(@$_GET['q']== 'addquiz') {
    $class = $_POST['class'];
    $class= ucwords(strtolower($class));
    $subject = $_POST['subject'];
    $subject= ucwords(strtolower($subject));
    $total = $_POST['total'];
    $posmarks = $_POST['posmarks'];
    $negmarks = $_POST['negmarks'];
    $time = $_POST['time'];
    $descr = $_POST['descr'];
    $exam_name = $_POST['examname'];
    $id=uniqid();
    $q3=mysqli_query($link,"INSERT INTO exams (id, class, subject , posmark , negmark, total, time , descr , date , examname) VALUES  ('$id','$class', '$subject' , '$posmarks' , '$negmarks','$total','$time' ,'$descr', NOW() , '$exam_name')");?>
    <h4 class="mx-4"><b class="text-success"> exam added successfully, now upload the questions..!</b></h4>
    <a href="examination.php?q=4&step=2&eid=<?=$id;?>&n=<?=$total;?>" class="mx-4 btn btn-success">Next</a>
<?php } 

//add question
if(@$_GET['q']== 'addqns') {
    $n=@$_GET['n'];
    $eid=@$_GET['eid'];
    $ch=@$_GET['ch'];
    for($i=1;$i<=$n;$i++) {
        $qid=uniqid();
        $qns=$_POST['qns'.$i];
        $q3=mysqli_query($link,"INSERT INTO questions (eid, qid, ques, choice, sn) VALUES ('$eid','$qid','$qns' , '$ch' , '$i')");
        $oaid=uniqid();
        $obid=uniqid();
        $ocid=uniqid();
        $odid=uniqid();
        $a=$_POST[$i.'1'];
        $b=$_POST[$i.'2'];
        $c=$_POST[$i.'3'];
        $d=$_POST[$i.'4'];
        $qa=mysqli_query($link,"INSERT INTO options (qid, option, optionid) VALUES  ('$qid','$a','$oaid')");
        $qb=mysqli_query($link,"INSERT INTO options (qid, option, optionid) VALUES  ('$qid','$b','$obid')");
        $qc=mysqli_query($link,"INSERT INTO options (qid, option, optionid) VALUES  ('$qid','$c','$ocid')");
        $qd=mysqli_query($link,"INSERT INTO options (qid, option, optionid) VALUES  ('$qid','$d','$odid')");
        $e=$_POST['ans'.$i];
        switch($e) {
            case 'a':
                $ansid=$oaid;
            break;
            case 'b':
                $ansid=$obid;
            break;
            case 'c':
                $ansid=$ocid;
            break;
            case 'd':
                $ansid=$odid;
            break;
            default:
                $ansid=$oaid;
        }
        $qans=mysqli_query($link,"INSERT INTO answer (qid, ansid) VALUES  ('$qid','$ansid')");
    } ?>
    <h4 class="mx-4"><b class="text-success"> Questions added successfully</b></h4>
    <a href="examination.php" class="mx-4 btn btn-success">Go Back</a>
<?php }

include('footer.php');
?>
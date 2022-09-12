<?php
    include_once('../../service/mysqlcon.php');
    $check=$_SESSION['login_id'];
    $session=mysqli_query($link, "SELECT name  FROM students WHERE email = '$check' ");
    $row1=mysqli_fetch_array($session);
    $sql = "SELECT * FROM students WHERE email = '$check'";
	$result = $link->query($sql);
	$row = $result->fetch_assoc();
    $class = $row['classid'];
    $email = $row['email'];
//quiz start
if(@$_GET['q']== 'quiz' && @$_GET['step']== 2) {
    $eid = @$_GET['eid'];
    $sn = @$_GET['n'];
    $total = @$_GET['t'];
    $ans = $_POST['ans'];
    $qid = @$_GET['qid'];
    $q = mysqli_query($link,"SELECT * FROM answer WHERE qid = '$qid' " );
    while($row = mysqli_fetch_array($q) ) {
        $ansid = $row['ansid']; }
    if($ans == $ansid) {
        $q = mysqli_query($link,"SELECT * FROM exams WHERE id = '$eid' " );
        while($row = mysqli_fetch_array($q) ) {
        $posmark = $row['posmark']; }
        if($sn == 1) {
            $q = mysqli_query($link,"INSERT INTO history VALUES('$email','$eid' ,'0','0','0','0',NOW())")or die('Error'); }
        $q = mysqli_query($link,"SELECT * FROM history WHERE eid = '$eid' AND email = '$email' ")or die('Error115');
        while($row = mysqli_fetch_array($q) ) {
            $s = $row['score'];
            $r = $row['posmarks']; }
        $r++;
        $s = $s+$posmark;
        $q = mysqli_query($link,"UPDATE `history` SET `score`=$s,`level`=$sn,`posmarks`=$r, date= NOW()  WHERE  email = '$email' AND eid = '$eid'")or die('Error124'); 
    } else {
        $q = mysqli_query($link,"SELECT * FROM exams WHERE id='$eid' " )or die('Error129');
        while($row = mysqli_fetch_array($q) ) {
            $negmark = $row['negmark']; }
        if($sn == 1) {
            $q = mysqli_query($link,"INSERT INTO history VALUES('$email','$eid' ,'0','0','0','0',NOW() )")or die('Error137'); }
        $q = mysqli_query($link,"SELECT * FROM history WHERE eid = '$eid' AND email = '$email' " )or die('Error139');
        while($row = mysqli_fetch_array($q) ) {
            $s = $row['score'];
            $w = $row['negmarks']; }
        $w++;
        $s = $s-$negmark;
        $q = mysqli_query($link,"UPDATE `history` SET `score` = $s,`level` = $sn,`negmarks` = $w, date = NOW() WHERE  email = '$email' AND eid = '$eid'")or die('Error147'); }
        if($sn != $total) {
            $sn++;
            header("location:exams.php?q=quiz&step=2&eid=$eid&n=$sn&t=$total")or die('Error152'); 
        } elseif ( $_SESSION['login_id']!= $email) {
            $q=mysqli_query($link,"SELECT score FROM history WHERE eid='$eid' AND email='$email'" )or die('Error156');
            while($row=mysqli_fetch_array($q) ) {
                $s=$row['score']; }
            $q=mysqli_query($link,"SELECT * FROM rank WHERE email='$email'" )or die('Error161');
            $rowcount=mysqli_num_rows($q);
            if($rowcount == 0) {
                $q2=mysqli_query($link,"INSERT INTO rank VALUES('$email','$s',NOW())")or die('Error165'); 
            } else {
                while($row=mysqli_fetch_array($q) ) {
                    $sun=$row['score']; }
                $sun=$s+$sun;
                $q=mysqli_query($link,"UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE email= '$email'")or die('Error174');
            }
            header("location:exams.php?q=result&eid=$eid");
        } else {
            header("location:exams.php?q=result&eid=$eid");}
}
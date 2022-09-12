<?php
    include_once('../../service/mysqlcon.php');
    include('main.php');
    // for Cancel admission    	
    if(isset($_GET['email']))
    {
        $id = $_GET['email'];
        mysqli_query($link,"DELETE FROM teachers WHERE email = '$id'");
        mysqli_query($link,"DELETE FROM users WHERE userid = '$id'");
        header("location: manageadmission.php");
    }
    $date= date("Y-m-d");
    $date1= date('Y-m-d', strtotime($date. ' + 5 days'));
    // for admit user
    if(isset($_GET['uemail']))
    {
        $uid = $_GET['uemail'];
        mysqli_query($link,"UPDATE teachers set status='2', hiredate='$date1' where email='$uid'");
        header("location: manageadmission.php");
    }

?>
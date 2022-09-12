<?php
    include_once('../../service/mysqlcon.php');
    include('main.php');
    // for Cancel admission    	
    if(isset($_GET['email']))
    {
        $id = $_GET['email'];
        mysqli_query($link,"DELETE FROM admissionform where email='$id'");
        mysqli_query($link, "DELETE FROM students WHERE email = '$id';");
        mysqli_query($link, "DELETE FROM users WHERE userid = '$id';");
        header("location: manageadmission.php");
    }

    // for admit user
    if(isset($_GET['uemail']))
    {
        $uid = $_GET['uemail'];
        mysqli_query($link,"UPDATE admissionform set status='2' where email='$uid'");
        header("location: manageadmission.php");
    }

?>
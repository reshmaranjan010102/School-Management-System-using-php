<?php
include_once('mysqlcon.php');
$myid=$_POST['myid'];
$mypassword=$_POST['mypassword'];
$myid = stripslashes($myid);
$mypassword = stripslashes($mypassword);
$_SESSION['login_id']=$myid;
$sql="SELECT usertype FROM users WHERE userid = '$myid' and password = '$mypassword'";
$result=mysqli_query($link, $sql);
$count=mysqli_num_rows($result);
$type=mysqli_fetch_array($result);
$control=$type['usertype'];

if($count!=1 || !isset($control)){
    header("Location:../index.php?login=false");
}
else if($count==1 && $control=="admin"){
    header("Location:../module/admin");
}
else if($count==1 && $control=="teacher"){
    header("Location:../module/teacher");
}

else if($count==1 && $control=="student"){
    header("Location:../module/student");
}
else {
    header("Location:../index.php?login=false");
}
?>

<?php
    include("header.php");
    $check=$_SESSION['login_id'];
    $session=mysqli_query($link, "SELECT name  FROM teachers WHERE email = '$check' ");
    $row=mysqli_fetch_array($session);
    $name = $row['name'];
    $q1 = mysqli_query($link, "SELECT classes.class, teachers.name FROM teachers JOIN classes ON teachers.name = classes.classteacher where teachers.email = '$check';");
    $r1= mysqli_fetch_array($q1);
    $class=$r1['class'];
    $statusMsg = "";
    $todaysDate = date('y-m-d');
    $qurty=mysqli_query($link,"SELECT * from studentattendance  where date='$todaysDate'");
    $count = mysqli_num_rows($qurty);
    if($count == 0) {
        $qus=mysqli_query($link,"SELECT email from students where classid='$class';");
        while ($ros = mysqli_fetch_array($qus)) {
            $email = $ros['email'];
            $qquery=mysqli_query($link,"INSERT INTO studentattendance (date, email, status ,class) VALUES ('$todaysDate', '$email', '0', '$class')");
        }
    }
    if(isset($_POST['save'])){
        $semail = $_POST['semail'];
        $check1 = $_POST['check'];
        $N = count($semail);
        $status = "";
        $qurty=mysqli_query($link,"SELECT * from studentattendance  where class='$class' and date='$todaysDate' and status = '1'");
        $count=0;
        while ($ros = mysqli_fetch_array($qurty)) {$count++;}
        if($count > 0){
            $statusMsg = "<div class='alert alert-danger'>Attendance has been taken for today!</div>";
        } else {
            for($i = 0; $i < $N; $i++) {
                $semail[$i];
                if(isset($check1[$i])) {
                    $qquery=mysqli_query($link,"UPDATE studentattendance set status='1' where email = '$check1[$i]'");
                    if ($qquery) {
                        $statusMsg = "<div class='alert alert-success'>Attendance Taken Successfully!</div>";
                    } else {
                        $statusMsg = "<div class='alert alert-danger'>An error Occurred!</div>";
                    }
                }                
            }
        }
    }
?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-8">
                <h3 class="m-0 text-dark"><?=$class;?> Attendance (Today's Date : <?=$todaysDate;?>)</h3>
            </div><!-- /.col -->
            <div class="col-sm-4">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Manage Attendance</a></li>
                    <li class="breadcrumb-item active">Take</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card mb-4">
                <form method="POST">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">All Students in class</h6>
                        <h6 class="m-0 font-weight-bold text-danger">Note: <i>Click on the checkboxes besides each Teacher to take attendance!</i></h6>
                    </div>
                    <div class="table-responsive p-3">
                    <?=$statusMsg;?>
                        <table class="table align-items-center table-flush table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>S.no.</th>
                                    <th>Student Name</th>
                                    <th>Date</th>
                                    <th>Check</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $query = "SELECT name, email FROM students where classid = '$class';";
                                $rs = $link->query($query);
                                $num = $rs->num_rows;
                                $sn=0;
                                $status="";
                                if($num > 0) { 
                                    while ($rows = $rs->fetch_assoc()) {
                                        $sn = $sn + 1; ?>
                                        <tr>
                                            <td><?=$sn++;?></td>
                                            <td><?=$rows['name'];?></td>
                                            <td><?=$todaysDate;?></td>
                                            <td><input name='check[]' type='checkbox' value="<?=$rows['email'];?>" class='form-control'></td>
                                            <input name='semail[]' value="<?=$rows['email'];?>" type='hidden' class='form-control'>
                                        </tr>
                                    <?php } } else{
                                    echo "<div class='alert alert-danger' role='alert'>No Record Found!</div>";
                                }?>
                            </tbody>
                        </table>
                        <button type="submit" name="save" class="btn btn-primary">Take Attendance</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include("footer.php");?>
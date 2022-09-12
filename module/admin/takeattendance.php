<?php
    include("header.php");
    $statusMsg = "";
    $todaysDate = date('y-m-d');
    $qurty=mysqli_query($link,"SELECT * from attendance  where date='$todaysDate'");
    $count = mysqli_num_rows($qurty);
    if($count == 0) {
        $qus=mysqli_query($link,"SELECT email from teachers");
        while ($ros = mysqli_fetch_array($qus)) {
            $email = $ros['email'];
            $qquery=mysqli_query($link,"INSERT INTO attendance (date, email, status) VALUES ('$todaysDate', '$email', '0')");
        }
    }
    if(isset($_POST['save'])){
        $temail = $_POST['temail'];
        $check = $_POST['check'];
        $N = count($temail);
        $status = "";
        $qurty=mysqli_query($link,"SELECT * from attendance  where date='$todaysDate' and status = '1'");
        $count = mysqli_num_rows($qurty);
        if($count > 0){
            $statusMsg = "<div class='alert alert-danger'>Attendance has been taken for today!</div>";
        } else {
            for($i = 0; $i < $N; $i++) {
                $temail[$i];
                if(isset($check[$i])) {
                    $qquery=mysqli_query($link,"update attendance set status='1' where email = '$check[$i]'");
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
                <h3 class="m-0 text-dark">Teacher's Attendance (Today's Date : <?=$todaysDate;?>)</h3>
            </div><!-- /.col -->
            <div class="col-sm-4">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
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
                        <h6 class="m-0 font-weight-bold text-primary">All Teachers in school</h6>
                        <h6 class="m-0 font-weight-bold text-danger">Note: <i>Click on the checkboxes besides each Teacher to take attendance!</i></h6>
                    </div>
                    <div class="table-responsive p-3">
                    <?=$statusMsg;?>
                        <table class="table align-items-center table-flush table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>S.no.</th>
                                    <th>Teacher Name</th>
                                    <th>Class</th>
                                    <th>Subject</th>
                                    <th>Date</th>
                                    <th>Check</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $query = "SELECT classes.class, teachers.name, teachers.email, teachers.subject FROM teachers JOIN classes ON teachers.name = classes.classteacher;";
                                $rs = $link->query($query);
                                $num = $rs->num_rows;
                                $sn=1;
                                $status="";
                                if($num > 0) { 
                                    while ($rows = $rs->fetch_assoc()) {?>
                                        <tr>
                                            <td><?=$sn++;?></td>
                                            <td><?=$rows['name'];?></td>
                                            <td><?=$rows['class'];?></td>
                                            <td><?=$rows['subject'];?></td>
                                            <td><?=$todaysDate;?></td>
                                            <td><input name='check[]' type='checkbox' value="<?=$rows['email'];?>" class='form-control'></td>
                                            <input name='temail[]' value="<?=$rows['email'];?>" type='hidden' class='form-control'>
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
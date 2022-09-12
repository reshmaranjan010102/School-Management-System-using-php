<?php
    include("header.php");
    $check=$_SESSION['login_id'];
    $session=mysqli_query($link, "SELECT name  FROM teachers WHERE email = '$check' ");
    $row=mysqli_fetch_array($session);
    $name = $row['name'];
    $q1 = mysqli_query($link, "SELECT classes.class, teachers.name FROM teachers JOIN classes ON teachers.name = classes.classteacher where teachers.email = '$check';");
    $r1= mysqli_fetch_array($q1);
    $class=$r1['class'];
?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">View Attendance</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Manage Attendance</a></li>
                    <li class="breadcrumb-item active">View</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->

<section class="content">
    <div class="row mt-4">
        <div class="col-lg-10 mx-auto">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">View <?=$class;?> Attendance</h6>
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="form-group row mb-3">
                            <div class="mr-4">
                                <label class="form-control-label">Select<span class="text-danger ml-2">*</span></label>
                                <select required name="type" onchange="typeDropDown(this.value)" class="form-control mb-3">
                                    <option value="">--Select--</option>
                                    <option value="1" >All Students</option>
                                    <option value="2" >Select Student</option>
                                </select>
                            </div>
                            <div id='attHint'></div>
                        </div>
                        <button type="submit" name="view" class="btn btn-primary">View Attendance</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <?php
                        if(isset($_POST['view'])){
                            if(isset($_POST['date'])){ 
                                $date = $_POST['date'];
                                $query = "SELECT studentattendance.date, studentattendance.status, students.name From studentattendance join students on students.email = studentattendance.email where date = '$date' and class='$class'";
                                $rs = $link->query($query);
                                $num = $rs->num_rows;
                                $sn=0;
                                $status="";?>
                                <h6 class="m-0 font-weight-bold text-primary">Class Attendance</h6>
                                </div>
                                <div class="table-responsive p-3">
                                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>S.no.</th>
                                                <th>Student Name</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>        
                                        <tbody>
                                        <?php
                                            if($num > 0) { 
                                                while ($rows = $rs->fetch_assoc()) {
                                                    if($rows['status'] == '1'){$status = "Present"; $colour="#00FF00";
                                                    }else{$status = "Absent";$colour="#FF0000";}
                                                    $sn = $sn + 1; ?>
                                                    <tr>
                                                        <td><?=$sn;?></td>
                                                        <td><?=$rows['name'];?></td>
                                                        <td><?=$date;?></td>
                                                        <td style='background-color:<?=$colour;?>'><?=$status;?></td>
                                                    </tr>
                                            <?php }} else {
                                                echo "<div class='alert alert-danger' role='alert'>No Record Found!</div>";
                            }} elseif(isset($_POST['tname'])){
                                $tname = $_POST['tname'];
                                $query = "SELECT studentattendance.date, studentattendance.status, students.name From studentattendance join students on students.email = studentattendance.email where name = '$tname'";
                                $rs = $link->query($query);
                                $num = $rs->num_rows;
                                $sn=0;
                                $status="";?>
                                <h6 class="m-0 font-weight-bold text-primary"><?=$tname;?></h6>
                                </div>
                                <div class="table-responsive p-3">
                                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                                        <thead class="thead-light">
                                                    <tr>
                                                        <th>S.no.</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                    </tr>
                                        </thead>        
                                        <tbody>
                                        <?php if($num > 0) { 
                                                while ($rows = $rs->fetch_assoc()) {
                                                    if($rows['status'] == '1'){$status = "Present"; $colour="#00FF00";}else{$status = "Absent";$colour="#FF0000";}
                                                    $sn = $sn + 1; ?>
                                                    <tr>
                                                        <td><?=$sn;?></td>
                                                        <td><?=$rows['date'];?></td>
                                                        <td style='background-color:<?=$colour;?>'><?=$status;?></td>
                                                    </tr>
                                        <?php }} else {
                                            echo "<div class='alert alert-danger' role='alert'>No Record Found!</div>";
                            }} else{}?>
                        <?php } else {} ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function typeDropDown(str) {
    if (str == "") {
        document.getElementById("attHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("attHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","calltype.php?class=<?=$class;?>&tid="+str,true);
        xmlhttp.send();
    }
}
</script>

<?php include("footer.php");?>

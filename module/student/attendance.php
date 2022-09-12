<?php
    include('header.php');
    $name = $row['name'];
    $query = "SELECT studentattendance.date, studentattendance.status, students.name From studentattendance join students on students.email = studentattendance.email where name = '$name'";
    $rs = $link->query($query);
    $num = $rs->num_rows;
    $sn=0;
    $status="";?>

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
                        <li class="breadcrumb-item active">View Attendance</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="card col-9 my-4 mx-auto">
        <h5 class="card-header m-0 font-weight-bold text-primary"><?=$name;?></h5>
        <h6 class="mt-3 mx-3"><b>Total days :</b> <?=$num;?> days</h6>
        <h6 class="mx-3"><b>Present :</b>
            <?php 
                $sq = mysqli_query($link, "SELECT * FROM studentattendance where email='$check' and status='1';"); 
                if ($sq) 
                { 
                    $row_no_users = mysqli_num_rows($sq);       
                }
                ?>
            <?=$row_no_users;?> days</h6>
        <h6 class="mx-3"><b>Absent :</b> <?=$num-$row_no_users;?> days</h6>        
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
                    <?php 
                        if($num > 0) { 
                        while ($rows = $rs->fetch_assoc()) {
                            if($rows['status'] == '1'){$status = "Present"; $colour="#00FF00";}else{$status = "Absent";$colour="#FF0000";}
                            $sn = $sn + 1; ?>
                            <tr>
                                <td><?=$sn;?></td>
                                <td><?=$rows['date'];?></td>
                                <td style='background-color:<?=$colour;?>'><?=$status;?></td>
                            </tr>
                    <?php }} ?>
                </tbody>
            </table>
        </div>
    </div>
<?php include('footer.php'); ?>
<?php
    include_once('../../service/mysqlcon.php');
    include('main.php');
    include('header.php');           
?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Manage Teacher's Applications</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Manage Applications</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <?php
                $query = "SELECT * FROM teachers where status='3'"; 
                $result = mysqli_query($link, $query); 
                if ($result) 
                { 
                    $row_no_users = mysqli_num_rows($result);       
                } 
            ?>
            <div class="col-4">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Teachers</span>
                        <span class="info-box-number"><?php echo $row_no_users; ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <?php
                $query = "SELECT * FROM teachers where status = '1'"; 
                $result = mysqli_query($link, $query); 
                if ($result) 
                {  
                    $row_users = mysqli_num_rows($result);     
                }
            ?>
            <div class="col-4">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-graduation-cap"></i></span>
                    <div class="info-box-content">
                        <a href="?new"><span class="info-box-text">New Applications</span></a>
                        <span class="info-box-number"><?php echo $row_users;?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
</section>

<?php if(isset($_REQUEST['new'])) { ?>
    <section class="content">
        <div id="applicants" class="card m-auto col-11">
            <div class="card-header bg-info py-2">
                <h4 class="card-title text-light">Application Records</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive bg-white">
                    <table class="table table-bordered" id='teacherList'>
                        <thead>
                            <tr> 
                                <th>S. No.</th>
                                <th>Fullname</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>DOB</th>
                                <th>Subject</th>
                                <th>Mobile no. (1)</th>
                                <th>Mobile no. (2)</th>
                                <th>Address</th>
                                <th>Nationality</th>
                                <th>Religion</th>                            
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $sql = "SELECT * FROM teachers where status='1'";
                                $result = $link->query($sql);
                                $cnt=1;
                                while($row = $result->fetch_assoc()) { 
                            ?>
                            <tr>
                                <td><?php echo $cnt; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['sex']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['dob']; ?></td>
                                <td><?php echo $row['subject']; ?></td>
                                <td><?php echo $row['phone']; ?></td>
                                <td><?php echo $row['phone2']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <td><?php echo $row['nationality']; ?></td>
                                <td><?php echo $row['religion']; ?></td>
                                <td><?php if(($row['status'])==3 or ($row['status'])==2) { ?>
                                    <span class="badge badge-primary">Accepted</span>
                                    <?php } else {?>
                                    <span class="badge badge-info">Processing...</span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <span class="style6">
                                        <?php if(($row['status'])==3) { ?>
                                        <a href="admit_exec1.php?email=<?php echo $row['email'];?>" >Reject </a> 
                                        <?php } else {?>
                                        <a href="admit_exec1.php?uemail=<?php echo $row['email'];?>" >Accept </a>/ <a href="admit_exec1.php?email=<?php echo $row['email'];?>" >Reject </a> 
                                        <?php } ?>
                                </span>
                            </td>
                        </tr>
                        <?php $cnt=$cnt+1;} ?>
                    </table>
                </div>
            </div>
        </div>
    </section>
<?php } else {?>
    <section class="content">
        <div id="applicants" class="card m-auto col-11">
            <div class="card-header bg-info py-2">
                <h4 class="card-title text-light">Application Records</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive bg-white">
                    <table class="table table-bordered" id='teacherList'>
                        <thead>
                            <tr> 
                                <th>S. No.</th>
                                <th>Fullname</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>DOB</th>
                                <th>Subject</th>
                                <th>Mobile no. (1)</th>
                                <th>Mobile no. (2)</th>
                                <th>Address</th>
                                <th>Nationality</th>
                                <th>Religion</th>                            
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $sql = "SELECT * FROM teachers where status='3'";
                                $result = $link->query($sql);
                                $cnt=1;
                                while($row = $result->fetch_assoc()) { 
                            ?>
                            <tr>
                                <td><?php echo $cnt; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['sex']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['dob']; ?></td>
                                <td><?php echo $row['subject']; ?></td>
                                <td><?php echo $row['phone']; ?></td>
                                <td><?php echo $row['phone2']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <td><?php echo $row['nationality']; ?></td>
                                <td><?php echo $row['religion']; ?></td>
                                <td><?php if(($row['status'])==3 or ($row['status'])==2) { ?>
                                    <span class="badge badge-primary">Accepted</span>
                                    <?php } else {?>
                                    <span class="badge badge-info">Processing...</span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <span class="style6">
                                        <?php if(($row['status'])==3) { ?>
                                        <a href="admit_exec1.php?email=<?php echo $row['email'];?>" >Reject </a> 
                                        <?php } else {?>
                                        <a href="admit_exec1.php?uemail=<?php echo $row['email'];?>" >Accept </a>/ <a href="admit_exec1.php?email=<?php echo $row['email'];?>" >Reject </a> 
                                        <?php } ?>
                                </span>
                            </td>
                        </tr>
                        <?php $cnt=$cnt+1;} ?>
                    </table>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
<?php include('footer.php'); ?>

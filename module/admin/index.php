<?php include('header.php');?>
<!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Administrator Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Info boxes -->
                    <div class="row">
                        <div class="col-3">
                            <?php
                                $query = "SELECT * FROM admissionform where status='2'"; 
                                $result = mysqli_query($link, $query); 
                                if ($result) 
                                { 
                                    $row_no_users = mysqli_num_rows($result);       
                                } 
                            ?>
                            <div class="info-box">
                                <div class="info-box-content">
                                    <span class="info-box-text">Students</span>
                                    <span class="info-box-number"><?php echo $row_no_users; ?></span>
                                </div>
                                <i class="fas fa-user-graduate text-info fa-3x my-auto mx-1"></i>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-3">
                            <?php
                                $query = "SELECT * FROM teachers where status='3'"; 
                                $result = mysqli_query($link, $query); 
                                if ($result) 
                                { 
                                    $row_no_users = mysqli_num_rows($result);       
                                } 
                            ?>
                            <div class="info-box mb-3">
                                <div class="info-box-content">
                                    <span class="info-box-text">Teachers</span>
                                    <span class="info-box-number"><?php echo $row_no_users; ?></span>
                                </div>
                                <i class="fas fa-chalkboard-teacher fa-3x my-auto mx-1 text-danger"></i></span>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-3">
                            <?php
                                $query = "SELECT * FROM classes"; 
                                $result = mysqli_query($link, $query); 
                                if ($result) 
                                { 
                                    $row_no_users = mysqli_num_rows($result);       
                                } 
                            ?>
                            <div class="info-box mb-3">
                                <div class="info-box-content">
                                    <span class="info-box-text">Classes</span>
                                    <span class="info-box-number"><?php echo $row_no_users; ?></span>
                                </div>
                                <i class="fas fa-chalkboard fa-3x my-auto mx-1 text-success"></i></span>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <?php
                            $query = "SELECT * FROM admissionform where status='2'"; 
                            $result = mysqli_query($link, $query); 
                            if ($result) 
                            { 
                                $row_no_users = mysqli_num_rows($result);       
                            } 
                        ?>
                        <div class="col-3">
                            <div class="info-box mb-3">
                                <div class="info-box-content">
                                    <span class="info-box-text">Admissions</span>
                                    <span class="info-box-number"><?php echo $row_no_users; ?></span>
                                </div>
                                <i class="fas fa-users text-warning fa-3x my-auto mx-1"></i></span>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </section>
<?php include('footer.php');?>
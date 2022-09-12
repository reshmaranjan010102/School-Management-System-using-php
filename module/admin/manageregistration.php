<?php include('header.php'); ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Manage Registration</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">manage Registration</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <?php
                $query = "SELECT * FROM admissionform where status>='0' "; 
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
                        <span class="info-box-text">Total Students</span>
                        <span class="info-box-number"><?php echo $row_no_users; ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <?php
                $query = "SELECT * FROM teachers where status>='0'"; 
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
        </div>
        <div class="card col-6">
            <div class="card-header bg-info py-2">
                <h4 class="card-title text-light">Manage Registrations</h4>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 mb-3 mx-auto">
                                <div class="md-form">
                                    <label for="name">Registration Start Date :<sup class=text-danger>*</sup></label>
                                    <input type="date" name="sdate" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-8 mx-auto mb-3">
                                <div class="md-form">
                                    <label for="name">Registration End Date :<sup class=text-danger>*</sup></label>
                                    <input type="date" name="edate" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-8 mx-auto mb-3">
                                <div class="md-form">
                                    <label for="name">Session :<sup class=text-danger>*</sup></label>
                                    <input type="text" name="session" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="text-center mt-3">
                                    <button class="btn btn-success" name="submit" type="submit">Submit</button>
                                    <button class="btn btn-success" name="reset" type="reset">Reset</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
    if (isset($_POST['submit'])) 
    {
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        $session = $_POST['session'];
        $result = mysqli_query($link, "SELECT * FROM registration");
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            mysqli_query($link, "UPDATE registration set sdate='$sdate', edate='$edate', session='$session'");
        }
        else {
            mysqli_query($link, "INSERT INTO registration (sdate, edate, session) VALUES ('$sdate', '$edate', '$session');");
        }
    }
    include('footer.php');
?>
<?php
    include_once('main.php');
    include_once('../../service/mysqlcon.php');
    $check=$_SESSION['login_id'];
    $session=mysqli_query($link, "SELECT name  FROM teachers WHERE email = '$check' ");
    $row=mysqli_fetch_array($session);
    $name = $row['name'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Teacher | Dashboard</title>
		<script src = "JS/login_logout.js"></script>
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="../assets2/plugins/fontawesome-free/css/all.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="../assets2/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../assets2/dist/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>

    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars mt-1"></i></a>
                </li>
			</ul>
            <div class="navbar-nav ml-auto" style="top:20%;">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <img class="img-profile rounded-circle" src="../../assets/images/user-icn.png" style="max-width: 30px;">
                    <b>Welcome <?php echo $name;?></b>
                </a>
                <div class="dropdown-menu mx-3 dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php">
                    <i class="fas fa-power-off fa-fw mr-2 text-danger"></i>
                    Logout
                    </a>
                </div>
            </div>
        </nav>
        <!-- /.navbar -->
        <?php 
            $sql = "SELECT * FROM teachers WHERE email = '$check'";
            $result = $link->query($sql);
            $row = $result->fetch_assoc();
            if (($row['status'])==((3))) { 
            ?>
            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <div class="brand-link">
                    <img src="../assets2/dist/img/AdminLTELogo.png" alt="" class="brand-image img-circle elevation-3"
                        style="opacity: .8">
                    <span class="brand-text font-weight-light">Teacher</span>
                </div>
                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                                with font-awesome or any other icon font library -->
                            <li class="nav-item">
                                <a href="index.php" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                                <li class="nav-item">
                                <a href="offerLetter.php" class="nav-link">
                                    <i class="fas fa-envelope-open-text nav-icon"></i>
                                    <p>
                                        Offer Letter
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="profile.php" class="nav-link">
                                    <i class="fa fa-user nav-icon"></i>
                                    <p>
                                        View Profile
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-calendar"></i>
                                    <p>
                                        Manage Examinations
                                        <i class="fas fa-angle-left right"></i>	
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="examschedule.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View Schedule</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="examination.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Question Papers</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="studentreport.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Students Reports</p>
                                    </a>
                                </li>
                                </ul>
                            </li>
                            <?php
                                $sql = "SELECT * FROM classes WHERE classteacher='$name'";
                                $result = $link->query($sql);
                                $c=mysqli_num_rows($result);
                                if ($c >0){
                                ?>
                                <li class="nav-item has-treeview">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-calendar"></i>
                                        <p>
                                            Manage Attendance
                                            <i class="fas fa-angle-left right"></i>	
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="viewattendance.php" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>View attendance</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="takeattendance.php" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Take Attendance</p>
                                        </a>
                                    </li>
                                    </ul>
                                </li>
							<?php } else {}?>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

        <?php } else { ?>
            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <div class="brand-link">
                    <img src="../assets2/dist/img/AdminLTELogo.png" alt="" class="brand-image img-circle elevation-3"
                        style="opacity: .8">
                    <span class="brand-text font-weight-light">Teacher</span>
                </div>
                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                                with font-awesome or any other icon font library -->
                            <li class="nav-item">
                                <a href="index.php" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                            <?php
                                $sql = "SELECT * FROM teachers WHERE email = '$check'";
                                $result = $link->query($sql);
                                $row = $result->fetch_assoc();
                                if (($row['status'])==((2))) {
                            ?>
                            <li class="nav-item">
                                <a href="offerLetter.php" class="nav-link">
                                    <i class="fas fa-envelope-open-text nav-icon"></i>
                                    <p>
                                        Offer Letter <span class="badge badge-danger">1</span>
                                    </p>
                                </a>
                            </li>
                            <?php } else { ?>
                                <li class="nav-item">
                                <a href="offerLetter.php" class="nav-link">
                                    <i class="fas fa-envelope-open-text nav-icon"></i>
                                    <p>
                                        Offer Letter
                                    </p>
                                </a>
                            </li>
                            <?php } ?>
                            <li class="nav-item">
                                <a href="apply.php" class="nav-link">
                                    <i class="fa-brands fa-wpforms nav-icon"></i>
                                    <p>
                                        Apply for Teacher
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>
            <?php } ?>
        
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">


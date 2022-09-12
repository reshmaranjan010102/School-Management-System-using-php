<?php
    include_once('main.php');
    include_once('../../service/mysqlcon.php');
    $check=$_SESSION['login_id'];
    $session=mysqli_query($link, "SELECT name  FROM students WHERE email = '$check' ");
    $row=mysqli_fetch_array($session);
    $name = $row['name'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Student | Dashboard</title>
		<script src = "JS/login_logout.js"></script>
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="../assets2/plugins/fontawesome-free/css/all.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="../assets2/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../assets2/dist/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

        <style>
            #clockContainer {
                position: relative;
                float: right;
                top: -40px;
                height: 10vw;
                /*to make the height and width responsive*/
                width: 10vw;
                border-radius: 50%;
                background: url('../../assets/Images/clock.jpg') no-repeat;
                /*setting our background image*/
                background-size: 100%;
            }

            #hour,
            #minute,
            #second {
                position: absolute;
                background: black;
                border-radius: 10px;
                transform-origin: bottom;
            }

            #hour {
                width: 1.8%;
                height: 25%;
                top: 25%;
                left: 48.85%;
                opacity: 0.8;
            }

            #minute {
                width: 1.6%;
                height: 30%;
                top: 19%;
                left: 48.9%;
                opacity: 0.8;
            }

            #second {
                width: 1%;
                height: 40%;
                top: 9%;
                left: 49.25%;
                opacity: 0.8;
            }
        </style>

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
            $sql = "SELECT * FROM students WHERE email = '$check'";
            $result = $link->query($sql);
            $row = $result->fetch_assoc();
            if (($row['status'])==((1))) { ?>
            
            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <div class="brand-link">
                    <img src="../assets2/dist/img/AdminLTELogo.png" alt="" class="brand-image img-circle elevation-3"
                        style="opacity: .8">
                    <span class="brand-text font-weight-light"><?php echo $row['name'];?></span>
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
                                <a href="admissionLetter.php" class="nav-link">
                                    <i class="fas fa-envelope-open-text nav-icon"></i>
                                    <p>
                                        Admission Letter
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="classroom.php" class="nav-link">
                                    <i class="nav-icon fas fa-chalkboard"></i>
                                    <p>
                                        Classroom
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="exams.php" class="nav-link">
                                    <i class="nav-icon fas fa-chalkboard"></i>
                                    <p>
                                        Examination room
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="attendance.php" class="nav-link">
                                    <i class="nav-icon fas fa-calendar"></i>
                                    <p>
                                        View Attendance
                                    </p>
                                </a>
                            </li>
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
                    <span class="brand-text font-weight-light"><?php echo $row['name'];?></span>
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
                                <a href="admissionform.php" class="nav-link">
                                    <i class="fas fa-file-circle-check nav-icon"></i>
                                    <p>
                                        Admission form
                                    </p>
                                </a>
                            </li>
                            <?php
                                $sql = "SELECT * FROM admissionform WHERE email = '$check'";
                                $result = $link->query($sql);
                                $row = $result->fetch_assoc();
                                if (($row['status'])==((2))) {
                            ?>
                            <li class="nav-item">
                                <a href="admissionLetter.php" class="nav-link">
                                    <i class="fas fa-envelope-open-text nav-icon"></i>
                                    <p>
                                        Admission Letter <span class="badge badge-danger">1</span>
                                    </p>
                                </a>
                            </li>
                            <?php } else { ?>
                                <li class="nav-item">
                                <a href="admissionLetter.php" class="nav-link">
                                    <i class="fas fa-envelope-open-text nav-icon"></i>
                                    <p>
                                        Admission Letter
                                    </p>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>
        <?php } ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

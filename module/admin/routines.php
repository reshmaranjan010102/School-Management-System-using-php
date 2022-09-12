<?php
include("header.php");
?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Hello! Admin</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Manage Routines</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div><hr>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <?php if(isset($_REQUEST['action1'])){ 
        $id = $_GET['action1'];
        $sql = "SHOW TABLES FROM schoolmsdb";
        $result = mysqli_query($link, $sql);
        while ($row = mysqli_fetch_row($result)) {
            if ($row[0] == $id) { 
                $count=1;
                break; 
            }
            else{
                $count=0;
            }
        }
        if($count == 0){
            $sql = "CREATE TABLE $id (
                id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                days VARCHAR(10) NOT NULL,
                period1 VARCHAR(30) NOT NULL,
                period2 VARCHAR(30) NOT NULL,
                period3 VARCHAR(30) NOT NULL,
                period4 VARCHAR(30) NOT NULL,
                period5 VARCHAR(30) NOT NULL,
                period6 VARCHAR(30) NOT NULL
                )";
                if ($link->query($sql) === TRUE) {
                    echo "<h3><b><Update the timetable...</b></h3>";
                  } else {
                    echo "Error creating table: " . $link->error;
                  }
        }
        $tea= mysqli_query($link, "SELECT classes.classteacher, subjects.title FROM classes join Subjects on classes.classteacher = subjects.subteacher where class='$id';");
        $teacher = mysqli_fetch_array($tea);
        ?>
        <h3 class='mx-4'><b><?php echo ucfirst($id);?> TIME TABLE</b></h3>
        <h4 class='mx-4'><b>Class Teacher : </b><?=$teacher['classteacher'];?> (<?=$teacher['title'];?> TGT)</h4>
        <div class="container">
            <div class="row">
                <div class="col-8 mx-4 card">
                    <div class="card-body">
                        <div class="table-responsive bg-white">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Days</th>
                                    <th><h6><b>Period I</b><h6><h6>(8:00 - 8:50)<h6></th>
                                    <th><h6><b>Period II</b><h6><h6>(8:50 - 9:40)<h6></th>
                                    <th><h6><b>Period III</b><h6><h6>(9:40 - 10:30)<h6></th>
                                    <th rowspan='7'>
                                        <h4 class='mb-1 mt-4'>R</h4><h4 class='mb-1 mt-1'>E</h4><h4 class='mb-1 mt-1'>C</h4><h4 class='mb-1 mt-1'>E</h4><h4 class='mb-1 mt-1'>S</h4><h4 class='mb-4 mt-1'>S</h4><h4 class='mb-1 mt-4'>T</h4><h4 class='mb-1 mt-1'>I</h4><h4 class='mb-1 mt-1'>M</h4><h4 class='mb-4 mt-1'>E</h4>
                                    </th>
                                    <th><h6><b>Period IV</b><h6><h6>(11:00 - 11:50)<h6></th>
                                    <th><h6><b>Period V</b><h6><h6>(11:50 - 12:40)<h6></th>
                                    <th><h6><b>Period VI</b><h6><h6>(12:40 - 01:30)<h6></th>
                                </tr>
                                <?php
                                $count = 1;
                                $tt_query = "SELECT * FROM $id";
                                $query = mysqli_query($link, $tt_query);
                                while ($period = mysqli_fetch_object($query)) {      
                                ?>
                                <tr>
                                    <td><?=$period->days?></td>
                                    <td><?=$period->period1?></td>
                                    <td><?=$period->period2?></td>
                                    <td><?=$period->period3?></td>
                                    <td><?=$period->period4?></td>
                                    <td><?=$period->period5?></td>
                                    <td><?=$period->period6?></td>
                                </tr>
                                <?php }?>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-3 ml-4 card">
                    <div class="card-header py-2">
                        <h3 class="card-title">Update TimeTable</h3>
                    </div>
                    <div class="card-body">
                        <?php
                            if (isset($_POST['submit'])){
                                $days = $_POST['days'];
                                $period1 = $_POST['period1'];
                                $period2 = $_POST['period2'];
                                $period3 = $_POST['period3'];
                                $period4 = $_POST['period4'];
                                $period5 = $_POST['period5'];
                                $period6 = $_POST['period6'];
                                $result2 = mysqli_query($link, "SELECT * FROM $id where days='$days'");
                                $num_rows = mysqli_num_rows($result2);
                                if ($num_rows > 0) {
                                    $query="UPDATE $id set days='$days', period1='$period1', period2='$period2', period3='$period3', period4='$period4', period5='$period5', period6='$period6' where days='$days'";  
                                    mysqli_query($link, $query);
                                }
                                else {
                                    $query="INSERT INTO $id (days, period1, period2, period3, period4, period5, period6) VALUES ('$days', '$period1', '$period2', '$period3', '$period4', '$period5', '$period6')";  
                                    mysqli_query($link, $query);
                                }
                            }
                        ?>
                        <form action="" method="POST">
                            <select class="custom-select" name="days">
                                <option selected>Select day</option>
                                <?php
                                    $days = array('MON', 'TUE', 'WED', 'THUR', 'FRI', 'SAT');
                                    $i=0;
                                    while($i<6){
                                ?>
                                <option value="<?php echo $days[$i] ?>"><?php echo $days[$i] ?></option>
                                <?php $i++; } ?>
                            </select>
                            <?php
                                $class_query = mysqli_query($link, "SELECT * FROM classes where class = '$id'");
                                $class = mysqli_fetch_object($class_query)?>
                            <select class="mt-3 custom-select" name="period1">
                                <option selected>Select period1</option>
                                <option value="-">-</option>
                                <?php
                                    $subjects = explode(',', $class->subjects);
                                    foreach ($subjects as $subject) {
                                    $sub_query = mysqli_query($link, 'SELECT * FROM subjects WHERE id = '.$subject.'');
                                    $subject_value = mysqli_fetch_object($sub_query); ?>
                                <option value="<?php echo $subject_value->title; ?>"><?php echo $subject_value->title; ?></option>
                            <?php } ?>
                            </select>
                            <select class="mt-3 custom-select" name="period2">
                                <option selected>Select period2</option>
                                <option value="-">-</option>
                                <?php
                                    $subjects = explode(',', $class->subjects);
                                    foreach ($subjects as $subject) {
                                    $sub_query = mysqli_query($link, 'SELECT * FROM subjects WHERE id = '.$subject.'');
                                    $subject_value = mysqli_fetch_object($sub_query); ?>
                                <option value="<?php echo $subject_value->title; ?>"><?php echo $subject_value->title; ?></option>
                            <?php } ?>
                            </select>
                            <select class="mt-3 custom-select" name="period3">
                                <option selected>Select period3</option>
                                <option value="-">-</option>
                                <?php
                                    $subjects = explode(',', $class->subjects);
                                    foreach ($subjects as $subject) {
                                    $sub_query = mysqli_query($link, 'SELECT * FROM subjects WHERE id = '.$subject.'');
                                    $subject_value = mysqli_fetch_object($sub_query); ?>
                                <option value="<?php echo $subject_value->title; ?>"><?php echo $subject_value->title; ?></option>
                            <?php } ?>
                            </select>
                            <select class="mt-3 custom-select" name="period4">
                                <option selected>Select period4</option>
                                <option value="-">-</option>
                                <?php
                                    $subjects = explode(',', $class->subjects);
                                    foreach ($subjects as $subject) {
                                    $sub_query = mysqli_query($link, 'SELECT * FROM subjects WHERE id = '.$subject.'');
                                    $subject_value = mysqli_fetch_object($sub_query); ?>
                                <option value="<?php echo $subject_value->title; ?>"><?php echo $subject_value->title; ?></option>
                            <?php } ?>
                            </select>
                            <select class="mt-3 custom-select" name="period5">
                                <option selected>Select period5</option>
                                <option value="-">-</option>
                                <?php
                                    $subjects = explode(',', $class->subjects);
                                    foreach ($subjects as $subject) {
                                    $sub_query = mysqli_query($link, 'SELECT * FROM subjects WHERE id = '.$subject.'');
                                    $subject_value = mysqli_fetch_object($sub_query); ?>
                                <option value="<?php echo $subject_value->title; ?>"><?php echo $subject_value->title; ?></option>
                            <?php } ?>
                            </select>
                            <select class="mt-3 custom-select" name="period6">
                                <option selected>Select period6</option>
                                <option value="-">-</option>
                                <?php
                                    $subjects = explode(',', $class->subjects);
                                    foreach ($subjects as $subject) {
                                    $sub_query = mysqli_query($link, 'SELECT * FROM subjects WHERE id = '.$subject.'');
                                    $subject_value = mysqli_fetch_object($sub_query); ?>
                                <option value="<?php echo $subject_value->title; ?>"><?php echo $subject_value->title; ?></option>
                            <?php } ?>
                            </select>
                            <button type="submit" name="submit" class="btn btn-success float-right mt-3">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>    
    <?php } elseif(isset($_REQUEST['action2'])){ 
        $id = $_GET['action2'];
        $sql = "SHOW TABLES FROM schoolmsdb";
        $result = mysqli_query($link, $sql);
        while ($row = mysqli_fetch_row($result)) {
            if ($row[0] == $id) { 
                $count=1;
                break; 
            }
            else{
                $count=0;
            }
        }
        if($count == 0){
            $sql = "CREATE TABLE $id (
                id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                days VARCHAR(10) NOT NULL,
                period1 VARCHAR(30) NOT NULL,
                period2 VARCHAR(30) NOT NULL,
                period3 VARCHAR(30) NOT NULL,
                period4 VARCHAR(30) NOT NULL,
                period5 VARCHAR(30) NOT NULL,
                period6 VARCHAR(30) NOT NULL
                )";
                if ($link->query($sql) === TRUE) {}
        }?>
        <div class="container">
            <div class="row">
                <div class="col-8 mx-4 card">
                    <div class="card-header py-2">
                        <h3 class="card-title"><?php echo $id;?> TimeTable</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive bg-white">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Days</th>
                                    <th><h6><b>Period I</b><h6><h6>(8:00 - 8:50)<h6></th>
                                    <th><h6><b>Period II</b><h6><h6>(8:50 - 9:40)<h6></th>
                                    <th><h6><b>Period III</b><h6><h6>(9:40 - 10:30)<h6></th>
                                    <th rowspan='7'>
                                        <h4 class='mb-1 mt-4'>R</h4><h4 class='mb-1 mt-1'>E</h4><h4 class='mb-1 mt-1'>C</h4><h4 class='mb-1 mt-1'>E</h4><h4 class='mb-1 mt-1'>S</h4><h4 class='mb-4 mt-1'>S</h4><h4 class='mb-1 mt-4'>T</h4><h4 class='mb-1 mt-1'>I</h4><h4 class='mb-1 mt-1'>M</h4><h4 class='mb-4 mt-1'>E</h4>
                                    </th>
                                    <th><h6><b>Period IV</b><h6><h6>(11:00 - 11:50)<h6></th>
                                    <th><h6><b>Period V</b><h6><h6>(11:50 - 12:40)<h6></th>
                                    <th><h6><b>Period VI</b><h6><h6>(12:40 - 01:30)<h6></th>
                                </tr>
                                <?php
                                $tt_query = "SELECT * FROM $id";
                                $query = mysqli_query($link, $tt_query);
                                while ($period = mysqli_fetch_object($query)) {      
                                ?>
                                <tr>
                                    <td><?=$period->days?></td>
                                    <td><?=$period->period1?></td>
                                    <td><?=$period->period2?></td>
                                    <td><?=$period->period3?></td>
                                    <td><?=$period->period4?></td>
                                    <td><?=$period->period5?></td>
                                    <td><?=$period->period6?></td>
                                </tr>
                                <?php }?>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-3 ml-4 card">
                    <div class="card-header py-2">
                        <h3 class="card-title">Update TimeTable</h3>
                    </div>
                    <div class="card-body">
                        <?php
                            if (isset($_POST['submit'])){
                                $days = $_POST['days'];
                                $period1 = $_POST['period1'];
                                $period2 = $_POST['period2'];
                                $period3 = $_POST['period3'];
                                $period4 = $_POST['period4'];
                                $period5 = $_POST['period5'];
                                $period6 = $_POST['period6'];
                                $result2 = mysqli_query($link, "SELECT * FROM $id where days='$days'");
                                $num_rows = mysqli_num_rows($result2);
                                if ($num_rows > 0) {
                                    $query="UPDATE $id set days='$days', period1='$period1', period2='$period2', period3='$period3', period4='$period4', period5='$period5', period6='$period6' where days='$days'";  
                                    mysqli_query($link, $query);
                                }
                                else {
                                    $query="INSERT INTO $id (days, period1, period2, period3, period4, period5, period6) VALUES ('$days', '$period1', '$period2', '$period3', '$period4', '$period5', '$period6')";  
                                    mysqli_query($link, $query);
                                }
                            }
                        ?>
                        <form action="" method="POST">
                            <select class="custom-select" name="days">
                                <option selected>Select day</option>
                                <?php
                                    $days = array('MON', 'TUE', 'WED', 'THUR', 'FRI', 'SAT');
                                    $i=0;
                                    while($i<6){
                                ?>
                                <option value="<?php echo $days[$i] ?>"><?php echo $days[$i] ?></option>
                                <?php $i++; } ?>
                            </select>
                            <select class="mt-3 custom-select" name="period1">
                                <option selected>Select period1</option>
                                <option value="-">-</option>
                                <?php
                                    $class_query = mysqli_query($link, 'SELECT * FROM classes'); 
                                    while ($class = mysqli_fetch_object($class_query)) {?>
                                <option value="<?php echo $class->class; ?>"><?php echo $class->class; ?></option>
                                <?php } ?>
                            </select>
                            <select class="mt-3 custom-select" name="period2">
                                <option selected>Select period2</option>
                                <option value="-">-</option>
                                <?php
                                    $class_query = mysqli_query($link, 'SELECT * FROM classes'); 
                                    while ($class = mysqli_fetch_object($class_query)) {?>
                                <option value="<?php echo $class->class; ?>"><?php echo $class->class; ?></option>
                                <?php } ?>
                            </select>
                            <select class="mt-3 custom-select" name="period3">
                                <option selected>Select period3</option>
                                <option value="-">-</option>
                                <?php
                                    $class_query = mysqli_query($link, 'SELECT * FROM classes'); 
                                    while ($class = mysqli_fetch_object($class_query)) {?>
                                <option value="<?php echo $class->class; ?>"><?php echo $class->class; ?></option>
                                <?php } ?>
                            </select>
                            <select class="mt-3 custom-select" name="period4">
                                <option selected>Select period4</option>
                                <option value="-">-</option>
                                <?php
                                    $class_query = mysqli_query($link, 'SELECT * FROM classes'); 
                                    while ($class = mysqli_fetch_object($class_query)) {?>
                                <option value="<?php echo $class->class; ?>"><?php echo $class->class; ?></option>
                                <?php } ?>
                            </select>
                            <select class="mt-3 custom-select" name="period5">
                                <option selected>Select period5</option>
                                <option value="-">-</option>
                                <?php
                                    $class_query = mysqli_query($link, 'SELECT * FROM classes'); 
                                    while ($class = mysqli_fetch_object($class_query)) {?>
                                <option value="<?php echo $class->class; ?>"><?php echo $class->class; ?></option>
                                <?php } ?>
                            </select>
                            <select class="mt-3 custom-select" name="period6">
                                <option selected>Select period6</option>
                                <option value="-">-</option>
                                <?php
                                    $class_query = mysqli_query($link, 'SELECT * FROM classes'); 
                                    while ($class = mysqli_fetch_object($class_query)) {?>
                                <option value="<?php echo $class->class; ?>"><?php echo $class->class; ?></option>
                                <?php } ?>
                            </select>
                            <button type="submit" name="submit" class="btn btn-success float-right mt-3">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>    
    <?php } else { ?>
        <h4>Choose a Class:</h4>
        <div class="container mb-4">
            <div class="row">
                <?php
                    $class_query = mysqli_query($link, 'SELECT * FROM classes');
                    while ($class = mysqli_fetch_object($class_query)) {      
                ?>
                <div class="border rounded shadow bg-white col-2 mb-3 mx-4">
                    <h5 class="py-2 px-1"><b><?=$class->class; ?></b></h5>
                    <h6 class='float-right'><a href="?action1=<?=strtolower($class->class); ?>" name ="view" class=" btn btn-xs btn-success">View Timetable</a></h6>
                </div>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
</section>
<?php include("footer.php");?>

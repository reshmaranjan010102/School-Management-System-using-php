<?php
include("header.php");
?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Manage Classes</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Manage Classes</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <?php if(isset($_REQUEST['action1'])){ ?>
        <div class="container-fluid">
            <div class="row">
                <?php
                    if (isset($_POST['submit'])) 
                    {
                        $class = $_POST['class'];
                        $classteacher = $_POST['classteacher'];
                        $subjects = implode(',',$_POST['subjects']); 
                        $sql = "SELECT * FROM `classes` WHERE class = '$class'";
                        $result = mysqli_query($link, $sql);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $count = mysqli_num_rows($result);
                        if($count == 1)
                        {
                            echo '<script>alert("Class already exists")</script>';
                        }
                        else{
                            $query="INSERT INTO classes (class, classteacher, subjects) VALUES ('$class', '$classteacher', '$subjects')";  
                            mysqli_query($link, $query);  ?>
                            <h4><b class="text-success mb-4 mr-4"><?php echo $class;?> added successfully..!</b></h4>
                            <a href="classes.php" class="btn btn-success mb-4">Go Back</a>
                    <?php }} ?>
                <div class="card col-8 mr-3">
                    <div class="card-header py-2">
                        <h3 class="card-title">
                            Add new class
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="row">
                                <label class="col-1 mt-1" for="class">Class:</label>
                                <select class="col-3 custom-select" name="class">
                                    <option selected>Select one</option>
                                    <?php
                                        $count=1;
                                        while($count<13) { 
                                    ?>
                                    <option value="Class<?php echo $count ?>">Class<?php echo $count ?></option>
                                <?php $count++; } ?>
                                </select>
                                <label class="col-3 mt-1 ml-3 mr-0" for="class">Class Teacher:</label>
                                <select class="col-3 custom-select" name="classteacher">
                                    <option selected>Select one</option>
                                    <?php
                                        $sql = "SELECT name , subject FROM teachers WHERE NOT EXISTS (SELECT * FROM classes WHERE teachers.name = classes.classteacher )";
                                        $result = $link->query($sql);
                                        while($row = $result->fetch_assoc()) {
                                    ?>
                                    <option value="<?php echo $row['name'];?>" data-toggle="tooltip" data-placement="right" title="<?php echo $row['subject'] ?>"><?php echo $row['name'] ?></option>
                                <?php  }?>
                                </select>
                                <label class="col-2 mt-3" for="subjects">Subjects:</label>
                                <?php
                                    $query = mysqli_query($link, 'SELECT * FROM subjects');
                                    $count = 0;
                                    while ($subjects = mysqli_fetch_object($query)) { ?>
                                        <div class="mt-3 mr-4">
                                            <label for="<?=$count++?>">
                                            <input type="checkbox" id="<?=$count++?>" name="subjects[]" value="<?=$subjects->id?>" placeholder="subject" data-toggle="tooltip" data-placement="right" title="<?=$subjects->subteacher;?>">
                                            <?=$subjects->title?>
                                            </label>
                                        </div>
                                    <?php
                                    $count++;
                                } ?>
                            </div>
                            <button name ="submit" class="mt-3 btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="col-3 card ml-4 p-3">
                    <h5>Add subjects</h5><hr>
                    <?php
                        if (isset($_POST['add'])) 
                        {
                            $sub = $_POST['title'];
                            $subteacher = $_POST['subteacher'];
                            mysqli_query($link, "INSERT INTO subjects (title, subteacher) VALUE ('$sub', '$subteacher')");
                        }
                    ?>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="title">Subject:</label>
                            <select class="custom-select" name="title">
                                <option selected>Select one</option>
                                <?php
                                    $sql = "SELECT count(*), subject FROM teachers GROUP BY subject HAVING COUNT(*) >= 1";
                                    $result = $link->query($sql);
                                    while($row = $result->fetch_assoc()) { 
                                ?>
                                <option value="<?php echo $row['subject']; ?>"><?php echo $row['subject'] ?></option>
                                <?php } ?>
                            </select>
                            <label class="mt-1">Subject Teacher:</label>
                            <select class="custom-select" name="subteacher">
                                <option selected>Select one</option>
                                <?php
                                    $sql = "SELECT * FROM teachers";
                                    $result = $link->query($sql);
                                    while($row = $result->fetch_assoc()) { 
                                ?>
                                <option value="<?php echo $row['name']; ?>" data-toggle="tooltip" data-placement="right" title="<?php echo $row['subject'] ?>"><?php echo $row['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <button name="add" class="btn btn-success float-right">ADD Subject</button>
                    </form>
                </div>
            </div>
        </div>
    <?php } elseif(isset($_REQUEST['action2'])) {
        $id = $_GET['action2'];
        mysqli_query($link,"DELETE FROM classes where class='$id'");?>
        <h4><b class="text-danger"><?php echo $id;?> deleted successfully..!</b></h4>
        <a href="classes.php" class="btn btn-success">Go Back</a>
    <?php } elseif(isset($_REQUEST['action3'])){ 
        $id = $_GET['action3']; 
        if (isset($_POST['submit'])) 
        {
            $class = $_POST['title'];
            $classteacher = $_POST['classteacher'];
            $subjects = implode(',',$_POST['subjects']); 
            $query="UPDATE classes set classteacher='$classteacher', subjects='$subjects' where class='$class'";  
            mysqli_query($link, $query);  
        }?>
        <div class="container">
            <div class="row">
                <div class="card col-8 mr-1">
                    <div class="card-header py-2">
                        <h3 class="card-title">
                            Update:
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="row">
                                <label class="col-2 mt-1" for="class">Class:</label>
                                <input type="text" class="col-4form-control" name="title" value="<?php echo $id; ?>" readonly>
                                <label class="col-3 mt-1 ml-4" for="class">Class Teacher:</label>
                                <?php 
                                $sql2 = mysqli_query($link, "SELECT * from classes where class='$id';");
                                $sq = mysqli_fetch_array($sql2);
                                ?>
                                <select class="col-3 custom-select" name="classteacher">
                                    <option selected><?=$sq['classteacher'];?></option>
                                    <?php
                                        $sql = "SELECT * FROM teachers";
                                        $result = $link->query($sql);
                                        while($row = $result->fetch_assoc()) { 
                                    ?>
                                    <option value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
                                <?php } ?>
                                </select>
                                <label class="col-2 mt-3" for="subjects">Subjects:</label>
                                <?php
                                    $query = mysqli_query($link, 'SELECT * FROM subjects');
                                    $count = 0;
                                    while ($subjects = mysqli_fetch_object($query)) { ?>
                                        <div class="mt-3 mr-4">
                                            <label for="<?=$count++?>">
                                            <input type="checkbox" id="<?=$count++?>" name="subjects[]" value="<?=$subjects->id?>" placeholder="subject">
                                            <?=$subjects->title?>
                                            </label>
                                        </div>
                                    <?php
                                    $count++;
                                } ?>
                            </div>
                            <button name ="submit" class="mt-3 btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="col-3 ml-4 card p-3">
                    <h5>update Subject Teacher :</h5><hr>
                    <?php
                        if (isset($_POST['update'])) 
                        {
                            $sub = $_POST['title'];
                            $subteacher = $_POST['subteacher'];
                            $sub = mysqli_real_escape_string($link, $sub);
                            mysqli_query($link, "UPDATE subjects set subteacher='$subteacher' where title='$sub'");
                        }
                    ?>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="title">Subject:</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter Subject" required>
                            <label class="mt-1">Subject Teacher:</label>
                            <select class="custom-select" name="subteacher">
                                <option selected>Select one</option>
                                <?php
                                    $sql = "SELECT * FROM teachers";
                                    $result = $link->query($sql);
                                    while($row = $result->fetch_assoc()) { 
                                ?>
                                <option value="<?php echo $row['name'] ?>" data-toggle="tooltip" data-placement="right" title="<?php echo $row['subject'] ?>"><?php echo $row['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <button name="update" class="btn btn-success float-right">Update</button>
                    </form>
                </div>
            </div>
        </div>
    <?php } else {?>
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="font-weight-bold d-inline-block text-primary">Classes</h5>
                        <a href="?action1=add-new" class="btn btn-success mr-4 float-right btn-sm">
                            <i class="fa fa-plus"> Add New</i>
                        </a>
                    </div>
                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                            <thead class="thead-light">
                                <tr>
                                    <th rowspan="2">S.No.</th>
                                    <th rowspan="2">Classes</th>
                                    <th rowspan="2">Class Teacher</th>
                                    <th rowspan="2">Total Students</th>
                                    <th colspan="2">Subjects</th>
                                    <th rowspan="2">Action</th>
                                </tr>
                                <tr>
                                    <th>Subjects</th>
                                    <th>Subject Teacher</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 1;
                                $class_query = mysqli_query($link, 'SELECT * FROM classes');
                                while ($class = mysqli_fetch_object($class_query)) {      
                                $student_query = "SELECT * FROM students where classid = 'class$count'";
                                $result = mysqli_query($link, $student_query); 
                                if ($result) 
                                { 
                                    $row_no_students = mysqli_num_rows($result);       
                                }
                                ?>
                                <tr>
                                    <td><?=$count++?></td>
                                    <td><?=$class->class?></td>
                                    <td><?=$class->classteacher?></td>
                                    <td><?=$row_no_students?></td>
                                    <td>
                                        <?php
                                            $subjects = explode(',', $class->subjects);
                                            foreach ($subjects as $subject) {
                                                $sub_query = mysqli_query($link, 'SELECT * FROM subjects WHERE id = '.$subject.'');
                                                $subject_value = mysqli_fetch_object($sub_query);
                                                echo $subject_value->title.'<br>';
                                        } ?>
                                    </td>
                                    <td>
                                        <?php
                                            foreach ($subjects as $subject) {
                                                $sub_query = mysqli_query($link, 'SELECT * FROM subjects WHERE id = '.$subject.'');
                                                $subject_value = mysqli_fetch_object($sub_query);
                                                echo $subject_value->subteacher.'<br>';
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="?action2=<?php echo $class->class;?>"><i class="fas fa-fw fa-trash"></i></a> / <a href="?action3=<?php echo $class->class;?>"><i class="fas fa-fw fa-edit"></i></a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</section>
<?php include("footer.php");?>
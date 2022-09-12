<?php
    include('header.php');
    include_once('../../service/mysqlcon.php');
    include('main.php');
?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Add Students</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Manage users</a></li>
                    <li class="breadcrumb-item"><a href="#">Students</a></li>
                    <li class="breadcrumb-item active">Add new</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="card col-9 m-auto">
        <div class="card-header">
            <h4 class="card-title">Student Registration</h4>
        </div>
        <div class="card-body">
            <form action="#" method="post"onsubmit="return newStudentValidation();" enctype="multipart/form-data">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label class="mb-2">Id:</label>
                            <input id="stuId"type="text" name="studentId" placeholder="Enter Id"><br>
                            <label class="mb-2">Name:</label>
                            <input id="stuName" type="text" name="studentName" placeholder="Enter Name"><br>
                            <label class="mb-2">Gender:</label>
                            <input type="radio" name="gender" value="Male" onclick="stuGender = this.value;"> Male <input type="radio" name="gender" value="Female" onclick="this.value"> Female<br>
                            <label class="mb-2">DOB:</label>
                            <input id="stuDOB"type="text" name="studentDOB" placeholder="Enter DOB(yyyy-mm-dd)"><br>
                            <label class="mb-2">Phone:</label>
                            <input id="stuPhone"type="text" name="studentPhone" placeholder="Enter Phone Number">
                        </div>
                        <div class="col-md-6">
                            <label class="mb-2">Email:</label>
                            <input id="stuEmail"type="text" name="studentEmail" placeholder="Enter Email">
                            <label class="mb-2">Admission Date:</label>
                            <input id="stuAddmissionDate"name="studentAddmissionDate"value = "<?php echo date('Y-m-d');?>" readonly>
                            <label class="mb-2">Class Id:</label>
                            <input id="stuClassId" type="text" name="studentClassId" placeholder="Enter Class Id">
                            <label class="mb-2">Password :</label>
                            <input id="stuPassword"type="text" name="studentPassword" placeholder="Enter Password">
                            <label class="mb-2">Address:</label>
                            <input id="stuAddress" type="text" name="studentAddress" placeholder="Enter Address">
                        </div>
                    </div>
                    <div>
                        <input class="btn btn-success" type="submit" name="submit" value="Submit">
                        <input class="btn btn-success" type="reset" name="reset" value="Reset">
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<?php
    if(!empty($_POST['submit'])){
        $stuId = $_POST['studentId'];
        $stuName = $_POST['studentName'];
        $stuPassword = $_POST['studentPassword'];
        $stuPhone = $_POST['studentPhone'];
        $stuEmail = $_POST['studentEmail'];
        $stugender = $_POST['gender'];
        $stuDOB = $_POST['studentDOB'];
        $stuAddmissionDate = $_POST['studentAddmissionDate'];
        $stuAddress = $_POST['studentAddress'];
        $stuParentId = $_POST['studentParentId'];
        $stuClassId = $_POST['studentClassId'];
        $sql = "INSERT INTO students VALUES('$stuId','$stuName','$stuPhone','$stuEmail','$stugender','$stuDOB','$stuAddmissionDate','$stuAddress','$stuParentId','$stuClassId');";
        $success = mysql_query($sql);
        $sql = "INSERT INTO users VALUES('$stuId','$stuPassword','student');";
        $success = mysql_query($sql);
        if(!$success) {
            die('Could not enter data: '.mysql_error());
        }
        echo "Entered data successfully\n";
    }
    include("footer.php");
?>

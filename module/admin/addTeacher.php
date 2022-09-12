<?php
    include_once('../../service/mysqlcon.php');
    include('main.php');
    include('header.php');
?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Add Teacher</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Manage users</a></li>
                    <li class="breadcrumb-item"><a href="#">Teachers</a></li>
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
            <h4 class="card-title">Teacher Registration</h4>
        </div>
        <div class="card-body">
            <form action="#" method="POST">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label class="mb-2">Id:</label>
                            <input class="mb-2" id="teaId"type="text" name="teacherId" placeholder="Enter Id"><br>
                            <label class="mb-2">Name:</label>
                            <input class="mb-2" id="teaName" type="text" name="teacherName" placeholder="Enter Name"><br>
                            <label class="mb-2">Gender:</label>
                            <input class="mb-2" type="radio" name="gender" value="Male" onclick="teaGender = this.value;"> Male <input class="mb-2" type="radio" name="gender" value="Female" onclick="teaGender = this.value;"> Female<br>
                            <label class="mb-2">DOB:</label>
                            <input class="mb-2" id="teaDOB"type="date" name="teacherDOB" placeholder="Enter DOB(yyyy-mm-dd)"><br>
                            <label class="mb-2">Phone:</label>
                            <input id="teaPhone"type="text" name="teacherPhone" placeholder="Enter Phone Number">
                        </div>
                        <div class="col-md-6">
                            <label class="mb-2">Email:</label>
                            <input id="teaEmail"type="text" name="teacherEmail" placeholder="Enter Email"><br>
                            <label class="mb-2">Hire Date:</label>
                            <input id="teaHireDate"name="teacherHireDate"value = "<?php echo date('Y-m-d');?>" readonly><br>
                            <label class="mb-2">Subject:</label>
                            <input id="teaSubject"type="text" name="teacherSubject" placeholder="Enter Subject"><br>
                            <label class="mb-2">Password :</label>
                            <input id="teaPassword"type="password" name="teacherPassword" placeholder="Enter Password"><br>
                            <label class="mb-2">Address:</label>
                            <input id="teaAddress" type="text" name="teacherAddress" placeholder="Enter Address">
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
        $teaId = $_POST['teacherId'];
        $teaName = $_POST['teacherName'];
        $teaPassword = $_POST['teacherPassword'];
        $teaPhone = $_POST['teacherPhone'];
        $teaEmail = $_POST['teacherEmail'];
        $teaGender = $_POST['gender'];
        $teaDOB = $_POST['teacherDOB'];
        $teaHireDate = $_POST['teacherHireDate'];
        $teaAddress = $_POST['teacherAddress'];
        $teaSubject = $_POST['teacherSubject'];
        $sql = "INSERT INTO teachers VALUES('$teaId','$teaName','$teaPassword','$teaPhone','$teaEmail','$teaAddress','$teaGender','$teaDOB','$teaHireDate','$teaSubject');";
        $success = mysqli_query($link, $sql );
        $sql = "INSERT INTO users VALUES('$teaId','$teaPassword','teacher');";
        $success = mysqli_query($link, $sql );
        if(!$success) {
            die('Could not enter data: '.mysqli_error());
        }
        echo "Entered data successfully\n";
    }
    include("footer.php");
?>

<?php
	include_once('main.php');
	include('header.php');
    ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Hello! <?php echo$row['name'];?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Admission Letter</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<?php
    $sql = "SELECT * FROM admissionform WHERE email = '$check'";
    $result = $link->query($sql);
    $row = $result->fetch_assoc();
    if (($row['status'])==((2))) {
?>
<div class="mx-4">
    <span class="style6">
    <?php
        $sql = "SELECT * FROM students WHERE email = '$check'";
        $result = $link->query($sql);
        $row1 = $result->fetch_assoc();
        if (($row1['status'])==((0))) {
    ?>
        <a href="admissionletter.php?email=<?php echo $row['email'];?>" class="btn btn-sm btn-success">Accept</a> 
        <?php
            if(isset($_GET['email']))
            {
                $uid = $_GET['email'];
                mysqli_query($link,"UPDATE students set status='1' where email='$uid'");
                echo '<script>alert("Thank you for choosing our school!")</script>';
            }
        ?>
    <?php } ?>
    </span>
</div>
<div class="card m-4" style="background:#ff00711a;">
    <div class="card-header">
        <div class="d-flex flex-column">
            <img src="../../assets/Images/school-icon.png" alt="" class="mx-auto p-1 rounded-circle border border-danger" style="width:60px; height:60px;">
            <h3 class="mx-auto text-decoration-underlined">Admission Letter</h3>
        </div>
    </div>
    <div class="card-body">
        <p><b>Dear <?php echo $row['name']."," ?></b></p>
        <p>Congratulations! We are pleased to tell you that, your admission form is accepted. </p>
        <p><b>PROCEDURE FOR PAYMENT OF ACCEPTANCE FEE, ACADEMIC CLEARANCE & PAYMENT OF TUITION FEE:</b></p>
        <p>YOU ARE EXPECTED TO PAY THE ACCEPTANCE FEE ON OR BEFORE 7TH AUGUST, 2022. PLEASE NOTE THAT THE ACCEPTANCE FEE IS NON-REFUNDABLE AND DOES NOT GUARANTEE YOUR ADMISSION. NOTE THAT UNDER NO CIRCUMSTANCE WOULD THE DATE FOR THE PAYMENT OF ACCEPTANCE FEE BE EXTENDED.
            <ol>
                <li>PAY YOUR ACCEPTANCE FEE WITH AN ATM CARD.</li>
                <li>PRINT YOUR ACCEPTANCE FEE RECEIPT AND CLEARANCE SCHEDULE.</li>
                <li>KEEP YOUR RECEIPT AND CLEARANCE SCHEDULE FOR REGISTRATION.</li>
                <li>DEADLINE FOR PAYMENT OF TUITION FEE IS 24TH NOVEMBER, 2017.</li>
            </ol>
            <b>TUITION FEE MUST BE PAID BY 24TH JULY, 2022 FAILING WHICH YOU FORFEIT THIS PROVISIONAL OFFER OF ADMISSION.</b><br>

            SIGNED<br>
            ---------------------<br>
            REGISTRAR
        </p>
    </div>
</div>
<?php } else { ?>
    <h4 class="mx-4" style="color:red">Sorry, no Admission yet. Check back later.</h4>
<?php } ?>
<?php include('footer.php');?>
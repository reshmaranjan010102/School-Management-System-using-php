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
                    <li class="breadcrumb-item active">Offer Letter</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<?php
    $sql = "SELECT * FROM teachers WHERE email = '$check'";
    $result = $link->query($sql);
    $row = $result->fetch_assoc();
    if ((($row['status'])==2) or ($row['status'])==3) {
?>
<div class="mx-4">
    <span class="style6">
    <?php
        $sql = "SELECT * FROM teachers WHERE email = '$check'";
        $result = $link->query($sql);
        $row1 = $result->fetch_assoc();
        if (($row1['status'])==2) {
    ?>
        <a href="offerLetter.php?email=<?php echo $row['email'];?>" class="btn btn-sm btn-success">Accept</a> 
        <?php
            if(isset($_GET['email']))
            {
                $uid = $_GET['email'];
                mysqli_query($link,"UPDATE teachers set status='3' where email='$uid'");
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
            <h5 class="mx-auto text-decoration-underlined"><b>Appointment Letter for a Teacher for the Post of <?=$row1['subject'];?> Teacher</b></h5>
        </div>
    </div>
    <div class="card-body">
        <p>
        <b>Name:</b> <?=$row1['name'];?> <br>
        <b>Address:</b> <?=$row1['address'];?> <br>
        <b>Email:</b> <?=$row1['email'];?><br>
        <b>Phone:</b> <?=$row1['phone'];?><br><br>
        Dear <?=$row1['name'];?>,<br>
        This is with reference to your application for the post of TGT <?=$row1['subject'];?>. We are glad to inform you that you have been selected for the post of TGT <?=$row1['subject'];?>  in the Our School.<br>
        As per the discussions, We have decided your joining date as <?=$row1['hiredate'];?> and prior to that, there would be a meeting which is scheduled on <?=$row1['hiredate'];?> with the Principal and other staff members.<br>
        The following criteria apply to this provisional appointment offer:<br><br>
        Acceptance of the offer.<br>
        Joining latest by the <?=$row1['hiredate'];?>.<br>
        Submission of educational certificates, ID proof, address proof and PAN card within the next 3 months.<br>
        Kindly send us a signed copy of the appointment letter along with a copy of relevant documents as a confirmation of your acceptance of the offer.<br><br>
        <b>Best wishes.</b><br><br>
        Yours sincerely,<br><br>
        <b>SNEHA SAISHREE</b><br>
        Principal
        </p>
    </div>
</div>
<?php } else { ?>
    <h4 class="mx-4" style="color:red">Sorry, no Offer letter yet. Check back later.</h4>
<?php } ?>
<?php include('footer.php');?>
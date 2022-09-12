<?php
	include_once('main.php');
	include('header.php');
	$sql = "SELECT * FROM students WHERE email = '$check'";
	$result = $link->query($sql);
	$row = $result->fetch_assoc();
    $id=$row['classid'];
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
				<h4><b>Welcome to your class! <?php echo$row['name'];?></b></h6>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Classroom</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="mx-3">
    <?php
    $tea = mysqli_query($link, "SELECT classes.classteacher, subjects.title FROM classes join Subjects on classes.classteacher = subjects.subteacher where class='$id';");
    $teacher = mysqli_fetch_array($tea);
    ?>
    <h6><b>Class : </b><?php echo $row['classid'] ?></h6>
	<h6><b>Class Teacher : </b><?=$teacher['classteacher'];?> (<?=$teacher['title'];?> TGT)</h6> 
</div><hr>
<h5 class='mx-4'><b>Todays Schedule</b></h5>
<div class="container">
    <div class="row">
        <div class="col-8">
            <div class="row">
                <?php
                    $count = 1;
                    $tt_query = "SELECT * FROM $id";
                    $query = mysqli_query($link, $tt_query);
                    while ($period = mysqli_fetch_object($query)) {
                        if(strtoupper(date('D'))==$period->days){
                        date_default_timezone_set('Asia/Kolkata');                     
                        if(date('h:i', time()) >= '08:00' && date('h:i', time()) <= '08:50') { ?>
                            <div class="col-4 ml-4 my-2 border rounded border-muted p-2 bg-green">
                                <h6 align='center'><b>Period I</b> (8:00 - 8:50)</h6><hr>
                                <h5 align='center'><?=$period->period1?></h5>
                            </div>
                            <?php } else { ?>
                            <div class="col-4 ml-4 my-2 border rounded border-muted p-2 bg-info">
                                <h6 align='center'><b>Period I</b> (8:00 - 8:50)</h6><hr>
                                <h5 align='center'><?=$period->period1?></h5>
                            </div>
                        <?php }
                        if(date('h:i', time()) >= '08:51' && date('h:i', time()) <= '09:40') { ?>
                            <div class="col-4 ml-4 my-2 border rounded border-muted p-2 bg-green">
                                <h6 align='center'><b>Period II</b> (8:50- 9:40)</h6><hr>
                                <h5 align='center'><?=$period->period2?></h5>
                            </div>
                            <?php } else { ?>
                            <div class="col-4 ml-4 my-2 border rounded border-muted p-2 bg-info">
                                <h6 align='center'><b>Period II</b> (8:50- 9:40)</h6><hr>
                                <h5 align='center'><?=$period->period2?></h5>
                            </div>
                        <?php }
                        if(date('h:i', time()) >= '09:41' && date('h:i', time()) <= '10:30') { ?>
                            <div class="col-4 ml-4 my-2 border rounded border-muted p-2 bg-green">
                                <h6 align='center'><b>Period III</b> (9:4 - 10:30)</h6><hr>
                                <h5 align='center'><?=$period->period3?></h5>
                            </div>
                            <?php } else { ?>
                            <div class="col-4 ml-4 my-2 border rounded border-muted p-2 bg-info">
                                <h6 align='center'><b>Period III</b> (9:4 - 10:30)</h6><hr>
                                <h5 align='center'><?=$period->period3?></h5>
                            </div>
                        <?php }
                        if(date('h:i', time()) >= '11:01' && date('h:i', time()) <= '11:50') { ?>
                            <div class="col-4 ml-4 my-2 border rounded border-muted p-2 bg-green">
                                <h6 align='center'><b>Period IV</b> (11:00 - 11:50)</h6><hr>
                                <h5 align='center'><?=$period->period4?></h5>
                            </div>
                            <?php } else { ?>
                            <div class="col-4 ml-4 my-2 border rounded border-muted p-2 bg-info">
                                <h6 align='center'><b>Period IV</b> (11:00 - 11:50)</h6><hr>
                                <h5 align='center'><?=$period->period4?></h5>
                            </div>
                        <?php }
                        if(date('h:i', time()) >= '11:51' && date('h:i', time()) <= '12:40') { ?>
                            <div class="col-4 ml-4 my-2 border rounded border-muted p-2 bg-green">
                                <h6 align='center'><b>Period V</b> (11:5 - 12:40)</h6><hr>
                                <h5 align='center'><?=$period->period5?></h5>
                            </div>
                            <?php } else { ?>
                            <div class="col-4 ml-4 my-2 border rounded border-muted p-2 bg-info">
                                <h6 align='center'><b>Period V</b> (11:5 - 12:40)</h6><hr>
                                <h5 align='center'><?=$period->period5?></h5>
                            </div>
                        <?php }
                        if(date('h:i', time()) >= '12:41' && date('h:i', time()) <= '01:30') { ?>
                            <div class="col-4 ml-4 my-2 border rounded border-muted p-2 bg-green">
                                <h6 align='center'><b>Period VI</b> (12:41 - 01:30)</h6><hr>
                                <h5 align='center'><?=$period->period6?></h5>
                            </div>
                            <?php } else { ?>
                            <div class="col-4 ml-4 my-2 border rounded border-muted p-2 bg-info">
                                <h6 align='center'><b>Period VI</b> (12:41 - 01:30)</h6><hr>
                                <h5 align='center'><?=$period->period6?></h5>
                            </div>
                        <?php } ?>
                <?php }}?>
            </div>
        </div>
        <div class="col-2 d-flex flex-column" style="position:relative; right:-16%;">
            <div id="clockContainer">
                <div id="hour"></div>
                <div id="minute"></div>
                <div id="second"></div>
            </div>
            <h5 class="rounded py-2 px-4 bg-dark"><?=date('d-m-y D');?></h5>
        </div>
    </div>
</div>
<script>
    setInterval(() => {
        d = new Date(); //object of date()
        hr = d.getHours();
        min = d.getMinutes();
        sec = d.getSeconds();
        hr_rotation = 30 * hr + min / 2; //converting current time
        min_rotation = 6 * min;
        sec_rotation = 6 * sec;
    
        hour.style.transform = `rotate(${hr_rotation}deg)`;
        minute.style.transform = `rotate(${min_rotation}deg)`;
        second.style.transform = `rotate(${sec_rotation}deg)`;
    }, 1000);
</script>

<?php include('footer.php');?>
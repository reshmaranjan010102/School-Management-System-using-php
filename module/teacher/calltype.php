<?php
include '../../service/mysqlcon.php';
    $tid = intval($_GET['tid']);
    $class = $_GET['class'];
    if($tid == 1){ ?>
        <div class="mr-4">
            <label class="form-control-label">Select Date<span class="text-danger ml-2">*</span></label>
            <input type="date" class="form-control" name="date" />
        </div>
    <?php } elseif($tid == 2){ ?>
        <div class="mr-4">
            <label class="form-control-label">Select Student<span class="text-danger ml-2">*</span></label>
            <select required name="tname" class="form-control mb-3">
                <option value="">--Select--</option>
                <?php $student = mysqli_query($link, "SELECT * FROM students where classid='$class';");
                while($row = mysqli_fetch_array($student)){ ?>
                    <option value="<?=$row['name'];?>"><?=$row['name'];?></option>
                <?php } ?>
            </select>
        </div>
    <?php } else {
    }
?>
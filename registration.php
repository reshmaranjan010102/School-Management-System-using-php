<?php
    include('header.php');
    include('./service/mysqlcon.php');
?>
<section>
    <?php if(isset($_REQUEST['user'])){
        if (isset($_POST['submit'])) 
        {
            $fname = $_POST['fname'];
            $email_ID = $_POST['userid'];
            $pass = $_POST['password'];
            $confirmpass = $_POST['confirmpassword'];
                
            $email_ID = mysqli_real_escape_string($link, $email_ID);
            $sql = "SELECT * FROM `users` WHERE userid = '$email_ID'";
            $result = mysqli_query($link, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);
    
            if($count == 1)
            {
                echo '<script>alert("email already exists")</script>';
            }
            elseif($pass != $confirmpass){
                echo '<script>alert("password does not match:(")</script>';
            }
            else{
                $result = mysqli_query($link, "INSERT INTO `users` (`userid`, `password`,`usertype`) VALUES ('$email_ID', '$pass', 'student');");
                $sql1 = "INSERT INTO students (`name`, `email`) VALUES ('$fname', '$email_ID');";
                $success = mysqli_query($link, $sql1);
                $sql2 = "INSERT INTO admissionform (`name`, `email`) VALUES ('$fname', '$email_ID');";
                $success = mysqli_query($link, $sql2);
                if($result){
                    echo '<script>alert("Student registered successfully.")</script>';
                    header('Location:./login.php?user=Student');
                }
            }
        }?>
        <center>
            <h2 class="mt-3 box-info shadow py-2"><b>Student's Registration Portal</b></h2>
        </center>
        <div class="container-fluid d-flex">
            <div class="col-5 mt-4 mx-4">
                <div>
                    <h3>Welcome to the registration portal</h3>
                    <?php 
                        $sq=mysqli_query($link, "SELECT * FROM registration;");
                        $check=mysqli_fetch_array($sq);
                    ?>
                    <div>
                        <h6>New Registration for admission <?=$check['session'];?> begins:</h6>
                        <b class="text-danger">Starting date : <?=$check['sdate'];?></b><br>
                        <b class="text-danger">Last date : <?=$check['edate'];?></b>
                        <hr>
                        <ul>
                            <li>This portal caters to the registration of all candidates seeking admission at the City School.</li>
                            <li>A large number of students will be registering simultaneously. Due to the heavy traffic, you may face delays in submitting your form.</li>
                            <li>Kindly do not wait for the last day of registration to complete your online registration form.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-5 ms-4 mt-4">
                <div class="card bg-light shadow">
                    <div class="card-header bg-info">
                        <h3 class="text-light">Registration Form</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" name="reg_form" onsubmit="return validate()">
                            <div class="container">
                                <div class="row">
                                    <div class="md-form mb-2">
                                        <label for="fname">Name :<sup class=text-danger>*</sup></label>
                                        <input type="text" name="fname" class="form-control" required>
                                    </div>
                                    <div class="md-form mb-2">
                                        <label for="userid">Email :<sup class=text-danger>*</sup></label>
                                        <input type="email" id="userid" name="userid" class="form-control" required>
                                    </div>
                                    <div class="md-form col-6 mb-2">
                                        <label for="password">Password :<sup class=text-danger>*</sup></label>
                                        <input type="password" name="password" class="form-control" required>
                                    </div>
                                    <div class="md-form col-6 mb-2">
                                        <label for="confirmpassword">Confirm password :<sup class=text-danger>*</sup></label>
                                        <input type="password" name="confirmpassword" class="form-control" required>
                                    </div>
                                    <div class="form-check mx-3">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"required>
                                        <label class="fom-check-label" for="flexCheckDefault"><sup class=text-danger>*</sup>I agree with all terms & conditions.</label>
                                    </div>
                                    <div class="text-center mt-3">
                                        <button class="btn btn-secondary" name="submit" type="submit">Submit</button>
                                        <button class="btn btn-secondary" name="reset" type="reset">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php } else {
        if (isset($_POST['submit'])) 
        {
            $fname = $_POST['fname'];
            $email_ID = $_POST['userid'];
            $pass = $_POST['password'];
            $confirmpass = $_POST['confirmpassword'];
                
            $email_ID = mysqli_real_escape_string($link, $email_ID);
            $sql = "SELECT * FROM `users` WHERE userid = '$email_ID'";
            $result = mysqli_query($link, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);
    
            if($count == 1)
            {
                echo '<script>alert("email already exists")</script>';
            }
            elseif($pass != $confirmpass){
                echo '<script>alert("password does not match:(")</script>';
            }
            else{
                $result = mysqli_query($link, "INSERT INTO `users` (`userid`, `password`,`usertype`) VALUES ('$email_ID', '$pass', 'teacher');");
                $sql1 = "INSERT INTO teachers (`name`, `email`) VALUES ('$fname','$email_ID');";
                $success = mysqli_query($link, $sql1);
                if($result){
                    echo '<script>alert("Student registered successfully.")</script>';
                    header('Location:./login.php?user=Teacher');
                }
            }
        }?>
        <center>
            <h2 class="mt-3 box-info shadow py-2 mb-3"><b>Teacher's Registration Portal</b></h2>
        </center>
        <div class="container">
            <div class="col-6 m-2 mx-auto">
                <div class="card bg-light shadow">
                    <div class="card-header bg-info">
                        <h3 class="text-light">Registration Form</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" name="reg_form" onsubmit="return validate()">
                            <div class="container">
                                <div class="row">
                                    <div class="md-form mb-2">
                                        <label for="fname">Name :<sup class=text-danger>*</sup></label>
                                        <input type="text" name="fname" class="form-control" required>
                                    </div>
                                    <div class="md-form mb-2">
                                        <label for="userid">Email :<sup class=text-danger>*</sup></label>
                                        <input type="email" id="userid" name="userid" class="form-control" required>
                                    </div>
                                    <div class="md-form col-6 mb-2">
                                        <label for="password">Password :<sup class=text-danger>*</sup></label>
                                        <input type="password" id="psw" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class="form-control" required>
                                    </div>
                                    <div class="md-form col-6 mb-2">
                                        <label for="confirmpassword">Confirm password :<sup class=text-danger>*</sup></label>
                                        <input type="password" name="confirmpassword" class="form-control" required>
                                    </div>
                                    <div class="form-check mx-3">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"required>
                                        <label class="fom-check-label" for="flexCheckDefault"><sup class=text-danger>*</sup>I agree with all terms & conditions.</label>
                                    </div>
                                    <div class="text-center mt-3">
                                        <button class="btn btn-secondary" name="submit" type="submit">Submit</button>
                                        <button class="btn btn-secondary" name="reset" type="reset">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="message">
                        <h3>Password must contain the following:</h3>
                        <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                        <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                        <p id="number" class="invalid">A <b>number</b></p>
                        <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</section>
<script type="text/javascript" src="./javascript/registrationformvalidation.js"></script>
<?php include('footer.php'); ?>
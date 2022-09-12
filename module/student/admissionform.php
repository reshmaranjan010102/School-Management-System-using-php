<?php include('header.php');
    $session=mysqli_query($link,"SELECT name  FROM students WHERE email='$check' ");
    $row1=mysqli_fetch_array($session);
    $login_session = $loged_user_name = $row1['name'];
    if (isset($_POST['submit'])) 
    {
        $name = $_POST['name'];
        $dob = $_POST['dob'];
        $sex = $_POST['sex'];
        $email = $_POST['email'];
        $fname = $_POST['fname'];
        $femail = $_POST['femail'];
        $mname = $_POST['mname'];
        $memail = $_POST['memail'];
        $address = $_POST['address'];
        $mob1 = $_POST['mob1'];
        $mob2 = $_POST['mob2'];
        $nationality = $_POST['nationality'];
        $religion = $_POST['religion'];
        $class = $_POST['class'];
        $result2 = mysqli_query($link, "SELECT * FROM admissionform where name='$name'");
        $num_rows = mysqli_num_rows($result2);
        if ($num_rows > 0) {
            mysqli_query($link, "UPDATE admissionform set name='$name', sex='$sex', dob='$dob', email='$email', fname='$fname', femail='$femail', mname='$mname', memail='$memail', address='$address', mob1='$mob1', mob2='$mob2', nationality='$nationality', religion='$religion', class='$class' , status='1' where name='$name'");
        }
        else {
            mysqli_query($link, "INSERT INTO admissionform (name, sex, dob, email, fname, femail, mname, memail, address, mob1, mob2, nationality, religion, class , status) VALUES ('$name', $sex, '$dob', '$email', '$sex', '$fname', '$femail', '$mname', '$memail', '$address', '$mob1', '$mob2', '$nationality', '$religion', '$class' , '1');");
        }
        $sql = "UPDATE students set phone='$mob1', sex='$sex', dob='$dob', address='$address', classid='$class' where name='$name'";
        $success = mysqli_query($link, $sql);
    }
    $result3 = mysqli_query($link, "SELECT * FROM admissionform where name='$name' and status = '0'");
    $num_rows = mysqli_num_rows($result3);
    if($num_rows==1){
?>   
    <section class="bg-white">
        <div class="col-11 mx-auto my-4 mb-4">
            <div class="card" style="background:#ff00711a;">
                <div class="card-header">
                    <div class="d-flex flex-column">
                        <img src="../../assets/Images/school-icon.png" alt="" class="mx-auto p-1 rounded-circle border border-danger" style="width:60px; height:60px;">
                        <h3 class="mx-auto text-decoration-underlined">Admission Form</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form action="" method="POST" name="admission_form" onsubmit="return validate()">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="md-form">
                                        <label for="name">Student's Name :<sup class=text-danger>*</sup></label>
                                        <input type="text" name="name" value="<?=$login_session;?>" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="md-form">
                                        <label for="dob">Date of Birth :<sup class=text-danger>*</sup></label>
                                        <input type="date" name="dob" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="md-form">
                                        <label for="email">Student Email :<sup class=text-danger>*</sup></label>
                                        <input type="email" id="email" name="email" value="<?=$check;?>" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="md-form">
                                        Gender :<sup class=text-danger>*</sup> 
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sex" value="female" required/>
                                            <label class="form-check-label" for="female">Female</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sex" value="male" required/>
                                            <label class="form-check-label" for="male">Male</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="md-form">
                                        <label for="fname">Father's Name :<sup class=text-danger>*</sup> </label>
                                        <input type="text" name="fname" class="form-control" required/>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="md-form">
                                       <label for="femail">Father's Email :<sup class=text-danger>*</sup></label>
                                        <input type="email" id="femail" name="femail" class="form-control" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="md-form">
                                        <label for="mname">Mother's Name :<sup class=text-danger>*</sup></label>
                                        <input type="text" name="mname" class="form-control" required/>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="md-form">
                                       <label for="memail">Mother's Email :<sup class=text-danger>*</sup></label>
                                        <input type="email" id="memail" name="memail" class="form-control" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6 md-form">
                                    <label for="address">Address :<sup class=text-danger>*</sup></label>
                                    <input type="text" name="address" class="form-control" required/>
                                </div>
                                <div class="col-md-6 md-form">
                                    <label for="class">Class in which admission sought :<sup class=text-danger>*</sup></label>
                                    <input type="text" name="class" class="form-control" required/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="md-form">
                                        <label for="mob1">Mobile. no (1) :<sup class=text-danger>*</sup></label>
                                        <input type="tel" id="myform_phone2" class="form-control" name="mob1" pattern="[0-9]{10}" required/>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="md-form">
                                        <label for="mob2">Mobile. no (2) : </label>
                                        <input type="tel" id="myform_phone2" class="form-control" name="mob2" pattern="[0-9]{10}" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="md-form">
                                        <label for="nationality">Nationality :<sup class=text-danger>*</sup></label>
                                        <select class="form-control custom-select" name="nationality">
                                            <option selected>Select one</option>
                                            <option value="India">India</option>
                                            <option value="Pakistan">Pakistan</option>
                                            <option value="Nepal">Nepal</option>
                                            <option value="China">China</option>
                                            <option value="USA">USA</option>
                                            <option value="Sri Lanka">Sri Lanka</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="md-form">
                                        <label for="religion">Religion : </label>
                                        <select class="form-control custom-select" name="religion">
                                            <option selected>Select one</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Muslim">Muslim</option>
                                            <option value="Christian">Christian</option>
                                            <option value="Buddhism">Buddhism</option>
                                            <option value="Sikhism">Sikhism</option>
                                            <option value="Jainism">Jainism</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3 ms-1">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                                    <label class="form-check-label" for="flexCheckDefault"><sup class=text-danger>*</sup>I hereby declare that the details furnished above are correct.</label>
                                </div>
                            </div>
                            <div class="row mb-3 ms-1">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                                    <label class="form-check-label" for="flexCheckDefault"><sup class=text-danger>*</sup>I agree with all terms & conditions.</label>
                                </div>
                            </div>
                            <div class="text-center mt-3">
                                <button class="btn btn-success" name="submit" type="submit">Submit</button>
                                <button class="btn btn-success" name="reset" type="reset">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php } else {?>    
    <h4 class="mx-4" style="color:green">Admission Form filled Successfully... Wait for admin response...</h4>
<?php }?>
<script type="text/javascript" src="../../javascript/admissionformvalidation.js"></script>
<?php include('footer.php') ?>
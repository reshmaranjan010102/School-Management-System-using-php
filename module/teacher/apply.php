<?php include('header.php');
    if (isset($_POST['submit'])) 
    {
        $name = $_POST['name'];
        $dob = $_POST['dob'];
        $sex = $_POST['sex'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $phone2 = $_POST['phone2'];
        $nationality = $_POST['nationality'];
        $religion = $_POST['religion'];
        $result2 = mysqli_query($link, "SELECT * FROM teachers where email='$check'");
        $num_rows = mysqli_num_rows($result2);
        if ($num_rows > 0) {
            mysqli_query($link, "UPDATE teachers set name='$name', sex='$sex', dob='$dob', email='$email', subject='$subject', address='$address', phone='$phone', phone2='$phone2', nationality='$nationality', religion='$religion', status='1' where email='$check'");
        }
        else {
            mysqli_query($link, "INSERT INTO teachers (name, sex, dob, email, subject, address, phone, phone2, nationality, religion, status) VALUES ('$name', $sex, '$dob', '$email', '$sex', '$subject', '$address', '$phone', '$phone2', '$nationality', '$religion', '1');");
        }
    }
    $result3 = mysqli_query($link, "SELECT * FROM teachers where email='$check' and status = '0'");
    $num_rows = mysqli_num_rows($result3);
    if($num_rows==1){
?>   

<section class="bg-white">
    <div class="col-9 mx-auto my-4 mb-4">
        <div class="card" style="background:#ff00711a;">
            <div class="card-header">
                <div class="d-flex flex-column">
                    <img src="../../assets/Images/school-icon.png" alt="" class="mx-auto p-1 rounded-circle border border-danger" style="width:60px; height:60px;">
                    <h3 class="mx-auto text-decoration-underlined">Teacher's Form</h3>
                </div>
            </div>
            <div class="card-body">
                <form action="" method="POST" name="apply_form" onsubmit="validate()">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="md-form mb-3">
                                    <label for="name">Teacher's Name :<sup class=text-danger>*</sup></label>
                                    <input type="text" name="name" value="<?=$login_session;?>" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="md-form mb-3">
                                    <label for="dob">Date of Birth :<sup class=text-danger>*</sup></label>
                                    <input type="date" name="dob" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="md-form">
                                    <label for="email">Teacher's Email :<sup class=text-danger>*</sup></label>
                                    <input type="email" id="email" name="email" value="<?=$check;?>" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="md-form">
                                    <b>Gender :<sup class=text-danger>*</sup></b>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sex" value="female" />
                                        <label class="form-check-label" for="female">Female</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sex" value="male" />
                                        <label class="form-check-label" for="male">Male</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="md-form">
                                    <label for="subject">Subject :<sup class=text-danger>*</sup></label>
                                    <input type="femail" id="subject" name="subject" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="md-form">
                                    <label for="address">Address :<sup class=text-danger>*</sup></label>
                                    <input type="text" name="address" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="md-form">
                                    <label for="phone">Mobile. no (1) :<sup class=text-danger>*</sup></label>
                                    <input type="tel" id="myform_phone" class="form-control" name="phone" pattern="[0-9]{10}" required/>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="md-form">
                                    <label for="phone2">Mobile. no (2) : </label>
                                    <input type="tel" id="myform_phone2" class="form-control" name="phone2" pattern="[0-9]{10}" required/>
                                </div>
                            </div>
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
                                <label class="form-check-label" for="flexCheckDefault"><b><sup class=text-danger>*</sup>I hereby declare that the details furnished above are correct.</b></label>
                            </div>
                        </div>
                        <div class="row mb-3 ms-1">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                                <label class="form-check-label" for="flexCheckDefault"><b><sup class=text-danger>*</sup>I agree with all terms & conditions.</b></label>
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
    <h4 class="mx-4" style="color:green">Form filled Successfully... Wait for admin response...</h4>
<?php }?>
<script type="text/javascript" src="../../javascript/applyformvalidation.js"></script>
<?php include('footer.php') ?>
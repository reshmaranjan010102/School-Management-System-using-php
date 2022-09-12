<?php 
    include('header.php');
    include("./service/mysqlcon.php");
    $sq=mysqli_query($link, "SELECT * FROM registration;");
    $check=mysqli_fetch_array($sq);
?>

<!-- navbar -->
<a href="#" class="position-fixed rounded-circle border border-dark text-dark p-1 pt-2 bg-info" style="height:40px; width:40px; top:90%; right:3%;">TOP</a>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <img src="./assets/Images/school-icon.png" height=40 alt="" class="rounded-circle border border-danger">
            <h6 class="my-auto">&nbsp;CITY Public School</h6>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item ms-5">
                    <a class="nav-link active" aria-current="page" href="http://localhost/sms/#home">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="http://localhost/sms/#about">About us</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#testimony">Testimony</a>
                    </li>
                </ul>
                <?php if(isset($_SESSION['login'])) { ?>
                    <a href="logout.php" class="nav-link"><i class="fa fa-user mr-2"></i> logout</a>
                    <?php } else {
                      $todaysDate = date('Y-m-d');
                      $todaysDate=date('Y-m-d', strtotime($todaysDate));                          
                      if (($todaysDate >= $check['sdate']) && ($todaysDate <= $check['edate'])){ ?>
                          <li class="nav-item list-unstyled dropdown mx-3">
                          <div class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false" >Registration</i>
                          </div>
                          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <li>
                              <a class="dropdown-item" href="registration.php?user">Student</a>
                              </li>
                              <li>
                              <a class="dropdown-item" href="registration.php">Teacher</a>
                              </li>
                          </ul>
                        </li>
                      <?php } ?>
                      <li class="nav-item list-unstyled dropdown mx-3">
                        <div class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false" >
                            <i class="fas fa-user"> Account </i>
                        </div>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                            <a class="dropdown-item" href="login.php?user=Student">Student</a>
                            </li>
                            <li>
                            <a class="dropdown-item" href="login.php?user=Teacher">Teacher</a>
                            </li>
                            <li><hr class="dropdown-divider" /></li>
                            <li>
                            <a class="dropdown-item" href="login.php?user=Admin">admin</a>
                            </li>
                        </ul>
                      </li>
                  <?php } ?>
              </div>
          </div>
      </nav>
<!-- navbar -->

<!-- Crousel -->
<div id="carouselBasicExample" class="carousel slide carousel-fade container" data-mdb-ride="carousel">
  <!-- Indicators -->
  <div class="carousel-indicators">
    <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="3" aria-label="Slide 4"></button>
    <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="4" aria-label="Slide 5"></button>
  </div>

  <!-- Inner -->
  <div class="carousel-inner">
    <!-- Single item -->
    <div class="carousel-item active">
      <img src="assets/Images/class2.jpg" style="height:350px;" class="d-block w-100" alt=""/>
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>

    <!-- Single item -->
    <div class="carousel-item">
      <img src="assets/Images/play.jpg" style="height:350px;" class="d-block w-100" alt=""/>
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>

    <!-- Single item -->
    <div class="carousel-item">
      <img src="assets/Images/img.png" class="d-block w-100" style="height:350px;" alt=""/>
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>
    <!-- Single item -->
    <div class="carousel-item">
      <img src="assets/Images/teacher.png" style="height:350px;" class="d-block w-100" alt=""/>
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>

    <!-- Single item -->
    <div class="carousel-item">
      <img src="assets/Images/class.jpg" class="d-block w-100" style="height:350px;" alt=""/>
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>
  </div>
  <!-- Inner -->

  <!-- Controls -->
  <button class="carousel-control-prev" type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- Crousel -->

<!-- Marquee -->
<div class="container mx-auto">
    <div class="row">
        <div class="col-md-1 bg-danger text-light py-2 px-3">Our Site</div>
        <div class="col-md-11 bg-info text-dark">
            <marquee class="fw-bold" scrollamount="6" scrolldelay="5" direction="left" onmouseover="this.stop()" onmouseout="this.start()" behavior="scroll">
                <p class="my-2">
                  School management system reduces the workload of staff & streamlines the daily tasks like admissions, fees, attendance, homework, followups, timetable, accounting, library, documents, inventory etc. | Our school management system has a user-friendly interface. | 
                </p>   
            </marquee>
        </div>
    </div>
</div>
<!-- Marquee -->

<!-- about us -->
<section class="py-3" id="about">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <img src="./assets/images/School_About.jpg" alt="About" class="img-fluid py-5" style="height:485px ">
      </div>
      <div class="col-lg-6 py-5">
        <h2>About <br>City Public School</h2>
        <div>
          <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Amet expedita architecto quibusdam? Error veniam quaerat dolores aliquam perferendis rerum earum sit facere neque, ipsam voluptate architecto id quas facilis delectus!Animi fugiat aut facilis voluptate ut eaque expedita mollitia dignissimos ipsum, reprehenderit aspernatur maiores veritatis fugit voluptas earum delectus exercitationem ex eveniet iure cum quasi repellendus. Dignissimos totam consequuntur perspiciatis.Deleniti quo temporibus saepe culpa eveniet omnis doloribus inventore autem eos a odio vel dolores fuga voluptate facilis impedit repellendus quod beatae aliquid amet provident, obcaecati, animi accusantium unde! Quidem!</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- about us -->

<!-- Testimony -->
<section id="testimony" class="pb-5">
  <div class="text-center mb-5">
    <h2 class="font-weight-bold">What People Says</h2>
    <p class="text-muted">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorum aspernatur quibusdam tenetur ullam, obcaecati.</p>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-4">
        <div class="border rounded position-relative">
          <div class="p-3 text-center">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi hic ut qui fugit tempora repellendus recusandae similique veritatis, aliquam, debitis eligendi facere perspiciatis cupiditate tempore ex sapiente corporis vel eum.
          </div>
          <i class="fa-solid fa-quote-left fa-3x position-absolute" style="top:.5rem; left: .5rem; opacity:.2"></i>
        </div>
        <div class="mt-2 text-center">
          <h6 class="mb-0 font-weight-bold">Name of Candidate</h6>
        </div>
      </div>
      <div class="col-4">
        <div class="border rounded position-relative">
          <div class="p-3 text-center">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi hic ut qui fugit tempora repellendus recusandae similique veritatis, aliquam, debitis eligendi facere perspiciatis cupiditate tempore ex sapiente corporis vel eum.
          </div>
          <i class="fa-solid fa-quote-left fa-3x position-absolute" style="top:.5rem; left: .5rem; opacity:.2"></i>
        </div>
        <div class="mt-2 text-center">
          <h6 class="mb-0 font-weight-bold">Name of Candidate</h6>
        </div>
      </div>
      <div class="col-4">
        <div class="border rounded position-relative">
          <div class="p-3 text-center">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi hic ut qui fugit tempora repellendus recusandae similique veritatis, aliquam, debitis eligendi facere perspiciatis cupiditate tempore ex sapiente corporis vel eum.
          </div>
          <i class="fa-solid fa-quote-left fa-3x position-absolute" style="top:.5rem; left: .5rem; opacity:.2"></i>
        </div>
        <div class="mt-2 text-center">
          <h6 class="mb-0 font-weight-bold">Name of Candidate</h6>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Testimony -->

<!-- footer -->
<Footer style="background:url(./assets/images/study.jpeg) center/cover no-repeat">
  <div class="py-2 text-white" style="background:#00000088;">
    <div class="container-fluid">
      <div class="row">
        <div class="col-6">
          <h5>Social Presecnce</h5>
          <div>
            <span class="fa-stack fa-lg">
              <i class="fa fa-circle fa-stack-2x"></i>
              <i class="fab fa-facebook-f fa-stack-1x fa-inverse text-dark"></i>
            </span>
            <span class="fa-stack fa-lg">
              <i class="fa fa-circle fa-stack-2x"></i>
              <i class="fab fa-instagram fa-stack-1x fa-inverse text-dark"></i>
            </span>
            <span class="fa-stack fa-lg">
              <i class="fa fa-circle fa-stack-2x"></i>
              <i class="fab fa-twitter fa-stack-1x fa-inverse text-dark"></i>
            </span>
            <span class="fa-stack fa-lg">
              <i class="fa fa-circle fa-stack-2x"></i>
              <i class="fab fa-linkedin fa-stack-1x fa-inverse text-dark"></i>
            </span>
            <span class="fa-stack fa-lg">
              <i class="fa fa-circle fa-stack-2x"></i>
              <i class="fab fa-youtube fa-stack-1x fa-inverse text-dark"></i>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</Footer>
<!-- footer -->

<section class="py-2 bg-dark text-muted">
  <div class="container-fluid">
    Copyright &copy; 2020 All Rights Reserved.
  </div>
</section>
<?php include('footer.php') ?>
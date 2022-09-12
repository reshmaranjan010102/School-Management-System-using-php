<?php
$login_code= isset($_REQUEST['login']) ? $_REQUEST['login'] : '1';
include('header.php') 
?>
    <section class="bg-light vh-100 d-flex">
        <div class="col-3 m-auto">
            <div class="card">
                <div class="card-header">
                    <b><?=$_REQUEST['user'] ?> Login Portal</b>
                </div>
                <div class="card-body">
                    <div class="border rounded-circle mx-auto d-flex" style="width:100px; height:100px;">
                        <i class="fa fa-user fa-3x m-auto text-dark"></i>
                    </div>
                    <form  action="./service/check.access.php" method="post"><br/>
                        <input type="text" class="mb-3 form-control" id="myid" name="myid" placeholder="Login ID" autofocus=""   />
                        <input type="password" class="mb-3 form-control" id="mypassword" name="mypassword" placeholder="Password"  />
                        <input type="submit" class="btn btn-success" value="Login" />
                    </form>
                </div>
            </div>
        </div>
    </section>
<?include('footer.php');?>
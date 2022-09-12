<?php
	include('header.php');
	$name=$row['name'];
?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
		<div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Manage Question Papers</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Question Paper</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container">
        <div class="row">
			<?php $exam_query = mysqli_query($link, "SELECT * FROM examtype");
				while($exam = mysqli_fetch_object($exam_query)){?>
					<div class="col-3 border rounded bg-danger m-4 px-4 pt-4 pb-2 shadow">
                        <h6><?=$exam->examtype;?></h6>
						<a href="?action=<?=$exam->examtype;?>" class="btn btn-success btn-sm px-3 mt-4">View</a>
					</div>
                    <?php } ?>
                </div>   
                <?php if(isset($_REQUEST['action'])){
                    $id = $_GET['action']; ?>
                        <div class="col-10 card mx-auto">
                            <div class="card-header py-2">
                                <h3 class="card-title">
                                    <?=$id;?>
                                </h3>
                                <div class="card-tools">
                                    <a href="examination.php?q=4&name=<?=$id;?>" class="btn btn-success btn-xs mx-3">
                                        <i class="fa fa-plus mr-2">Add New</i>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="panel mx-auto">
                                    <div class="table-responsive">
                                        <table class="table table-striped title1">
                                            <tr>
                                                <td><b>S.N.</b></td>
                                                <td><b>Class</b></td>
                                                <td><b>Subject</b></td>
                                                <td><b>Total question</b></td>
                                                <td><b>Marks</b></td>
                                                <td><b>Time limit</b></td>
                                                <td>Action</td>
                                            </tr>
                                            <?php 
                                            $c = 1;
                                            $query = mysqli_query($link, "SELECT * FROM exams where examname = '$id' ORDER BY date DESC");
                                            while ($exam = mysqli_fetch_object($query)) { ?>
                                            <tr>
                                                <td><?php echo $c++;?></td>
                                                <td><?php echo $exam->class;?></td>
                                                <td><?php echo $exam->subject;?></td>
                                                <td><?php echo $exam->total;?></td>
                                                <td><?php echo $exam->posmark * $exam->total;?></td>
                                                <td><?php echo $exam->time;?>&nbsp;min</td>
                                                <td><?php $eid = $exam->id;?>
                                                    <a href="updateexams.php?q=rmquiz&eid=<?=$eid?>" class="pull-right btn sub1" style="margin:0px;background:red"><b>Remove</b></a>
                                                </td>
                                            </tr>
                                            <?php }?>  
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> 
                <?php }
            // add exam start
             if(@$_GET['q']==4 && !(@$_GET['step']) && (@$_GET['name'])) {
                $name = @$_GET['name']?>
                <div class="container col-8">
                    <form action="updateexams.php?q=addquiz"  method="POST">
                        <h4><b>Enter exam Details</b></h4>
                        <div class="row">
                        <div class="form-group col-6">
                                <label class="control-label" for="class"></label>  
                                <input id="examname" name="examname" value="<?=$name;?>" class="form-control input-md" type="text" readonly>
                            </div>
                            <div class="form-group col-6">
                                <label class="control-label" for="class"></label>  
                                <input id="class" name="class" placeholder="Enter class" class="form-control input-md" type="text">
                            </div>
                            <div class="form-group col-6">
                                <label class="control-label" for="subject"></label>  
                                <input id="subject" name="subject" placeholder="Enter subject" class="form-control input-md" type="text">
                            </div>
                            <div class="form-group col-6">
                                <label class="control-label" for="total"></label>  
                                <input id="total" name="total" placeholder="Enter total number of questions" class="form-control input-md" type="number">
                            </div>
                            <div class="form-group col-6">
                                <label class="control-label" for="posmarks"></label>  
                                <input id="posmarks" name="posmarks" placeholder="Enter marks on right answer" class="form-control input-md" min="0" type="number">
                            </div>
                            <div class="form-group col-6">
                                <label class="control-label" for="negmarks"></label>  
                                <input id="negmarks" name="negmarks" placeholder="Enter minus marks on wrong answer" class="form-control input-md" min="0" type="number">
                            </div>
                            <div class="form-group col-6">
                                <label class="control-label" for="time"></label>  
                                <input id="time" name="time" placeholder="Enter time limit for test in minute" class="form-control input-md" min="1" type="number">
                            </div>
                            <div class="form-group col-12">
                                <label class="control-label" for="descr"></label>  
                                <textarea rows="8" cols="8" name="descr" class="form-control" placeholder="Write description here..."></textarea>  
                            </div>
                            <input  type="submit" class="mx-2 btn btn-primary" value="Submit" class="btn btn-primary"/>
                        </div>
                    </form>
                </div>
            <!--add exam end-->

            <!--add exam step2 start-->
            <?php } elseif(@$_GET['q']==4 && (@$_GET['step'])==2 ) { ?> 
                <div class="container col-8">
                    <form action="updateexams.php?q=addqns&n=<?=@$_GET['n']; ?>&eid=<?=@$_GET['eid']; ?> &ch=4 "  method="POST">
                        <h4><b>Enter Question Details</b></h4>
                        <?php for($i=1;$i<=@$_GET['n'];$i++) { ?>
                        <b class="mx-2">Question number&nbsp;<?=$i;?>&nbsp:<br />
                            <div class="row">
                            <div class="form-group col-12">
                                <label class="control-label" for="qns<?=$i;?>"></label> 
                                <textarea rows="3" cols="5" name="qns<?=$i;?>" class="form-control" placeholder="Write question number <?=$i;?> here..."></textarea>
                            </div>
                            <div class="form-group col-3">
                                <label class="control-label" for="<?=$i;?>1"></label>  
                                <input id="<?=$i;?>1" name="<?=$i;?>1" placeholder="Enter option a" class="form-control input-md" type="text">
                            </div>
                            <div class="form-group col-3">
                                <label class="control-label" for="<?=$i;?>2"></label>
                                <input id="<?=$i;?>2" name="<?=$i;?>2" placeholder="Enter option b" class="form-control input-md" type="text">
                            </div>
                            <div class="form-group col-3">
                                <label class="control-label" for="<?=$i;?>3"></label>  
                                <input id="<?=$i;?>3" name="<?=$i;?>3" placeholder="Enter option c" class="form-control input-md" type="text">
                            </div>
                            <div class="form-group col-3">
                                <label class="control-label" for="<?=$i;?>4"></label>  
                                <input id="<?=$i;?>4" name="<?=$i;?>4" placeholder="Enter option d" class="form-control input-md" type="text">
                            </div><br>
                            <b class="mx-2">Correct answer</b>:<br />
                            <select id="ans<?=$i;?>" name="ans<?=$i;?>" placeholder="Choose correct answer " class="form-control col-4 mx-4 mb-3 input-md" >
                                <option value="a">Select answer for question <?=$i;?></option>
                                <option value="a">option a</option>
                                <option value="b">option b</option>
                                <option value="c">option c</option>
                                <option value="d">option d</option>
                            </select><br>
                            <?php } ?>
                            <div>
                                <input type="submit" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
                            </div>
                        </div>
                    </form>
                </div>
            <?php } else {?>
            <?php } ?> 
    </div>
</section>
<?php 
	include('footer.php');
?>
<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:../index.php');
}
else{
date_default_timezone_set('Asia/Yangon');
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{
date_default_timezone_set('Asia/Yangon');
$currentTime_db = date( 'd-m-Y h:i:s A', time () );
$fname=$_POST['fullname'];
$contactno=$_POST['contactno'];
$address=$_POST['address'];
$state=$_POST['state'];
$country=$_POST['country'];
$pincode=$_POST['pincode'];
$query=mysqli_query($bd, "update users set fullName='$fname',contactNo='$contactno',address='$address',campus='$state',department='$country',position='$pincode',updationDate='$currentTime_db' where userEmail='".$_SESSION['login']."'");
if($query)
{
$successmsg="Profile Successfully !!";
}
else
{
$errormsg="Profile not updated !!";
}
}
?>

<?php
    include_once("includes/html_head.php");
?>

<body>

    <section id="container">
        <?php include("includes/header.php");?>
        <?php include("includes/sidebar.php");?>
        <section id="main-content">
            <br> <br>
            <section class="wrapper">
                <h3><i class="fa fa-angle-right"></i> Profile info</h3>

                <!-- BASIC FORM ELELEMNTS -->
                <div class="row mt">
                    <div class="col-lg-12">
                        <div class="form-panel">


                            <?php if($successmsg)
                      {?>
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <b>Well done!</b> <?php echo htmlentities($successmsg);?>
                            </div>
                            <?php }?>

                            <?php if($errormsg)
                      {?>
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <b>Oh snap!</b> </b> <?php echo htmlentities($errormsg);?>
                            </div>
                            <?php }?>
                            <?php $query=mysqli_query($bd, "select * from users where userEmail='".$_SESSION['login']."'");
 while($row=mysqli_fetch_array($query)) 
 {
 ?>

                            <h4 class="mb"><i
                                    class="fa fa-user"></i>&nbsp;&nbsp;<?php echo htmlentities($row['fullName']);?>'s
                                Profile</h4>
                            <h5><b>Last Updated at :</b>&nbsp;&nbsp;<?php echo htmlentities($row['updationDate']);?>
                            </h5>
                            <form class="form-horizontal style-form" method="post" name="profile">

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Full Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="fullname" required="required"
                                            value="<?php echo htmlentities($row['fullName']);?>" class="form-control">
                                    </div>
                                    <br>
                                    <label class="col-sm-2 col-sm-2 control-label">User Email </label>
                                    <div class="col-sm-6">
                                        <input type="email" name="useremail" required="required"
                                            value="<?php echo htmlentities($row['userEmail']);?>" class="form-control"
                                            readonly>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Contact</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="contactno" required="required"
                                            value="<?php echo htmlentities($row['contactNo']);?>" class="form-control">
                                    </div>
                                    <br>
                                    <label class="col-sm-2 col-sm-2 control-label">Address </label>
                                    <div class="col-sm-6">
                                        <textarea name="address" required="required"
                                            class="form-control"><?php echo htmlentities($row['address']);?></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Campus</label>
                                    <div class="col-sm-6">
                                        <select name="state" required="required" class="form-control">
                                            <option value="<?php echo htmlentities($row['State']);?>"  >
                                                <?php echo htmlentities($st=$row['State']);?>Select Campus</option>
                                            <?php $sql=mysqli_query($bd, "select stateName from state ");
while ($rw=mysqli_fetch_array($sql)) {
  if($rw['stateName']==$st)
  {
    continue;
  }
  else
  {
  ?>
                                            <option value="<?php echo htmlentities($rw['stateName']);?>">
                                                <?php echo htmlentities($rw['stateName']);?></option>
                                            <?php
}}
?>

                                        </select>
                                        <br>
                                    </div>
                                    <label class="col-sm-2 col-sm-2 control-label">Departenmt </label>
                                    <div class="col-sm-6">
                                        <select name="country" required="required" class="form-control">
                                            <option value="<?php echo htmlentities($row['State']);?>"  >
                                                <?php echo htmlentities($st=$row['State']);?>Select Department</option>
                                            <?php $sql=mysqli_query($bd, "select department_name from department ");
while ($rw=mysqli_fetch_array($sql)) {
  if($rw['department_name']==$st)
  {
    continue;
  }
  else
  {
  ?>
                                            <option value="<?php echo htmlentities($rw['department_name']);?>">
                                                <?php echo htmlentities($rw['department_name']);?></option>
                                            <?php
}}
?>

                                        </select>
                                        <br>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Position</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="pincode"  required="required"
                                            value="<?php echo htmlentities($row['position']);?>" class="form-control">
                                    </div>
                                    <br>
                                    <label class="col-sm-2 col-sm-2 control-label">Reg Date </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="regdate" required="required"
                                            value="<?php echo htmlentities($row['regDate']);?>" class="form-control"
                                            readonly>
                                    </div>
                                </div>


                                <?php } ?>

                                <div class="form-group">
                                    <div class="col-sm-3" >
                                        <button type="submit" name="submit" class="btn btn-warning">Update</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>



            </section>
        </section>
        <?php include("includes/footer.php");?>
    </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

    <!--custom switch-->
    <script src="assets/js/bootstrap-switch.js"></script>

    <!--custom tagsinput-->
    <script src="assets/js/jquery.tagsinput.js"></script>

    <!--custom checkbox & radio-->

    <script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>

    <script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>


    <script src="assets/js/form-component.js"></script>


    <script>
    //custom select box

    $(function() {
        $('select.styled').customSelect();
    });
    </script>

</body>

</html>
<?php } ?>
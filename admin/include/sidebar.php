<div class="col-lg-4">
    <div id="accordion">
        <div class="card">
            <div class="card-header">
                <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                    <i class="menu-icon icon-cog"></i>
                    Manage Complaint
                </a>
            </div>
            <div id="collapseThree" class="collapse" data-parent="#accordion">
                <div class="card-body">
                    <li>
                        <a href="notprocess-complaint.php">
                            <i class="icon-tasks"></i>
                            Not Process Yet Complaint
                            <?php
$rt = mysqli_query($bd, "SELECT * FROM tblcomplaints where status is null");
$num1 = mysqli_num_rows($rt);
{?>

                            <b class="label orange pull-right"><?php echo htmlentities($num1); ?></b>
                            <?php } ?>
                        </a>
                    </li>
                    <li>
                        <a href="inprocess-complaint.php">
                            <i class="icon-tasks"></i>
                            Pending Complaint
                            <?php 
  $status="in Process";                   
$rt = mysqli_query($bd, "SELECT * FROM tblcomplaints where status='$status'");
$num1 = mysqli_num_rows($rt);
{?><b class="label orange pull-right"><?php echo htmlentities($num1); ?></b>
                            <?php } ?>
                        </a>
                    </li>
                    <li>
                        <a href="closed-complaint.php">
                            <i class="icon-inbox"></i>
                            Closed Complaints
                            <?php 
  $status="closed";                   
$rt = mysqli_query($bd, "SELECT * FROM tblcomplaints where status='$status'");
$num1 = mysqli_num_rows($rt);
{?><b class="label green pull-right"><?php echo htmlentities($num1); ?></b>
                            <?php } ?>

                        </a>
                    </li>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <a class="collapsed card-link" data-toggle="collapse" href="#collapseFour">
                    <i class="menu-icon icon-group"></i>
                    Manage users
                </a>
            </div>
            <div id="collapseFour" class="collapse" data-parent="#accordion">
                <div class="card-body">
                    <li><a href=""> <i class="menu-icon icon-group"></i>View All Users</a></li>
                    <li><a href=""> <i class="menu-icon icon-group"></i> Add New User</a></li>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <a class="collapsed card-link" data-toggle="collapse" href="#collapseFive">
                    Category | Location
                </a>
            </div>
            <div id="collapseFive" class="collapse" data-parent="#accordion">
                <div class="card-body">
                    <li><a href="category.php"><i class="menu-icon icon-tasks"></i> Add Category </a></li>
                    <li><a href="subcategory.php"><i class="menu-icon icon-tasks"></i>Add Sub-Category </a></li>
                    <li><a href="state.php"><i class="menu-icon icon-paste"></i>Add State</a></li>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
               
				<a href="user-logs.php"><i class="menu-icon icon-tasks"></i>User Login Log </a>
                </a>
            </div>
            <!-- <div id="collapseSix" class="collapse" data-parent="#accordion">
                <div class="card-body">
                    Lorem ipsum..
                </div>
            </div> -->
        </div>

        <div class="card">
            <div class="card-header">
				<a href="logout.php">
                    <i class="menu-icon icon-signout"></i>
                    Logout
                </a>
            </div>
            <!-- <div id="collapseSeven" class="collapse" data-parent="#accordion">
                <div class="card-body">
                    Lorem ipsum..
                </div>
            </div> -->
        </div>
    </div>
</div>
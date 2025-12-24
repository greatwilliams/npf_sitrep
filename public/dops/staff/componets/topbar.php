




<?php 
    $query = mysqli_query($conn, "SELECT * FROM `user` WHERE `user_id` = '$_SESSION[user]'") or die(mysqli_error());
    $fetch = mysqli_fetch_array($query);
?>
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    
    <!-- <h1 class="h3 text-gray-800">Company Name</h1>
    <div class="sidebar-brand-text mx-3"><h1>PAB DMS</h1></div> -->
   <!-- <h1 style="color:gray;text-align:center;font-weight:bold;">Company Name</h1> -->

    <!-- Topbar Navbar -->
    <ul class="navbar-nav mr-auto">

        <div class="topbar-divider d-none d-sm-block"></div>

        <li class="nav-item">
            <button  class="d-none d-sm-inline-block btn btn btn-danger shadow-sm" data-toggle="modal" data-target="#form_modal">
            <i class="fas fa-plus fa-sm text-white-50"></i> Generate Folio</button>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

    </ul>

    <ul class="navbar-nav ml-auto">

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-700 small"><?php echo $fetch['firstname']." ".$fetch['lastname'] ; ?></span>
                <img class="img-profile rounded-circle"
                    src="img/undraw_profile.svg">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="edit_profile.php">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php" >
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>
        <div class="topbar-divider d-none d-sm-block"></div>


    </ul>

</nav>


<div class="modal fade" id="form_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="POST" action="home.php">	
                <div class="modal-header">
                    <h4 class="modal-title">Search Policy </h4>

                    <a  class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" href="home_all2.php ">
                        <i class="fas fa-fw fa-eye"></i>
                        <span>View All Policy</span>
                    </a>
                </div>

                
                <div class="modal-body">
                    <div class="col-md-3"></div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" minlength="3" maxlength="4" maxsize="4" name="search" class="form-control" placeholder="Enter the Policy Code e.g '0900' " required="required"/>
                        </div>
                    </div>
                </div>
                <div style="clear:both;"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                    <button name="save" class="btn btn-success" ><span class="glyphicon glyphicon-save"></span> Search</button>
                </div>
            </form>
        </div>
    </div>
</div>
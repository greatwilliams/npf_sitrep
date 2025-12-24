<?php 
    $query = mysqli_query($conn, "SELECT * FROM `site` ") or die(mysqli_error());
    $fetch_site = mysqli_fetch_array($query);
?>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-file"></i>
                </div>
                <div class="sidebar-brand-text mx-3"><?php echo $fetch_site['dept_short']; ?> - FMS</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0"> 

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
			
            <!-- Nav Item - User -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="home_all.php">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Generate Folio Number</span></a>
            </li> -->

        

            <!-- Nav Item - Charts -->
			<?php if($_SESSION['register_priviledge'] == "Granted"){ ?>
            <li class="nav-item">
                <a class="nav-link" href="incoming_reg.php">
                    <i class="fas fa-fw fa-briefcase"></i>
                    <span>Register Incoming Mails</span></a>
            </li>
			<?php } ?>

			<?php if($_SESSION['register_priviledge'] == "Granted"){ ?>
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="outgoing_reg.php">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Register Outgoing Mails</span></a>
            </li>
			<?php } ?>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="incoming.php">
                    <i class="fas fa-fw fa-eye"></i>
                    <span>View Incoming Mail</span></a>
            </li>

             <!-- Nav Item - Charts -->
             <li class="nav-item">
                <a class="nav-link" href="outgoing.php">
                    <i class="fas fa-fw fa-eye"></i>
                    <span>View Outgoing Mail</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="incoming_older.php">
                    <i class="fas fa-fw fa-search"></i>
                    <span>Search Incoming Mail</span></a>
            </li>

             <!-- Nav Item - Charts -->
             <li class="nav-item">
                <a class="nav-link" href="outgoing_older.php">
                    <i class="fas fa-fw fa-search"></i>
                    <span>Search Outgoing Mail</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../userguide/USER_FMS.pdf" target="_blank" type="button" >
                    <i class="fas fa-fw fa-file"></i>
                    <span>Documentation</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>


      
<?php	require 'validator.php'; ?>
<?php include('componets/header.php'); ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include('componets/sidebar.php'); ?>

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include('componets/topbar.php'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Dashboard </h1>
					
					<div class="row">

                        <!-- Earnings  Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                                Total Folio Generated </div>
											<?php 
												$query = mysqli_query($conn, "SELECT COUNT(folio_no) as folio_count 
																			FROM `file_volume` ") or die(mysqli_error());
												$fetch = mysqli_fetch_array($query);
											?>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $fetch['folio_count'] ; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-file fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                 <div align="right"><a href="folio_register.php" font="10px">More Details</a></div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings  Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-dark shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                                Total Incoming Mail Registered </div>
											<?php 
												$query = mysqli_query($conn, "SELECT COUNT(user_no) as user_count 
																			FROM `storage` ") or die(mysqli_error());
												$fetch = mysqli_fetch_array($query);
											?>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $fetch['user_count'] ; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-file fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                 <div align="right"><a href="incoming_register.php" font="10px">More Details</a></div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Outgoing Mail Registered </div>
												<?php 
													$query2 = mysqli_query($conn, "SELECT COUNT(user_no) as user_count 
													FROM `storage_outgoing` ") or die(mysqli_error());
													$fetch2 = mysqli_fetch_array($query2);
												?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $fetch2['user_count'] ; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-file fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                 <div align="right"><a href="outgoing_register.php" font="10px">More Details</a></div> 
                                </div>
                            </div>
                        </div>

                        <!-- Earnings  Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1"> Total Incoming Mail Downloads 
                                                <?php 
                                                    $query3 = mysqli_query($conn, "SELECT COUNT(user_id) as user_count FROM `incoming_downloads` ") or die(mysqli_error());
                                                    $fetch3 = mysqli_fetch_array($query3);
                                                ?>
     
											</div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $fetch3['user_count'] ; ?></div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-download fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                 <div align="right"><a href="incoming_downloads.php" font="10px">More Details</a></div> 
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                                <?php 
                                                    $query4 = mysqli_query($conn, "SELECT COUNT(user_id) as user_count FROM `outgoing_downloads` ") or die(mysqli_error());
                                                    $fetch4 = mysqli_fetch_array($query4);
                                                ?>
                                                Total Outgoing Mail Downloads </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $fetch4['user_count'] ; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-download fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
									<div align="right"><a href="outgoing_downloads.php" font="10px">More Details</a></div> 
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include('componets/footer.php'); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- All Modal-->
    <?php include('componets/modals.php'); ?>

    <!-- ALL JavaScript-->
    <?php include('componets/scripts.php'); ?>


</body>

</html>
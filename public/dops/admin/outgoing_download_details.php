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
					<?php error_reporting(0); $msg = $_GET['msg']; $user_no = $_GET['username_id']; $fullname_id = $_GET['fullname_id']; ?>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h4 class="h mb-0 text-gray-800">Outgoing Mails Downloads </h4>
                    </div>

                    <div>
                        <!-- Success Message -->
                        <h1 class="h3 mb-4 text-gray-800"><span> <font size='3px' color='red'><?php echo $msg; ?></font> </span></h1>
                    </div>

                    



                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">                       
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Policy No</th>
                                        <th>Date Downloaded</th>                                                       
                                        <th>Downloaded By</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i=0;
                                        //$stud_no = $fetch['stud_no'];
                                        $query = mysqli_query($conn, "SELECT * FROM `outgoing_downloads` WHERE user_id = '$user_no' ") or die(mysqli_error());
                                        while($fetch = mysqli_fetch_array($query)){
											$user_id = $fetch['user_id'];
											$query3 = mysqli_query($conn, "SELECT * FROM `user` WHERE `user_id` = '$user_id' ") or die(mysqli_error());
											$fetch_username = mysqli_fetch_array($query3);
                                            $i++;
                                    ?>
                                    <tr class="del_file<?php echo $fetch['store_id']?>">
										<td><?php echo $i; ?></td>
										<td><?php echo $fetch['policy_number']?></td> 
                                        <td><?php echo $fetch['download_date']?></td>
                                        <td><?php echo $fetch_username['firstname'].' '.$fetch_username['lastname']?></td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- End Table -->

                    <div class="modal fade" id="modal_confirm" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title">System</h3>
                                </div>
                                <div class="modal-body">
                                    <center><h4 class="text-danger">All file of the student will be deleted too...</h4></center>
                                    <center><h3 class="text-danger">Are you sure you want to delete this data?</h3></center>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-success" id="btn_yes">Yes</button>
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
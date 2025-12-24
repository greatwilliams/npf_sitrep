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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h4 class="h mb-0 text-gray-800">Incoming Mails</h4>

                        Incoming Mails
                    </div>

                    <div>
                        <!-- Success Message -->
                        <?php error_reporting(0); $msg = $_GET['msg']; ?>
                        <h1 class="h3 mb-4 text-gray-800"><span> <font size='3px' color='red'><?php echo $msg; ?></font> </span></h1>
                    </div>

                    <?php
                            $stud_id = 0;
                            if (isset($_GET['id'])) {
                            $stud_id = $_GET['id'];
                            }
                                $query = mysqli_query($conn, "SELECT * FROM `file_volume` WHERE `stud_id` = '$stud_id' GROUP BY `id` DESC LIMIT 1") or die(mysqli_error());
                                            while($fetch = mysqli_fetch_array($query)){
                                            $volume_no = $fetch['volume_no'];
                                            $folio_no = $fetch['folio_no'];
                                            $id = $fetch['id'];
                                            $stud_id = $fetch['stud_id'];
                                }
                        ?>  



                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                      
                        <div class="card-header py-3">
                        <h3 class="m-0 font-weight-bold text-primary">Incoming Mails Tables
                            <span class="text-danger"><h6>Only the Most Recent 1000 Incoming Records are displayed herein; Use the <span class="m-0 font-weight-bold"> "Search Incoming Mails" </span> link to view older records</h6></span>
                        </h3>
                        </div>

                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Subject Matter</th>
                                        <th>Address</th>
                                        <th>Policy No</th>
                                        <th>Date on Doc</th>                                                       
                                        <th>Date Uploaded</th>                                                       
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i=0;
                                        //$stud_no = $fetch['stud_no'];
                                        $query = mysqli_query($conn, "SELECT * FROM `storage` ORDER BY `store_id` DESC LIMIT 1000 ") or die(mysqli_error());
                                        while($fetch = mysqli_fetch_array($query)){
                                            //echo $fetch['store_id'];
                                            $i++;
                                    ?>
                                    <tr class="del_file<?php echo $fetch['store_id']?>">
                                    <td><?php echo $i; ?></td>
                                        
                                                                    <td><?php echo $fetch['subjectMatter']?></td>
                                                                    <td><?php echo $fetch['address']?></td>
                                                                    <td><?php echo $fetch['policy']?></td>
                                                                    <td><?php echo $fetch['date_uploaded']?></td>
                                                                    <td><?php echo $fetch['timestamped']?></td>


                                                                    <td><a href="../download.php?store_id=<?php echo $fetch['store_id']?>" class="btn btn-success"><span class="glyphicon glyphicon-download"></span> Download</a> |<a href="incoming_edit.php?store_id=<?php echo $fetch['store_id']?>" class="btn btn-danger btn_edit" type="button"><span class="glyphicon glyphicon-edit"></span> Edit</a></td>
                                                                    
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
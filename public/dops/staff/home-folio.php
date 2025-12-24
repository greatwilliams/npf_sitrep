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
                        <h4 class="h mb-0 text-gray-800">Update Folio/Volume Numbers</h4>
                    </div>

                    <div>
                        <!-- Success Message -->
                        <?php $msg = $_GET['msg']; ?>
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
                            <h6 class="m-0 font-weight-bold text-primary">Update Folio/Volume Tables</h6>
                        </div>

                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Policy Name</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                


                                    <?php
                                        $query = mysqli_query($conn, "SELECT * FROM `student` ;") or die(mysqli_error());
                                        while($fetch = mysqli_fetch_array($query)){
                                    ?>
                                        <tr class="del_student<?php echo $fetch['stud_id']?>">
                                        <?php $sid = $fetch['stud_id']; ?>
                                            <td><?php echo $fetch['firstname']?>:<?php echo $fetch['lastname']?></td>
                                            <td><?php echo $fetch['stud_no']?></td>
                                            
                                            <td><center><button class="btn btn-danger" data-toggle="modal" data-target="#edit_modal<?php echo $sid; ?>"><span class="glyphicon glyphicon-plus"></span> Update Vol. and Folio No</button> 
                                        </td>
                                        </tr>
                                        
                        
                                    
                                            <div class="modal fade" id="edit_modal<?php echo $sid ?>" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content" >
                                                        <form method="POST" action="update_folio.php">	
                                                            <div class="modal-header">
                                                            <?php 
                                                        if($sid >= 1) {
                                                        $query2 = mysqli_query($conn, "SELECT * FROM `file_volume` WHERE `stud_id` = '$sid' ORDER BY `id` DESC LIMIT 1 ") or die(mysqli_error());
                                                        $fetch2 = mysqli_fetch_array($query2);
                                                        }
                                                        $volume_no = $fetch2['volume_no'];
                                                        $folio_no = $fetch2['folio_no'];
                                                        $id = $fetch2['id'];
                                                        ?>
                                                                <div><h6 class="modal-title" id="exampleModalLabel" >Are you Sure You Want to Update Volume and Folio Number</h6> </div>
                                                                </break> 
                                                                <br>
                                                                
                                                            </div>

                                                            <div class="modal-body">
                                                                <div class="col-md-12">
                                                                <div class="btn-danger" align="center"><h6><span ><?php echo $fetch['firstname']?>:<?php echo $fetch['lastname']?></span> /PB/FHQ/ABJ/VOL.<span ><?php echo $volume_no; ?>/<?php echo $folio_no; ?></h6> </div>
                                                                </break> 
                                                                <br>
                                                                        <strong><h6 class="modal-title" align="center"><?php echo $fetch['stud_no']?></h6></strong> </br>

                                                                    <div class="form-group">
                                                                        <label>Volume Number</label>
                                                                        <input type="text" name="volume_no" class="form-control" value="<?php echo $volume_no  ?>" required="required"/>
                                                                    </div>
                                                                    
                                                                    <div class="form-group">
                                                                        <label>Folio Number</label>
                                                                        <input type="number" name="folio_no" class="form-control" value="<?php echo $folio_no  ?>" required="required"/>
                                                                    </div>
                                                                        <input type="hidden" name="id" class="form-control" value="<?php echo $sid  ?>" required="required"/>
                                                                    <br />
                                                                </div>
                                                            </div>
                                                            <div style="clear:both;"></div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                                                                <button name="update" class="btn btn-danger" ><span class="glyphicon glyphicon-save"></span> Start Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
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
                                    <button type="button" class="btn btn-primary" id="btn_yes">Yes</button>
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
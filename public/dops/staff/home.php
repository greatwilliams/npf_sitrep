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
                        <h4 class="h mb-0 text-gray-800">Generate Volume and Folio Number</h4>
                    </div>
                    <div>
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
                            <?php
                                            $query = mysqli_query($conn, "SELECT * FROM `student` WHERE `stud_id` = $stud_id  ") or die(mysqli_error());
                                            while($fetch = mysqli_fetch_array($query)){
                            ?>   
                                
                            <div class="btn-danger" align="center"><h3><span ><?php echo $fetch['firstname']?>:<?php echo $fetch['lastname']?></span> /IGP.SEC/ABJ/VOL.<span ><?php echo $volume_no; ?>/<?php echo $folio_no; ?></h3>

                        
                        <?php
                        if ($volume_no == 1 && $folio_no == 1) {
                            //echo '<div class="btn-danger" align="center"> ';
                            echo "EDIT FOLIO"; 
                            //echo '<h3>';
                        }
                        
                        ?>
                        
                        </span>
                        </div>      
                            <?php    }  ?>
                    </div>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Policy Number Tables</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Code </th>
                                            <th>Policy Name</th>
                                            <th width="50%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $search = $_POST['search']; 
                                        $query = mysqli_query($conn, "SELECT * FROM `student` WHERE lastname like '%$search%' ") or die(mysqli_error());
                                            while($fetch = mysqli_fetch_array($query)){
                                        ?>
                                            <tr class="del_student<?php echo $fetch['stud_id']?>">
                                                <td><?php echo $fetch['firstname']?>:<?php echo $fetch['lastname']?></td>
                                                <td><?php echo $fetch['stud_no']?></td>
                                                
                                                <td><center>
                                                <button class="btn btn-primary" data-toggle="modal" data-target="#edit_modal1<?php echo $fetch['stud_id']?>"><span class="glyphicon glyphicon-plus"></span> Generate Folio</button> 
                                                <button class="btn btn-success" data-toggle="modal" data-target="#edit_modal2<?php echo $fetch['stud_id']?>"><span class="glyphicon glyphicon-plus"></span> Generate Folio with Attachement</button> 
                                        </center></td>
                                            </tr>
                                            
                                            
                                            <div class="modal fade" id="edit_modal2<?php echo $fetch['stud_id']?>" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <form method="POST" action="save_user.php">	
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Generate Folio Number <span class="text-danger">With Attachement</span></h4>
                                                                </div>
                                                            <div class="modal-body">
                                                                <div class="col-md-12">
                                                                    <div class="form-group" align="center">
                                                                        <strong><h4 class="modal-title"><?php echo $fetch['firstname']?>:<?php echo $fetch['lastname']?>  <?php echo $fetch['stud_no']?></h4></strong>
                                                                        <input type="hidden" name="stud_id" value="<?php echo $fetch['stud_id']?>" class="form-control"/>
                                                                        <input type="hidden" name="volume_no" value="1" class="form-control"/>
                                                                        <input type="hidden" name="folio_no" value="1" class="form-control"/>
                                                                        <input type="hidden" name="attachment" value="1" class="form-control"/>

                                                                        
                                                                    </div>
                                                                    <div >	<p align= "justify">Note:
                                                                    <span class="text-danger"> You are Generating with One Attachement.</span>
                                                                                            If you are not Sure of the Policy Number, 
                                                                                            Click the close button and Confirm from the 
                                                                                            Admin before generating the Volume and Folio  Number.
                                                                            </p>
                                                                    </div>
                                                                    
                                                                    
                                                                    
                                                                    <br />
                                                                </div>
                                                            </div>
                                                            <div style="clear:both;"></div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                                                                <button name="update" class="btn btn-primary" ><span class="glyphicon glyphicon-save"></span> Generate</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="edit_modal1<?php echo $fetch['stud_id']?>" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <form method="POST" action="save_user.php">	
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Generate Folio Number</span></h4>
                                                                </div>
                                                            <div class="modal-body">
                                                                <div class="col-md-12">
                                                                    <div class="form-group" align="center">
                                                                        <strong><h4 class="modal-title"><?php echo $fetch['firstname']?>:<?php echo $fetch['lastname']?>  <?php echo $fetch['stud_no']?></h4></strong>
                                                                        <input type="hidden" name="stud_id" value="<?php echo $fetch['stud_id']?>" class="form-control"/>
                                                                        <input type="hidden" name="volume_no" value="1" class="form-control"/>
                                                                        <input type="hidden" name="folio_no" value="1" class="form-control"/>
                                                                        <input type="hidden" name="attachment" value="0" class="form-control"/>

                                                                        
                                                                    </div>
                                                                    <div >	<p align= "justify">If you are not Sure of the Policy Number, 
                                                                                            Click the close button and Confirm from the 
                                                                                            Admin before generating the Volume and Folio  Number.
                                                                            </p>
                                                                    </div>
                                                                    
                                                                    
                                                                    
                                                                    <br />
                                                                </div>
                                                            </div>
                                                            <div style="clear:both;"></div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                                                                <button name="update" class="btn btn-primary" ><span class="glyphicon glyphicon-save"></span> Generate</button>
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
    
    
                    <div class="modal fade" id="form_modal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form method="POST" action="save_student.php">	
                                    <div class="modal-header">
                                        <h4 class="modal-title">Add New Policy Details</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Policy Name</label>
                                                <input type="text" name="stud_no" class="form-control" required="required"/>
                                            </div>
                                            <div class="form-group">
                                                <label>Code</label>
                                                <input type="text" name="firstname" class="form-control" required="required"/> 
                                            <span class="style1">E.g: AD</span>							</div>
                                            <div class="form-group">
                                                <label>Policy Number</label>
                                                <input type="number" name="lastname" class="form-control" required="required"/>
                                            <span class="style1">E.g: 1020</span>							</div>
                                            
                                        </div>
                                    </div>
                                    <div style="clear:both;"></div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                                        <button name="save" class="btn btn-primary" ><span class="glyphicon glyphicon-save"></span> Save</button>
                                    </div>
                                </form>
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
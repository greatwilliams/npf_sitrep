<?php	require 'validator.php'; ?>
<?php include('componets/header.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

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
                        <h4 class="h mb-0 text-gray-800">Add / Edit Users</h4>
                        <button  class="d-none d-sm-inline-block btn btn-sm btn-dark shadow-sm" data-toggle="modal" data-target="#form_modal">
                            <i class="fas fa-plus fa-sm text-white-50"></i> Add New User</button>
                    </div>

                    <div>
                        <!-- Success Message -->
                        <?php $msg = $_GET['msg']; ?>
                        <h1 class="h3 mb-4 text-gray-800"><span> <font size='3px' color='red'><?php echo $msg; ?></font> </span></h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Users Table</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Firstname</th>
                                            <th>Lastname</th>
                                            <th>Username</th>
                                            <th>Admin Status</th>
                                            <th>Active Status</th>
                                            <th>Register Priviledge</th>
											<th>Download Priviledge</th>
                                            <th>Edit Priviledge</th>
                                            <th >Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = 0;
                                            $query = mysqli_query($conn, "SELECT * FROM `user`") or die(mysqli_error());
                                            while($fetch = mysqli_fetch_array($query)){
                                        ?>
                                        <?php 
                                            if($fetch['status'] != "administrator" || $_SESSION['status'] == $fetch['status']){
                                        ?>	
                                            <tr class="del_user<?php echo $fetch['user_id']?>">
                                                <td><?php echo $i= $i+1; ?></td>
                                                <td><?php echo $fetch['firstname']?></td>
                                                <td><?php echo $fetch['lastname']?></td>
                                                <td><?php echo $fetch['username']?></td>
                                                <td><?php echo $fetch['status']?></td> 
												<td><?php if ($fetch['activate_user'] == "De-activated")
														{echo "<font color='red'>".$fetch['activate_user']."</font>";} else { echo $fetch['activate_user']; }?></td>
												<td><?php if ($fetch['register_priviledge'] == "")
														{echo "<font color='red'>Denied</font>";} else { echo $fetch['register_priviledge']; }?></td>
												<td><?php if ($fetch['download_priviledge'] == "")
														{echo "<font color='red'>Denied</font>";} else {echo $fetch['download_priviledge'];}?></td>
												<td><?php if ($fetch['edit_priviledge'] == "")
														{echo "<font color='red'>Denied</font>";} else {echo $fetch['edit_priviledge'];}?></td>
                                                <td><center>																			
                                                <?php if($fetch['status'] != "administrator"){ ?>
													<?php if($fetch['activate_user'] == "De-activated"){ ?>
													<button class="btn btn-success" data-toggle="modal" data-target="#activate_modal<?php echo $fetch['user_id']?>"><span class="glyphicon glyphicon-edit"></span> Activate </button> 
													<?php  }  ?>
													<?php if($fetch['activate_user'] == "Activated"){ ?>
                                                    <button class="btn btn-dark" data-toggle="modal" data-target="#edit_modal<?php echo $fetch['user_id']?>"><span class="glyphicon glyphicon-edit"></span> Priviledges </button> 
													<?php  } ?>
                                                    <?php if($fetch['activate_user'] == "Activated"){ ?>
													<button class="btn btn-danger" data-toggle="modal" data-target="#activate_modal<?php echo $fetch['user_id']?>"><span class="glyphicon glyphicon-edit"></span> De-activate </button> 
													<?php  } ?>
                                                    <?php if($fetch['activate_user'] == "Activated"){ ?>
													<button class="btn btn-info" data-toggle="modal" data-target="#change_password<?php echo $fetch['user_id']?>"><span class="glyphicon glyphicon-edit"></span> Password</button> 
													<?php  } ?>
												</center></td>
                                                <?php  } ?>
                                            </tr>
                                            
                                            


                                            <!-- Edit User Modal-->
                                            <div class="modal fade" id="edit_modal<?php echo $fetch['user_id']?>" aria-hidden="true">
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                        <form method="POST" action="update_user.php">	
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Update User</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="col-md-3"></div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Firstname</label>
                                                                        <input type="hidden" name="user_id" value="<?php echo $fetch['user_id']?>"/>
                                                                        <input type="text" name="firstname" value="<?php echo $fetch['firstname']?>" class="form-control" required="required"/>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Lastname</label>
                                                                        <input type="text" name="lastname" value="<?php echo $fetch['lastname']?>" class="form-control" required="required"/>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Username</label>
                                                                        <input type="text" name="username" value="<?php echo $fetch['username']?>" class="form-control" readonly required="required"/>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="hidden" name="password" class="form-control" value="<?php echo $fetch['password']?>" required="required"/>
                                                                    </div>
																	
																	<div>
												<p><b><u> Grant Priviledges</u></b> </p>
												<input type="checkbox" id="register_priviledge" name="register_priviledge" value="Granted"
												<?php if ($fetch['register_priviledge'] == 'Granted'){ echo 'checked';} ?> 
												>
												<label for="register_priviledge">Register Mails</label> <br>
												
												<input type="checkbox" id="download_priviledge" name="download_priviledge" value="Granted"
												<?php if ($fetch['download_priviledge'] == 'Granted'){ echo 'checked';} ?> 
												>
												<label for="download_priviledge"> Download Mails</label><br>
												
												<input type="checkbox" id="edit_priviledge" name="edit_priviledge"  value="Granted"
												<?php if ($fetch['edit_priviledge'] == 'Granted'){ echo 'checked';}  ?> 
												>
												<label for="edit_priviledge"> Edit Mails</label>
												</div>
																	
                                                                    <div class="form-group">
                                                                        <input  type="hidden" name="status" value="staff" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div style="clear:both;"></div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                                                                <button name="edit" class="btn btn-dark" ><span class="glyphicon glyphicon-save"></span> Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
											
											
											<!-- Activate User Modal-->
                                            <div class="modal fade" id="activate_modal<?php echo $fetch['user_id']?>" aria-hidden="true">
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                        <form method="POST" action="activate_user.php">	
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Activate User</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="col-md-3"></div>
                                                                <div class="col-md-6">
																	<?php if($fetch['activate_user'] == "De-activated"){ ?>
																	<div class="form-group">
																		<input type="radio" id="activate_user" name="activate_user" value="Activated" selected required="required">
																	 	<label for="html">Activate User</label><br>
																	</div>
																	<?php } ?>
																	<?php if($fetch['activate_user'] == "Activated"){ ?>
																	<div class="form-group">
																		<input type="radio" id="de-activate_user" name="activate_user" value="De-activated" required="required">
																	 	<label for="css">De-activate User</label><br>
																	</div>
																	<?php } ?>
                                                                    <div class="form-group">
                                                                        <input type="hidden" name="user_id" value="<?php echo $fetch['user_id']?>"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div style="clear:both;"></div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                                                                <button name="edit" class="btn btn-dark" ><span class="glyphicon glyphicon-save"></span> Update User</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Activate User Modal-->
                                            <div class="modal fade" id="change_password<?php echo $fetch['user_id']?>" aria-hidden="true">
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                        <form method="POST" action="change_password.php">	
                                                            <div class="modal-header">
                                                                <h4 class="modal-title"> Change Password</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="col-md-3"></div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Password</label>
                                                                        <input type="password" name="password" class="form-control" required="required"/>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="hidden" name="user_id" value="<?php echo $fetch['user_id']?>"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div style="clear:both;"></div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                                                                <button name="edit" class="btn btn-dark" ><span class="glyphicon glyphicon-save"></span> Update User</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
										
										<?php } } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- End Table -->

                    <div class="modal fade" id="form_modal1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title">System</h3>
                                </div>
                                <div class="modal-body">
                                    <center><h4 class="text-danger">Are you sure you want to delete this data?</h4></center>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-success" id="btn_yes">Yes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="form_modal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form method="POST" action="save_user.php">	
                                    <div class="modal-header">
                                        <h4 class="modal-title">Add User </h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Firstname</label>
                                                <input type="text" name="firstname" class="form-control" required="required"/>
                                            </div>
                                            <div class="form-group">
                                                <label>Lastname</label>
                                                <input type="text" name="lastname" class="form-control" required="required"/>
                                            </div>
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" name="username" class="form-control" required="required"/>
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="password" class="form-control" required="required"/>
                                            </div>
											
											<div>
												<p><b><u> Grant Priviledges</u></b> </p>
												<input type="checkbox" id="register_priviledge" name="register_priviledge" value="Granted" value="Granted">
												<label for="register_priviledge">Register Mails</label> <br>
												
												<input type="checkbox" id="download_priviledge" name="download_priviledge" value="Granted">
												<label for="download_priviledge"> Download Mails</label><br>
												
												<input type="checkbox" id="edit_priviledge" name="edit_priviledge" value="Granted" disabled>
												<label for="edit_priviledge"> Edit Mails</label> <br>
											</div>
											
											
                                                <input type="hidden" name="status" class="form-control"  value = "staff" required="required"/>

                                            
                                        </div>
                                    </div>
                                    <div style="clear:both;"></div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                                        <button name="save" class="btn btn-success" ><span class="glyphicon glyphicon-save"></span> Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>



                </div>
                <!--END  /.container-fluid -->

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
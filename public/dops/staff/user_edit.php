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
                    <h1 class="h3 mb-4 text-gray-800">Blank Page</h1>
					
					<div="row">
							<div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Edit User Account!!!</h1>
                            </div>

                            <?php  $id = $_GET['id']; //echo $id ; 
                            $sql_table = " SELECT * FROM user WHERE id = '$id' ";
                            $result_table = $conn->query($sql_table);
                            while($row = $result_table->fetch_assoc()) {
                            ?>
                            <form action="edit_users3.php" method="post" name="form1" id="form1" >
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <labal> Surname </label>
                                        <input type="text" class="form-control form-control-user" id="surname" name="surname"
                                         value="<?php echo $row['surname'] ?>" >
                                    </div>
                                    <div class="col-sm-6">
                                        <labal> Name </label>
                                        <input type="text" class="form-control form-control-user" id="name" name="name"
                                        value="<?php echo $row['name'] ?>" >
                                    </div>
                                </div>

                                <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                        <labal> Rank </label>
                                        <input type="text" class="form-control form-control-user" id="rank" name="rank"
                                        value="<?php echo $row['rank'] ?>"  >
                                    </div>
                                    <div class="col-sm-6 ">
                                        <labal> Username </label>
                                        <input type="text" class="form-control form-control-user" id="username" name="username"
                                        value="<?php echo $row['username'] ?>" >
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <labal> Email </label>
                                            <input type="text" class="form-control form-control-user" id="email" name="email" readonly
                                            value="<?php echo $row['email'] ?>"  > 
                                    </div>
                                   
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                    <!-- <labal> Admin Level </label> -->
                                      <select  class="form-control form-control-user" name="access_level" id="access_level" required hidden>
                                            <option value="<?php echo $row['access_level'] ?>" selected="selected"> <?php echo $row['access_level']. " Admin" ;?> </option>
                                            <option value="Zone">Zonal Admin</option>
                                            <option value="State">State Admin</option>
                                      </select>
                                    </div>
                                    <div class="col-sm-6">
                                    <!-- <labal> User Status  </label> -->
                                        <select  class="form-control form-control-user" name="active_level" id="active_level" required hidden>
                                            <option value="<?php echo $row['active_level'] ;?>" selected="selected" hidden> 
                                            <?php if($row['active_level'] == 1 ) { echo "Activated" ;} if($row['active_level'] == 0) { echo "Deactivated" ;} ?> </option>
                                            <option value="1">Activate User</option>
                                            <option value="0">Deactivate User</option>
                                      </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <!-- <labal> Password </label> -->
                                        <input type="password" class="form-control form-control-user" name="password" hidden
                                        value="<?php echo $row['password'] ?>" placeholder="Input new passowrd or ignore if you want to use existing Password"  id="exampleInputPassword"  >
                                    </div>
                                </div>
                                <input type="hidden" class="form-control form-control-user" name="id"  value="<?php echo $row['id'] ?>" />
                                <a>
                                <input class="btn btn-primary btn-user btn-block" type="submit" name="submit" id="submit" value="Register User" />
                                </a>
                                <hr>
                            </form>
                            <?php } ?>
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
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
                    <h1 class="h3 mb-4 text-gray-800">Edit Profile Page</h1>
                </div>
                <!-- /.container-fluid -->

                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div>
                        <!-- Success Message -->
                        <?php $msg = $_GET['msg']; ?>
                        <h2 class="h3 mb-4 text-gray-800"><span> <font size='3px' color='red'><?php echo $msg; ?></font> </span></h2>
                    </div>

                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="edit_profile.php">	
                                            <div class="form-group">
                                                <label>Firstname</label>
                                                <input type="text" name="firstname" class="form-control" required="required" readonly value="<?php echo $fetch['firstname'];?>" />
                                            </div>
                                            <div class="form-group">
                                                <label>Lastname</label>
                                                <input type="text" name="lastname" class="form-control" required="required" readonly value="<?php echo $fetch['lastname'];?>"  />
                                            </div>
                                            <div class="form-group">
                                                <label>Old Password</label>
                                                <input type="password" name="old_password" class="form-control" required="required"/>
                                                <?php 
                                                    //echo "Your Old Password is incorrect";
                                                    //echo "$old_password";
                                                    if(ISSET($_POST['save'])){
                                                        $old_password = md5($_POST['old_password']);
                                                        if($fetch['password'] != $old_password ){
                                                            echo "<font color='red'>Your Old Password is incorrect</font>";
                                                        }
                                                    }
                                                ?>
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="password" class="form-control" required="required"/>
                                            </div>
                                    </div>
                                    <div style="clear:both;"></div>
                                    <div>
                                        <button name="save" class="btn btn-primary" ><span class="glyphicon glyphicon-save"></span> Edit Profile</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- End of Main Content -->

            <!-- PHP Edit Code-->
            <?php
                require_once '../conn.php';
                
                if(ISSET($_POST['save'])){
                    if($fetch['password'] == $old_password ){
                            $password = md5($_POST['password']);
                            $sql = "UPDATE `user` 
                                    SET  `password` = '$password'
                                    WHERE `user_id` = $_SESSION[user] ";
                            if ($conn->query($sql) === TRUE) {
                              echo $msg = "Password updated successfully";
                            } else {
                              echo "Error updating record: " . $conn->error;
                            }
                            $conn->close();
                            //echo "<script>alert('Successfully updated!')</script>";
                            echo "<script>window.location = 'edit_profile.php?msg=$msg'</script>";
                    }
                }
            ?>

            <!-- End PHP Edit Code-->





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
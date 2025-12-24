<?php	require 'validator.php'; ?>
<?php include('componets/header2.php'); ?>

<body id="page-top">

<?php 
    $query1 = mysqli_query($conn, "SELECT * FROM `storage` WHERE `store_id` = '".$_REQUEST['store_id']."'") or die(mysqli_error());
    $fetch1 = mysqli_fetch_array($query1);
?>

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
                    <h1 class="h3 mb-4 text-gray-800">Update Incoming Mails</h1>

                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" enctype="multipart/form-data" method="POST" action="../save_file_editIncoming.php" >
                            <div class="form-group">
                                <label for="exampleInputName1">Address</label>
                                <input type="text" class="form-control" id="exampleInputName1" placeholder="Address" name="address" value="<?php echo $fetch1['address']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">  Date of the Incoming Mail</label>
                                <input class="form-control" id="exampleInputEmail3" placeholder="Incoming Date"
                                type="date" name="incomingDate" class="form-control" data-zdp_readonly_element="false" value="<?php echo $fetch1['date_uploaded']; ?>" required="required">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">  Date Recieved</label>
                                <input class="form-control" id="exampleInputEmail3" placeholder="Incoming Date"
                                type="date" name="receivedDate" class="form-control" data-zdp_readonly_element="false" value="<?php echo $fetch1['date_received']; ?>" required="required">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputCity1">Subject Matter</label>
                                <input type="text" class="form-control" id="exampleInputCity1" placeholder="Subject Matter" name="subjectMatter" value="<?php echo $fetch1['subjectMatter']; ?>"  required="required">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputCity1">Police Number </label>
                                <input type="text" class="form-control" id="exampleInputCity1" placeholder="policy" name="policy" value="<?php echo $fetch1['policy']; ?>"  required="required">
                            </div>
                            <div class="form-group">
                                <label>File upload</label>
                                <input type="file"  id="uploadFile" type="file" name="file" size="4" style="background-color:#fff;" required="required" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                </div>
                            </div>
                                <input  name="user_no" type='hidden' value="<?php echo $_SESSION['user']; ?>">
                                <input  name="store_id" type='hidden' value="<?php echo $_REQUEST['store_id']; ?>">
                            
                            <button type="submit"  name="update_incoming" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Submit</button>
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
    <script type="text/javascript">
	$(document).ready(function(){
		$('.btn_remove').on('click', function(){
			var store_id = $(this).attr('id');
			$("#modal_remove").modal('show');
			$('#btn_yes').attr('name', store_id);
		});
		
		$('#btn_yes').on('click', function(){
			var id = $(this).attr('name');
			$.ajax({
				type: "POST",
				url: "remove_file.php",
				data:{
					store_id: id
				},
				success: function(data){
					$("#modal_remove").modal('hide');
					$(".del_file" + id).empty();
					$(".del_file" + id).html("<td colspan='4'><center class='text-danger'>Deleting...</center></td>");
					setTimeout(function(){
						$(".del_file" + id).fadeOut('slow');
					}, 1000);
				}
			});
		});
	});
	$('#datepicker').Zebra_DatePicker();
                   
</script>


</body>

</html>
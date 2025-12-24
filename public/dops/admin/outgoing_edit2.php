
<?php 
session_start();
	
if($_SESSION['status'] != "administrator"){
	
	unset($_SESSION['user']);
	unset($_SESSION['status']);
	header("location:../");
}	require_once 'conn.php';
        
	if(ISSET($_REQUEST['store_id'])){
		$store_id = $_REQUEST['store_id'];
		
		$query = mysqli_query($conn, "SELECT * FROM `storage_outgoing` WHERE `store_id` = '$store_id'") or die(mysqli_error());
		$fetch  = mysqli_fetch_array($query);
		$filename = $fetch['filename'];
		$subjectMatter = $fetch['subjectMatter'];
                $address = $fetch['address'];
				$receiver_address = $fetch['receiver_address'];
				$sender_address = $fetch['sender_address'];
                $policy = $fetch['policy'];
                $date_uploaded = $fetch['date_uploaded'];
        }
        else{
            echo "mad man leave this place!!!!";
        }    
?>
	<?php include 'header.php'?>
                <head>
                <script src="js/jquery-3.2.1.min.js"></script>
                <link rel="stylesheet" href="dist/css/default/zebra_datepicker.min.css" type="text/css">
                <link rel="stylesheet" href="dist/css/default/zebra_datepicker.css" type="text/css">
                <style type="text/css">
                </head>

		
<!--
.style1 {color: #FF0000}
-->
        </style>
	</head>
<body>
    
	<nav class="navbar navbar-default navbar-fixed-top" style="background-color:green;">
		<div class="container-fluid">
			<label class="navbar-brand" id="title"> Police Accounts & Budget Document Management System</label>
			<?php 
			
			    $user_no = $_SESSION['user'];
				$query = mysqli_query($conn, "SELECT * FROM `user` WHERE `user_id` = '".$_SESSION['user']."'") or die(mysqli_error());
				$fetch = mysqli_fetch_array($query);
				
				$query1 = mysqli_query($conn, "SELECT * FROM `storage_outgoing` WHERE `store_id` = '".$_REQUEST['store_id']."'") or die(mysqli_error());
				$fetch1 = mysqli_fetch_array($query1);
			?>
			<ul class = "nav navbar-right">	
				<li class = "dropdown">
					<a class = "user dropdown-toggle" data-toggle = "dropdown" href = "#">
						<span class = "glyphicon glyphicon-user"></span>
						<?php 
							echo $fetch['firstname']." ".$fetch['lastname'];
						?>
						<b class = "caret"></b>					</a>
				<ul class = "dropdown-menu">
					<li>
                                                <li><a href = "home.php"><i class = "glyphicon glyphicon-home"></i> Dashboard</a></li>
												<li><a href = "incoming.php"><i class = "glyphicon glyphicon-edit"></i> Register Incoming mail </a></li>
												<li><a href = "outgoing.php"><i class = "glyphicon glyphicon-edit"></i> Register Outgoing mail </a></li>
												<li><a href = "incoming_view.php"><i class = "glyphicon glyphicon-edit"></i> View Incoming Mails</a></li>
												<li><a href = "outgoing_view.php"><i class = "glyphicon glyphicon-edit"></i> View Outgoing Mails</a></li>
												<li><a href = "logout.php"><i class = "glyphicon glyphicon-user" style="color:red"></i> Logout</a></li>
                                        </li>
				</ul>
				</li>
		  </ul>
		</div>
	</nav>
<style>	
	#imagePreview {
    width: 450px;
    height: 450px;
    background-position: center center;
    background-size: cover;
 
    display: inline-block;
}
</style>		
		
		<script type="text/javascript">
$(function() {
    $("#uploadFile").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
 
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
 
            reader.onloadend = function(){ // set image data as background of div
                $("#imagePreview").css("background-image", "url("+this.result+")");
            }
        }
    });
});
</script>	
	<?php //include 'sidebar.php'?>
   
	<div class="col-md-4">
		<?php
                
			//$query = mysqli_query($conn, "SELECT * FROM `student` WHERE `stud_id` = '$_SESSION[student]'") or die(mysqli_error());
			//$fetch = mysqli_fetch_array($query);
		?>
		<div class="panel panel-default" style="background-color:#393f4d;" id="panel-margin">
			<div class="panel-heading" style="background-color:#DC143C;">
                                <center><h1 class="panel-title" style="color:#ffffff;"><b>EDIT OUTGOING MAIL TO STORE</b></h1></center>
			</div>
			<div class="panel-body">
				<!--<h4 style="color:#fff;">Staff no: <label class="pull-right"><?php echo $fetch['stud_no']?></label></h4>
				<h4 style="color:#fff;">Name: <label class="pull-right"><?php echo $fetch['firstname']." ".$fetch['lastname']?></label></h4>
				<!--<h4 style="color:#fff;">Gender: <label class="pull-right"><?php echo $fetch['gender']?></label></h4>-->
				<!--<h4 style="color:#fff;">Year & Section: <label class="pull-right"><?php echo $fetch['yr&sec']?></label></h4>
				<h3 style="color:#fff;">File To Store</h3>-->
                                 
				<form method="POST" enctype="multipart/form-data" action="save_file_editOutgoing2.php">
                                    <div class="form-group">
                                       

                                        <input class="form-control" name="address" value="<?php echo $address; ?>" required="required"><br>
										<input class="form-control" name="receiver_address" placeholder="Receiver Address" value="<?php echo $receiver_address; ?>" required="required"><br>
										<input class="form-control" name="sender_address" placeholder="Sender Address" value="<?php echo $sender_address; ?>" required="required"><br>
                                       <input id="datepicker" type="date" name="outgoingDate" class="form-control" data-zdp_readonly_element="false" value="<?php echo $fetch1['date_uploaded']; ?>" required="required"><br>
                                        <input class="form-control" name="subjectMatter"  placeholder="Subject Matter" value="<?php echo $subjectMatter; ?>"  required="required"><br>
                                         <input class="form-control" name="policy" placeholder="Enter Policy Number" value="<?php echo $policy; ?>" required="required"><br>
										   <input  name="user_no" type='hidden' value="<?php echo $_SESSION['user']; ?>">
										   <input  name="store_id" type='hidden' value="<?php echo $_REQUEST['store_id']; ?>">
										    <textarea rows='5' cols='33' class="form-control" placeholder="Enter Remarks" name="remarks" required="required"><?php echo $fetch1['remarks']; ?> </textarea>
										   <input  name="filename" type='hidden' value="<?php echo  $fetch1['filename']; ?>">
										 
                                        
				</div>
					<input id="uploadFile" type="file" name="file" size="4" style="background-color:#fff;" required="required" />
					<br />
					
                                        <input type="hidden" name="store_id" value="<?php echo $store_id;?>"/>ss
					<button class="btn btn-success btn-sm" name="update_outgoing"><span class="glyphicon glyphicon-plus"></span> Add File</button>
				</form>
				<br style="clear:both;"/>
				<hr style="border-top:1px solid #fff;"/>
				<!--<button class="btn btn-danger pull-right" data-toggle="modal" data-target="#modal_confirm"><span class="glyphicon glyphicon-log-out"></span> Logout</button>-->
			</div>
		</div>
	</div>
	
	<div class="col-md-8">
		<div style="margin-top:200px;margin-left:200px">
			<div id="imagePreview">
				
			</div>
		</div>
		</div>
	<!--<div class="col-md-8">
		<div class="panel panel-default" style="margin-top:100px;">
			<div class="panel-body">
				<table id="table" class="table table-bordered">
					<thead>
						<tr>
							<th>Filename</th>
							<th>File Type</th>
                                                         <th>Subject Matter</th>
                                                         <th>Address</th>
                                                           <th>Policy No</th>
							<th>Date Uploaded</th>                                                       
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
                                                <?php 
							//$stud_no = $fetch['stud_no'];
                                                        $query = mysqli_query($conn, "SELECT * FROM `storage_outgoing`") or die(mysqli_error());
							while($fetch = mysqli_fetch_array($query)){
						?>
						<tr class="del_file<?php echo $fetch['store_id']?>">
							<td><?php echo substr($fetch['filename'], 0 ,30)."..."?></td>
							<td><?php echo $fetch['file_type']?></td>
                                                        <td><?php echo $fetch['subjectMatter']?></td>
                                                        <td><?php echo $fetch['address']?></td>
                                                        <td><?php echo $fetch['policy']?></td>
							<td><?php echo $fetch['date_uploaded']?></td>
                                                        <td><a href="download.php?store_id=<?php echo $fetch['store_id']?>" class="btn btn-success"><span class="glyphicon glyphicon-download"></span> Download</a> |<a href="outgoing_edit.php?store_id=<?php echo $fetch['store_id']?>" class="btn btn-danger btn_edit" type="button"><span class="glyphicon glyphicon-edit"></span> Edit</a></td>
						</tr>
						<?php
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>-->
	
	<div class="modal fade" id="modal_confirm" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title">System</h3>
				</div>
				<div class="modal-body">
					<center><h4 class="text-danger">Are you sure you want to logout?</h4></center>
				</div>
				<div class="modal-footer">
					<a type="button" class="btn btn-success" data-dismiss="modal">Cancel</a>
					<a href="logout.php" class="btn btn-danger">Logout</a>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modal_remove" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title">System</h3>
				</div>
				<div class="modal-body">
					<center><h4 class="text-danger">Are you sure you want to remove this file?</h4></center>
				</div>
				<div class="modal-footer">
					<a type="button" class="btn btn-success" data-dismiss="modal">No</a>
					<button type="button" class="btn btn-danger" id="btn_yes">Yes</button>
				</div>
			</div>
		</div>
	</div>
<?php include 'footer.php'?>
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

<script src="dist/zebra_datepicker.min.js"></script>
 <script src="dist/zebra_datepicker.src.js"></script>
</body>
</html>
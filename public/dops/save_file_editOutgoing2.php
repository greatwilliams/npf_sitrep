<?php
	require_once 'conn.php';
	
	if(ISSET($_POST['update_outgoing'])){
		        $store_id = $_POST['store_id'];
                $user_no = $_POST['user_no'];
                $address = $_POST['address'];
				$receiver_address = $_POST['receiver_address'];
				$sender_address = $_POST['sender_address'];
                $outgoingDate = $_POST['outgoingDate'];
                $filename = $_POST['filename'];
                $subjectMatter = $_POST['subjectMatter'];
                $policy = $_POST['policy'];
				$remarks = $_POST['remarks'];
/*		$file_name = $_FILES['file']['name'];
		$file_type = $_FILES['file']['type'];
		$file_temp = $_FILES['file']['tmp_name'];
		$location = "files_outgoing/".$filename ;
		$date = date("Y-m-d, h:i A", strtotime("+8 HOURS"));
		if(!file_exists("files_outgoing/")){
			mkdir("files_outgoing/");
*/
		$temp = explode(".", $_FILES['file']['name']);
        $newFilename = round(microtime(true)) . '.' .end($temp); 		
		$file_name = $_FILES['file']['name'];
		$file_type = $_FILES['file']['type'];
		$file_temp = $_FILES['file']['tmp_name'];
		$location = "files_outgoing/". $newFilename;
		if(!file_exists("files_outgoing/")){
			mkdir("files_outgoing/");
		
		}
		
		if(move_uploaded_file($file_temp, $location)){
			$address = mysqli_real_escape_string($conn,$address);
			$subjectMatter = mysqli_real_escape_string($conn,$subjectMatter);
			$policy = mysqli_real_escape_string($conn,$policy);
			mysqli_query($conn, "UPDATE `storage_outgoing` SET  filename = '$newFilename', date_uploaded = '$outgoingDate',  user_no = '$user_no', address = '$address',receiver_address = '$receiver_address', sender_address = '$sender_address', subjectMatter = '$subjectMatter', policy = '$policy', remarks = '$remarks'  WHERE store_id = $store_id") or die(mysqli_error());
			header("location: admin/outgoing.php?msg='Record Updated Successfully' ");
		}
	}
?>
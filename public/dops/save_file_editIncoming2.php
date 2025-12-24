<?php
	require_once 'conn.php';
	
	if(ISSET($_POST['update_incoming'])){
		       $store_id = $_POST['store_id'];
             	 $user_no = $_POST['user_no'];
                $address = $_POST['address'];
                $incomingDate = $_POST['incomingDate'];
				$receivedDate = $_POST['receivedDate'];
                $subjectMatter = $_POST['subjectMatter'];
				$filename = $_POST['filename'];
                $policy = $_POST['policy'];
	/*			
		$file_name = $_FILES['file']['name'];
		$file_type = $_FILES['file']['type'];
		$file_temp = $_FILES['file']['tmp_name'];
		$location = "files/".$filename;
		$date = date("Y-m-d, h:i A", strtotime("+8 HOURS"));
		if(!file_exists("files/")){
			mkdir("files/");
*/
			$temp = explode(".", $_FILES['file']['name']);
        $newFilename = round(microtime(true)) . '.' .end($temp); 		
		$file_name = $_FILES['file']['name'];
		$file_type = $_FILES['file']['type'];
		$file_temp = $_FILES['file']['tmp_name'];
		$location = "files/". $newFilename;
		$date = date("Y-m-d, h:i A", strtotime("+8 HOURS"));
		if(!file_exists("files/")){
			mkdir("files/");
		
		}
		
		if(move_uploaded_file($file_temp, $location)){
			$address = mysqli_real_escape_string($conn,$address);
			$subjectMatter = mysqli_real_escape_string($conn,$subjectMatter);
			$policy = mysqli_real_escape_string($conn,$policy);
			mysqli_query($conn, "UPDATE `storage` SET  filename = '$newFilename', date_uploaded = '$incomingDate', date_received = '$receivedDate',  user_no = '$user_no', address = '$address', subjectMatter = '$subjectMatter', policy = '$policy' WHERE store_id = $store_id") or die(mysqli_error());
			header("location: admin/incoming.php?msg='Record Updated Successfully' ");
		}
	}
?>
<?php
	require_once 'conn.php';
	//var_dump($_POST);
	
	if(ISSET($_POST['save'])){
	        $user_no = $_POST['user_no'];
                $address = $_POST['address'];
				$receiver_address = $_POST['receiver_address'];
				$sender_address = $_POST['sender_address'];
                $outgoingDate = $_POST['outgoingDate'];
                $subjectMatter = $_POST['subjectMatter'];
                $policy = $_POST['policy'];
				$remarks = $_POST['remarks'];
				$timestamped = date("Y-m-d");

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
			mysqli_query($conn, "INSERT INTO storage_outgoing (timestamped, filename, file_type, date_uploaded, user_no, address, receiver_address, sender_address, subjectMatter, policy, remarks)
														VALUES('$timestamped', '$newFilename', '$file_type', '$outgoingDate', '$user_no', '$address','$receiver_address','$sender_address','$subjectMatter','$policy', '$remarks')") or die(mysqli_error());
			header("location: staff/outgoing.php?msg='Record Inserted Successfully' "); 
			var_dump($_POST);
		}
	}
?>
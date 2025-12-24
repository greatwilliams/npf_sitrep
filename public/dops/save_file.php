<?php
	require_once 'conn.php';
	
	if(ISSET($_POST['save'])){
            
				$user_no = $_POST['user_no'];
                $address = $_POST['address'];
                $incomingDate = $_POST['incomingDate'];
				$receivedDate = $_POST['receivedDate'];
				$lastactioned = $_POST['lastactioned'];
                $subjectMatter = $_POST['subjectMatter'];
                $policy = $_POST['policy'];
				$timestamped = date("Y-m-d");

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
		
		var_dump($_POST);

		if(4>1){
			$address = mysqli_real_escape_string($conn,$address);
			$subjectMatter = mysqli_real_escape_string($conn,$subjectMatter);
			$policy = mysqli_real_escape_string($conn,$policy);
			mysqli_query($conn, "INSERT INTO storage (timestamped, date_uploaded, date_received, user_no, address, subjectMatter, policy) 
							VALUES('$timestamped', '$incomingDate', '$receivedDate', '$user_no', '$address', '$subjectMatter', '$policy')") or die(mysqli_error());
			$msg = 'Record Inserted Successfully';
			header("location: staff/incoming.php?msg=$msg "); 
			var_dump($_POST);


			
		}
	}
?>
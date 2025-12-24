
<?php

// Start the session
session_start();
$user_id = $_SESSION['user'];
//echo "Session variables are set.";
//echo $user_id;

	require_once '../conn.php';

	if(ISSET($_POST['update'])){
		$stud_id = $_POST['stud_id'];
		$volume_no = $_POST['volume_no'];
		$folio_no = $_POST['folio_no'];
		$attachment = $_POST['attachment'];
		
	$query = mysqli_query($conn, "SELECT * FROM `file_volume` WHERE `stud_id` = '$stud_id' GROUP BY `id` DESC LIMIT 1") or die(mysqli_error());
				while($fetch = mysqli_fetch_array($query)){
	
		if ($fetch['volume_no'] <= 0) {
			$volume_no = 1;
			} else 
			$volume_no = $fetch['volume_no'];
			
		if ($fetch['folio_no'] + $attachment >= 999 ) {
			$folio_no = $attachment + 1;
			$volume_no = $fetch['volume_no'] + 1;
			} else
			$folio_no = $fetch['folio_no'] + $attachment + 1;

		$id = $fetch['id'] +1; 
		echo "  volume_no " ;
		echo $volume_no;
		echo " folio_no  " ; 
		echo $folio_no;
		echo " id " ;	
		echo $id; 
		echo "  stud_id " ;
		echo $stud_id;
		echo "  user_id " ;
		echo $user_id;
		echo " Date ";
		$time_stamp = date("Y-m-d H:i:s");
		echo $time_stamp;

		//print_r($fetch);

	}	
	 //echo "HELOO";
		
	}
	mysqli_query($conn, "INSERT INTO file_volume (stud_id, volume_no, folio_no, user_id)
						VALUES('$stud_id', '$volume_no', '$folio_no', '$user_id')") or die(mysqli_error());
	header("location: home_all.php?id=$stud_id");

		
?>


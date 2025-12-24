<?php
	require 'validator.php';
	require_once '../conn.php';

	var_dump($_POST);

	if(ISSET($_POST['update'])){

		//$id = $_POST['id'];
		$stud_id = $_POST['id'];
		$volume_no = $_POST['volume_no'];
		$folio_no = $_POST['folio_no'];
		$user_id = $_SESSION['user'];
		
		
		//echo "$id ";
		echo "$stud_id ";
		echo "$volume_no ";
		echo "$folio_no ";
		echo "$user_id ";

		echo "I can see you "; 
	
		mysqli_query($conn, "INSERT INTO file_volume (stud_id, volume_no, folio_no, user_id)
		VALUES('$stud_id', '$volume_no', '$folio_no', '$user_id')") or die(mysqli_error());

echo "I can see you "; echo "$folio_no ";
		

		echo "<script>alert('Successfully updated!')</script>";
		echo "<script>window.location = 'home-folio.php'</script>";
		$msg = "Policy Number Updated Successfully";
		header("location: home-folio.php?msg=$msg");
	
	}
	?>


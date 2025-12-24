<?php	require 'validator.php'; ?>
<?php
	require_once '../conn.php';
	
	if(ISSET($_POST['update'])){
		$stud_id = $_POST['stud_id'];
		$stud_no = $_POST['stud_no'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		
		
		mysqli_query($conn, "UPDATE `student` SET `stud_no` = '$stud_no', `firstname` = '$firstname', `lastname` = '$lastname' 
		WHERE `stud_id` = '$stud_id'") or die(mysqli_error());
		
		echo "<script>alert('Successfully updated!')</script>";
		echo "<script>window.location = 'home.php'</script>";
		header('location: home.php');

	}
?>
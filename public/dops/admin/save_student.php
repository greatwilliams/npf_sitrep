<?php	require 'validator.php'; ?>
<?php
	require_once '../conn.php';
	
	if(ISSET($_POST['save'])){
		$stud_no = $_POST['stud_no'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$gender = $_POST['gender'];
		$yrsec = $_POST['year']."".$_POST['section'];
		$password = md5($_POST['password']);

		//var_dump($_POST);
		
		mysqli_query($conn, "INSERT INTO student  (stud_no, firstname, lastname)
									VALUES('$stud_no', '$firstname', '$lastname')") 
									or die(mysqli_error());
		
		echo "<script>alert('Successfully updated!')</script>";
		header('location: home.php');
	}
?>
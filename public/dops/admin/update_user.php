<?php	require 'validator.php'; ?>
<?php
	require_once '../conn.php';
	
	if(ISSET($_POST['edit'])){
		$user_id = $_POST['user_id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$username = $_POST['username'];
		//$password = md5($_POST['password']);
		$password = $_POST['password'];
		$register_priviledge = $_POST['register_priviledge'];
		$download_priviledge = $_POST['download_priviledge'];
		$edit_priviledge = $_POST['edit_priviledge'];
		
		mysqli_query($conn, "UPDATE `user` SET `firstname` = '$firstname', `lastname` = '$lastname', `username` = '$username', `password` = '$password',
		`register_priviledge` = '$register_priviledge',
		`download_priviledge` = '$download_priviledge',
		`edit_priviledge` = '$edit_priviledge'

		WHERE `user_id` = '$user_id'") or die(mysqli_error());
		
		//echo "<script>alert('Successfully updated!')</script>";
		echo "<script>window.location = 'user.php'</script>";
	}
?>
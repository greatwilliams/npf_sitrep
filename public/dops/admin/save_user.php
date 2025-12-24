<?php	require 'validator.php'; ?>
<?php
	require_once '../conn.php';
	
	if(ISSET($_POST['save'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$status = $_POST['status'];
		$register_priviledge = $_POST['register_priviledge'];
		$download_priviledge = $_POST['download_priviledge'];
		$edit_priviledge = $_POST['edit_priviledge'];

	print_r($_POST);
		
		mysqli_query($conn, "INSERT INTO user (firstname, lastname, username, password, download_priviledge, register_priviledge, edit_priviledge, status)
		VALUES('$firstname', '$lastname', '$username', '$password', '$download_priviledge', '$register_priviledge', '$edit_priviledge', '$status')") 
		or die(mysqli_error());
		//var_dump($_POST);
		header('location: user.php');
	}
?>
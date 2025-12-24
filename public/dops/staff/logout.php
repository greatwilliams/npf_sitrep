<?php
	session_start();
	unset($_SESSION['user']);
	unset($_SESSION['status']);
	
	unset($_SESSION['firstname']);
	unset($_SESSION['lastname']);
	unset($_SESSION['user_id']);
	unset($_SESSION['activate_user']);
	unset($_SESSION['download_priviledge']);
	unset($_SESSION['register_priviledge']);
	unset($_SESSION['edit_priviledge']);
	header("location:../");
?>
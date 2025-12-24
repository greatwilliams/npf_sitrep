<?php
	session_start();
	
	if($_SESSION['status'] != "administrator"){
		
		unset($_SESSION['user']);
	    unset($_SESSION['status']);
		header("location:../");
	}
?>
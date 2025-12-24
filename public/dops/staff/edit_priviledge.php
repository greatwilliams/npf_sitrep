<?php
	session_start();
	//var_dump($_SESSION); 
	if($_SESSION['status'] != "staff"){		
		unset($_SESSION['user']);
	    unset($_SESSION['status']);
		header("location:../");
	}
?>
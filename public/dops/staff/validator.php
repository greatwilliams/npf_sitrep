<?php
	session_start();
	//var_dump($_SESSION); 
	if($_SESSION['status'] != "staff"){		
		unset($_SESSION['user']);
	    unset($_SESSION['status']);
		header("location:../");
	}
	
	if($_SESSION['activate_user'] != "Activated"){		
		unset($_SESSION['user']);
	    unset($_SESSION['status']);
		header("location:../?msg='Your Account is not Activated: Contact the System Administrator' ");
	}
?>


			
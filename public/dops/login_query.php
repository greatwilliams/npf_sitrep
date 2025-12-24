<?php
	session_start();
	require 'conn.php';
	
	if(ISSET($_POST['login'])){
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		
		$query = mysqli_query($conn, "SELECT * FROM `user` WHERE `username` = '$username' && `password` = '$password' ") or die(mysqli_error());
		// $query = mysqli_query($conn, "SELECT * FROM `user` WHERE `username` = '$username'  ") or die(mysqli_error());
		// $query = mysqli_query($conn, "SELECT * FROM `user` WHERE `username` = '$username'  ") or die(mysqli_error());
		$fetch = mysqli_fetch_array($query);
		$row = $query->num_rows;
		
		if($row > 0){
			$_SESSION['firstname'] = $fetch['firstname'];
			$_SESSION['lastname'] = $fetch['lastname'];
			$_SESSION['user'] = $fetch['user_id'];
			$_SESSION['status'] = $fetch['status'];
			$_SESSION['activate_user'] = $fetch['activate_user'];
			$_SESSION['download_priviledge'] = $fetch['download_priviledge'];
			$_SESSION['register_priviledge'] = $fetch['register_priviledge'];
			$_SESSION['edit_priviledge'] = $fetch['edit_priviledge'];
			
			if ($fetch['status'] == "administrator")
			{
				//echo "im here";
				//var_dump($_SESSION); 
			header("location:admin/dashboard.php");
			}
			if ($fetch['status'] == "Regular") 
			{
				 header("location:home.php");
			}
			if ($fetch['status'] == "staff") 
			{
				header("location:staff/dashboard.php");
				//var_dump($_SESSION); 
			}
		}else{
			echo "<center><label class='text-danger'>Invalid username or password</label></center>";
			//$msg = $_GET["msg"];
			//echo "$msg" ;

		}
	}
?>
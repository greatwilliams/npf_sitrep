<?php	require 'validator.php'; ?>

<?php
	require_once 'conn.php';
	if(ISSET($_REQUEST['store_id'])){
		$store_id = $_REQUEST['store_id'];
		//$user_id = $_GET['user_id'];
		$firstname = $_SESSION['firstname'];
		$lastname = $_SESSION['lastname'];
		$user_id = $_SESSION['user'];
		
		echo $firstname;
		echo $lastname;
		echo $store_id;
		
		
		$query = mysqli_query($conn, "SELECT * FROM `storage` WHERE `store_id` = '$store_id'") or die(mysqli_error());
		$fetch  = mysqli_fetch_array($query);
		$filename = $fetch['filename'];
		$user_no = $fetch['user_no'];
		$policy_number = $fetch['policy'];
		
		echo $user_id;
		echo $policy_number;
		$download_date = date("Y-m-d");
		echo $download_date;
		
		
		mysqli_query($conn, "INSERT INTO  incoming_downloads (store_id, user_id, policy_number, download_date, firstname, lastname)
		VALUES('$store_id', '$user_id', '$policy_number', '$download_date', '$firstname', '$lastname')")or die(mysqli_error());
		//var_dump($_POST);
		
		
		
		header("Content-Disposition: attachment; filename=".$filename);
		header("Content-Type: application/octet-stream;");
		readfile("files/".$filename);
	}
?>
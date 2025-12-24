<?php	require 'validator.php'; ?>
<?php
	require_once '../conn.php';
	
	if(ISSET($_POST['edit'])){
		echo $user_id = $_POST['user_id'];
		$password = md5($_POST['password']);
		//echo $password = $_POST['password'];
		echo $activate_user = $_POST['activate_user'];
				
		$sql = "UPDATE `user` 
				SET  `activate_user` = '$activate_user'
				WHERE `user_id` = '$user_id' ";
		if ($conn->query($sql) === TRUE) {
		  echo "Record updated successfully";
		} else {
		  echo "Error updating record: " . $conn->error;
		}

		$conn->close();
		
		//echo "<script>alert('Successfully updated!')</script>";
		echo "<script>window.location = 'user.php'</script>";
	}
?>


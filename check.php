<?php 
	include_once('config/config.php');
	include_once('includes/classes/User.php');
	$conn = new DB;
	$hello = $conn->getConnection();
	$usr = new User;

	if(isset($_POST['username'])){
		$username = $_POST['username'];
		$username = mysqli_real_escape_string($hello, $username);

		$query = "SELECT * FROM user where username = '$username'";
		$user_count = $usr->checkUser($query);

		if($user_count > 0){
			echo '<span class="text-danger">Username already exists</span>';
		}else{
			echo '<span class="text-success">Username available</span>';
		}
	}

	if(isset($_POST['email'])){
		$email = $_POST['email'];
		$email = mysqli_real_escape_string($hello, $email);

		$query = "SELECT * FROM user where email = '$email'";
		$email_count = $usr->checkEmail($query);

		if($email_count > 0){
			echo '<span class="text-danger">Email already exists</span>';
		}else{
			echo '<span class="text-success">Email Good</span>';
		}
	}
?>
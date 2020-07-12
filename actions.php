<?php 
	require_once 'config/init.php';
	$usr = new User;
	$adm = new Admin;
	$gallery = new Gallery;

	if(isset($_POST['register'])){
		$sessionCaptcha = $_SESSION['captcha'];
		$formCaptcha = $_POST['captcha'];

		if($sessionCaptcha == $formCaptcha){
			$fullname =	test_input($_POST['fullname']);
			$username =	test_input($_POST['username']);
			$email =	test_input($_POST['email']);
			$retrivepassword =	test_input($_POST['password']);
			$password = md5($retrivepassword);

			if($fullname != '' && $username != '' && $email != '' && $password !=''){
				$usr->setFullname($fullname);
				$usr->setUsername($username);
				$usr->setEmail($email);
				$usr->setPassword($password);

				$return = $usr->registerUser($fullname, $username, $email, $password);
				if($return){
					header('Location:login.php');
				}else{
					$msg = '<div class="alert alert-danger" role="alert">Email already Exists</div>';
				}
			}else{
				$msg = '<div class="alert alert-danger" role="alert">Please Fill in all the details</div>';
			}
		}else{
			$msg = '<div class="alert alert-danger" role="alert">The captcha is wrong!!</div>';
		}
	}

	if(isset($_POST['login'])){
		$username = test_input($_POST['username']);
		$retrivepassword = test_input($_POST['password']);
		$password = md5($retrivepassword);
		$usr->setUsername($username);
		$usr->setPassword($password);

		$return = $usr->loginUser($username, $password);

		if($return){
			header('Location:profile.php');
		}else{
			$msg = '<div class="alert alert-danger" role="alert">Username or password is incorrect</div>';
		}
	}



	if(isset($_POST['update'])){
		$user_id =	test_input($_POST['user_id']);
		$fullname =	test_input($_POST['fullname']);
		$email =	test_input($_POST['email']);
		$retrivepassword =	test_input($_POST['password']);
		$password = md5($retrivepassword);

		if($fullname != '' && $email != '' && $password !=''){
			$usr->setUserId($user_id);
			$usr->setFullname($fullname);
			$usr->setEmail($email);
			$usr->setPassword($password);

			$return = $usr->updateUser($user_id, $fullname, $email, $password);
			if($return){
				$msg = '<div class="alert alert-success" role="alert">Profile Successfully Updated..</div>';
			}else{
				$msg = '<div class="alert alert-danger" role="alert">Your Password is incorrect!!</div>';
			}
		}else{
			$msg = '<div class="alert alert-danger" role="alert">Please Fill in all the details</div>';
		}
	}

	if(isset($_POST['changepassword'])){
		$user_id =	test_input($_POST['user_id']);
		$retrieveoldpassword =	test_input($_POST['oldpassword']);
		$oldpassword = md5($retrieveoldpassword);
		$password =	test_input($_POST['password']);
		$cpassword =	test_input($_POST['cpassword']);
		$password = md5($password);
		$cpassword = md5($cpassword);

		if($password != $cpassword){
			$msg = '<div class="alert alert-info" role="alert">Password and Confirm Password are not same.</div>';
		}else{
			$usr->setUserId($user_id);
			$usr->setOldPassword($oldpassword);
			$usr->setPassword($password);

			$return = $usr->updatePassword($user_id, $oldpassword, $password);
			if($return){
				$msg = '<div class="alert alert-success" role="alert">Password Changed Successfully..</div>';
			}else{
				$msg = '<div class="alert alert-danger" role="alert">Old Password is incorrect.!!</div>';
			}			
		}
	}

	if(isset($_POST['sendMessage'])){
		require_once 'email.php';
		$name = test_input($_POST['name']);
		$email = test_input($_POST['email']);
		$subject = test_input($_POST['subject']);		
		$message = test_input($_POST['message']);

		$sending = sendmail($name, $email, $subject, $message);
		if($sending){
			$msg = '<div class="alert alert-success" role="alert">Message has been sent.</div>';
		}else{
			$msg = '<div class="alert alert-danger" role="alert">Unable to send message</div>';
		}
	}

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
?>
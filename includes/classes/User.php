<?php 
	require_once './config/config.php';
	class User extends DB{
		public $user_id;
		public $username;
		public $email;
		public $password;

		public function __construct(){
			$obj = new DB;
			$this->conn = $obj->getConnection();
		}

		public function setUserId($user_id){
			$this->user_id = $user_id;
		}

		public function getUserId(){
			return $this->user_id;
		}

		public function setFullname($fullname){
			$this->fullname = $fullname;
		}

		public function getFullname(){
			return $this->fullname;
		}

		public function setUsername($username){
			$this->username = $username;
		}

		public function getUsername(){
			return $this->username;
		}

		public function setEmail($email){
			$this->email = $email;
		}

		public function getemail(){
			return $this->email;
		}

		public function setPassword($password){
			$this->password = $password;
		}

		public function getPassword(){
			return $this->password;
		}

		public function setOldPassword($oldpassword){
			$this->oldpassword = $oldpassword;
		}

		public function getOldPassword(){
			return $this->oldpassword;
		}


		public function registerUser($fullname, $username, $email, $password){
			// $password = password_hash('$this->password', PASSWORD_DEFAULT);
			// $token = bin2hex(random_bytes(5));
			$existUser = "SELECT * FROM user WHERE email='$email'";
			$run = mysqli_query($this->conn, $existUser);

			if($run->num_rows >0){
				$msg = "Email already Exists";
				return;
			}else{
				$sql = "INSERT INTO user(user_id, fullname, username, email, password, role) values ('','$this->fullname','$this->username', '$this->email', '$this->password', 'user')";
				if(mysqli_query($this->conn, $sql)){
					//echo "success";
					header('Location:login.php');
				}else{
					echo "Error to insert";
				}
			}
		}


		public function loginUser($username, $password){
			$query = "SELECT user_id FROM user WHERE (username = '$username' and password ='$password')";
			$run= mysqli_query($this->conn, $query);

			if($run->num_rows > 0){
				$row = $run->fetch_object();

				$query = "SELECT * FROM user WHERE user_id = '$row->user_id'";

				$run= mysqli_query($this->conn, $query);

				$row=$run->fetch_object();

				if($row->role == 'admin'){
					$_SESSION['user']=$row;
					header('Location:adminprofile.php');
				}elseif($row->role == 'user'){
					$_SESSION['user']=$row;
					header('Location:profile.php');
				}else{
					$msg = "Password is not valid";
				}
			}else{
				$msg= "User is not active";
			}
		}

		public function updateUser($user_id, $fullname, $email, $password){
			// $password = password_hash('$this->password', PASSWORD_DEFAULT);
			// $token = bin2hex(random_bytes(5));
			$sql = "SELECT password FROM user where user_id = '$this->user_id'";
			$run= mysqli_query($this->conn, $sql);			
			$row=$run->fetch_object();
			// echo $row->password;
				if($row->password == $this->password){
					$sql = "UPDATE user SET fullname = '$this->fullname', email = '$this->email' WHERE user_id = '$this->user_id'";
					if(mysqli_query($this->conn, $sql)){
						return true;
					}
				}else{
					return false;
				}
		}


		public function updatePassword($user_id, $oldpassword, $password){
			$sql = "SELECT password FROM user where user_id = '$this->user_id'";
			$run= mysqli_query($this->conn, $sql);			
			$row=$run->fetch_object();
			// echo $row->password;
				if($row->password == $this->oldpassword){
					$sql = "UPDATE user SET password = '$this->password' WHERE user_id = '$this->user_id'";
					if(mysqli_query($this->conn, $sql)){
						return true;
					}
				}else{
					return false;
				}
			
		}

		public function getUserById($user_id){
			$sql = "SELECT * FROM user where user_id = ".$user_id;
			$run= mysqli_query($this->conn, $sql);
			while($row = mysqli_fetch_assoc($run)){
				$array[] = $row;
			}
			return $array;
			
		}

		public function getUsers(){
			$sql = "SELECT * FROM user where role = 'user'";

			$array = array();
			$query = mysqli_query($this->conn, $sql);
			while($row = mysqli_fetch_assoc($query)){
				$array[] = $row;
			}
			return $array;
		}

		public function checkUser($query){
			$result = mysqli_query($this->conn,$query);
			$rowcount = mysqli_num_rows($result);

			return $rowcount;
		}

		public function checkEmail($query){
			$result = mysqli_query($this->conn,$query);
			$rowcount = mysqli_num_rows($result);

			return $rowcount;
		}
	}

	$usr = new User;
 ?>
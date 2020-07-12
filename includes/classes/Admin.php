<?php 
	require_once './config/config.php';	
	class Admin extends DB{
		
		public function __construct(){
			$obj = new DB;
			$this->conn = $obj->getConnection();
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
	}
 ?>
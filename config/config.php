<?php
 	class DB{
	private $host;
	private $username;
	private $password;
	private $dbname;
	// protected $connect;

	function __construct(){
		$this->host= "localhost";
		$this->username= "root";
		$this->password= "";
		$this->dbname= "checkpoint2";
	}

	function getConnection(){
		$this->conn= new mysqli($this->host, $this->username, $this->password, $this->dbname);
		if($this->conn->connect_error){
			die("error:" .$this->conn->error);
		}else{
			return $this->conn;
		}
	}
}
?>
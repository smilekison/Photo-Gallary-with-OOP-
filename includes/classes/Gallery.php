<?php 	
	require_once './config/config.php';
	class Gallery extends DB{
		public $title;
		public $subheading;
		public $author;
		public $date;
		public $publish;

		public function __construct(){
			$obj = new DB;
			$this->conn = $obj->getConnection();
		}

		public function setTitle($title){
			$this->title = $title;
		}

		public function getTitle(){
			return $this->title;
		}

		public function setSubHeading($subheading){
			$this->subheading = $subheading;
		}

		public function getSubHeading(){
			return $this->subheading;
		}

		public function setContent($content){
			$this->content = $content;
		}

		public function getContent(){
			return $this->content;
		}

		public function setAuthor($author){
			$this->author = $author;
		}

		public function getAuthor(){
			return $this->author;
		}

		public function setDate($publishdate){
			$this->publishdate = $publishdate;
		}

		public function getDate(){
			return $this->publishdate;
		}

		public function setPublish($publish){
			$this->publish = $publish;
		}

		public function getPublish(){
			return $this->publish;
		}

		public function setImage($image){
			$this->image = $image;
		}

		public function getImage(){
			return $this->image;
		}	

		public function AddPhotos($title, $subheading, $content, $image, $author, $publishdate, $publish){
			$sql = "INSERT INTO photos(title, subheading, content, image, author, publishdate,  publish, status) VALUES ('$this->title','$this->subheading','$this->content','$this->image','$this->author','$this->publishdate','$this->publish', 'active')";

			//echo $sql;
			if($run = mysqli_query($this->conn, $sql)){
				return true;
			}else{
				return false;
			}
		}

		public function getActivePhotos(){
			$sql = "SELECT * FROM photos where status='active'";
			$array = array();
			$query = mysqli_query($this->conn, $sql);
			while($row = mysqli_fetch_assoc($query)){
				$array[] = $row;
			}
			return $array;
		}

		public function getDeletedPhotos(){
			$sql = "SELECT * FROM photos where status='deleted'";
			$array = array();
			$query = mysqli_query($this->conn, $sql);
			while($row = mysqli_fetch_assoc($query)){
				$array[] = $row;
			}
			return $array;
		}

		public function getPhotosById($photo_id){
			$sql = "SELECT * FROM photos where photo_id = ".$photo_id;
			$run= mysqli_query($this->conn, $sql);
			while($row = mysqli_fetch_assoc($run)){
				$array[] = $row;
			}
			return $array;
			
		}

		public function updatePhotos($photo_id, $title, $subheading, $content, $image, $author, $publishdate, $publish){
			$sql = "UPDATE photos SET title = '$this->title', subheading = '$this->subheading', content = '$this->content', image='$this->image', author = '$this->author', publishdate = '$this->publishdate', publish = '$this->publish' WHERE photo_id = ".$photo_id;

			// echo $sql;
			if(mysqli_query($this->conn, $sql)){
				return true;
			}else{
				return false;
			}
		}

		public function deletePhotos($photo_id){
			$sql = "UPDATE photos SET status = 'deleted' WHERE photo_id = ".$photo_id;
			if(mysqli_query($this->conn, $sql)){
				return true;
			}else{
				return false;
			}
		}

		public function restorePhotos($photo_id){
			$sql = "UPDATE photos SET status = 'active' WHERE photo_id = ".$photo_id;
			if(mysqli_query($this->conn, $sql)){
				return true;
			}else{
				return false;
			}
		}
	}
 ?>
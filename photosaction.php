<?php 
	require_once 'config/init.php';
	$gallery = new Gallery;

	if(isset($_POST['addphotos'])){
		$target_dir = "assets/images/";
		$target_file = $target_dir . basename($_FILES["image"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$check = getimagesize($_FILES["image"]["tmp_name"]);
		if($check !== false) {
	        // Check file size
			if ($_FILES["image"]["size"] > 500000000) {
			    echo "Sorry, your file is too large.";
			    $uploadOk = 0;
			}else{
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
				    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				    $uploadOk = 0;
				}else{
					if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
				        // echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
				        $title =	test_input($_POST['title']);
						$subheading =	test_input($_POST['subheading']);
						$content =	test_input($_POST['content']);
						$author =	test_input($_POST['author']);
						$publishdate =	$_POST['publishdate'];
						$publish = isset($_POST['publish']) ? $_POST['publish'] : 0;
						$image = $_FILES["image"]["name"];

						if($title != '' && $subheading != '' && $content != '' && $author != '' && $image){
							$gallery->setTitle($title);
							$gallery->setSubHeading($subheading);
							$gallery->setContent($content);
							$gallery->setAuthor($author);
							$gallery->setDate($publishdate);
							$gallery->setPublish($publish);
							$gallery->setImage($image);

							$run = $gallery->AddPhotos($title, $subheading, $image, $content, $author, $publishdate, $publish);
							if($run){
								$msg = '<div class="alert alert-success" role="alert">Successfully Added!!</div>';
							}else{
								$msg = '<div class="alert alert-danger" role="alert">Unable to add</div>';
							}
						}else{
							$msg = '<div class="alert alert-danger" role="alert">Please Fill in all the details</div>';
						}
				    }else{
				        echo "Sorry, there was an error uploading your file.";
				    }
				}
			}
	    }else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }
	}

	if(isset($_POST['update'])){
		$photo_id = $_GET['photo_id'];
		$target_dir = "assets/images/";
		$target_file = $target_dir . basename($_FILES["image"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$check = getimagesize($_FILES["image"]["tmp_name"]);
		if($check !== false) {
	        // Check file size
			if ($_FILES["image"]["size"] > 500000) {
			    echo "Sorry, your file is too large.";
			    $uploadOk = 0;
			}else{
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
				    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				    $uploadOk = 0;
				}else{
					if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
				        // echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
				        $title =	test_input($_POST['title']);
						$subheading =	test_input($_POST['subheading']);
						$content =	test_input($_POST['content']);
						$author =	test_input($_POST['author']);
						$publishdate =	$_POST['publishdate'];
						$publish = isset($_POST['publish']) ? $_POST['publish'] : 0;
						$image = $_FILES["image"]["name"];

						if($title != '' && $subheading != '' && $content != '' && $author != '' && $image){
							$gallery->setTitle($title);
							$gallery->setSubHeading($subheading);
							$gallery->setContent($content);
							$gallery->setAuthor($author);
							$gallery->setDate($publishdate);
							$gallery->setPublish($publish);
							$gallery->setImage($image);

							$run = $gallery->updatePhotos($photo_id, $title, $subheading, $image, $content, $author, $publishdate, $publish);
							if($run){
								$msg = '<div class="alert alert-success" role="alert">Successfully Updated!!</div>';
							}else{
								$msg = '<div class="alert alert-danger" role="alert">Unable to add</div>';
							}
						}else{
							$msg = '<div class="alert alert-danger" role="alert">Please Fill in all the details</div>';
						}
				    }else{
				        echo "Sorry, there was an error uploading your file.";
				    }
				}
			}
	    }else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }
	}

	if(isset($_GET['delete'])){
		$photo_id = $_GET['photo_id'];
		$run = $gallery->deletePhotos($photo_id);
		if($run){
			$msg = '<div class="alert alert-success" role="alert">Photos Successfully Deleted..</div>';
			header('Location:removedphotos.php');
		}else{
			$msg = '<div class="alert alert-danger" role="alert">Error in Updating the Photos!!</div>';
		}
	}

	if(isset($_GET['restore'])){
		$photo_id = $_GET['photo_id'];
		$run = $gallery->restorePhotos($photo_id);
		if($run){
			$msg = '<div class="alert alert-success" role="alert">Photos Successfully Restored..</div>';
			header('Location:listphotos.php');
		}else{
			$msg = '<div class="alert alert-danger" role="alert">Error in Updating the Photos!!</div>';
		}
	}

	function test_input($data) {
	  	$data = trim($data);
		$data = htmlspecialchars($data, ENT_QUOTES);

		return $data;
	}
?>
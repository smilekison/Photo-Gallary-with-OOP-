<?php 

/*Create dynamic JSOn file in PHP mysali*/
function get_data(){
	include_once ("config/config.php");
	$db = new DB;
	$connection = $db->getConnection();
	$query = "SELECT * FROM user"; 
	$result = mysqli_query($connection, $query);

	$user_data = array();

	while($row = mysqli_fetch_array($result)){
		$user_data[]=array(
			'user_id'=>$row['user_id'],
			'fullname'=>$row['fullname'],
			'username'=>$row['username'],
			'email'=>$row['email']
		);
	}
	return json_encode($user_data);
}

echo '<pre>';
print_r(get_data()).'<br />';
echo '</pre>';

$file_name = 'userfile.json';
	if(file_exists($file_name)){
        unlink($file_name);
        if(file_put_contents($file_name, get_data())){
			echo $file_name. ' file updated with new details.';
		}else{
			echo 'There is some error';
		}
    }else{
    	if(file_put_contents($file_name, get_data())){
			echo $file_name. ' file created';
		}else{
			echo 'There is some error';
		}
    }
?>
<?php 
	$config['base_url']='http://awec7202705.tk/';

	//Database
	$db['hostname'] = 'localhost';
	$db['username'] = 'id7932055_awec7202705';
	$db['password'] = 'awec7202705';
	$db['database'] = 'id7932055_awec7202705';
	$db['dbdriver'] = 'mysqli';


	function __autoload($class_name){
		require_once 'includes/classes/'.$class_name.'.php';
	}
?>
<?php
header("Content-type:text/xml");
include ("config/config.php");
$db = new DB;
$connection = $db->getConnection();
$query = "SELECT * FROM user"; 
$result = mysqli_query($connection, $query);
$xml = new DOMDocument("1.0", "UTF-8");
$xml->formatOutput=true;
$users = $xml->createElement("users");
$xml->appendChild($users);

while($row= mysqli_fetch_array($result)){
	$user=$xml->createElement("user");
	$users->appendChild($user);

	$user_id=$xml->createElement("user_id",$row['user_id']);
	$user->appendChild($user_id);

	$fullname=$xml->createElement("fullname",$row['fullname']);
	$user->appendChild($fullname);

	$username=$xml->createElement("username",$row['username']);
	$user->appendChild($username);

	$email=$xml->createElement("email",$row['email']);
	$user->appendChild($email);
}
echo $xml->saveXML();
// $xml->save("reports.xml");
//$xml->load("dbxml.php");
?>
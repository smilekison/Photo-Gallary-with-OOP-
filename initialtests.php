<?php 	
	require_once 'header.php';
	include 'navigation.php';
?>

<h2>Test: Initialisation and Configuration</h2>
<?php 
	print  "Base URL =". $config['base_url'];
    print "<br />";
    print "Database Details";
    print "<pre>";
    print_r($db);
    print "</pre>";

?>
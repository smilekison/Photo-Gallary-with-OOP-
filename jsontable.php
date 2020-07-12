<!DOCTYPE html>
<html lang="">
<head>
	<meta charset = "utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width-device width, initial-scale-1">
	<title>AID</title>
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<script src="assets/js/jquery.min.js"></script>
</head>
<body>
	<?php include('navigation.php'); ?>
<div class="container">
	<div class="table-responsive">
		<h1 align="center" class="mt-5">JSON data in HTML Table using Jquery</h1><br>
		<table class="table table-bordered table-striped" id="user_table">
			<tr>
				<th>User ID</th>
				<th>Fullname</th>
				<th>Username</th>
				<th>Email</th>
			</tr>
		</table>
	</div>
</div>
<script>
	$(document).ready(function(){
		$.getJSON('userfile.json', function(data){
			var user_data ='';
			$.each(data, function(key, value){
				user_data +='<tr>';
				user_data += '<td>'+value.user_id+'</td>';
				user_data += '<td>'+value.fullname+'</td>';
				user_data += '<td>'+value.username+'</td>';
				user_data += '<td>'+value.email+'</td>';
				user_data +='</tr>';
			});
			$('#user_table').append(user_data);
		});
	});
</script>
<!-- Boostrap javascript -->
<script src="assets/js/toggler.js"></script>
</body>
</html>
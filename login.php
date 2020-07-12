<?php 
	include('header.php');
	include('navigation.php');

	if(isset($_SESSION['user']->role)){
        header('Location:profile.php');
      }

?>

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-4 offset-sm-4">
			<div class="card">
			  	<div class="card-header text-sm-center">
				    Login
			  	</div>
			  	<div class="card-body">
			  		<?php if(isset($_POST['login'])){
		  				echo $msg;
		  				}
			  		?>
				    <form method="POST" action="<?php htmlspecialchars('actions.php'); ?>">
				    	<fieldset class="form-group">
				    		<label for="username">Username:</label>
				    		<input type="text" name="username" class="form-control" id="username" placeholder="Please Enter Username or Email Address" required>
				    	</fieldset>
				    	<fieldset class="form-group">
				    		<label for="password">Password:</label>
				    		<input type="password" class="form-control" name="password" id="password" placeholder="Please Enter Password" required>
				    	</fieldset>
				    	<input type="submit" class="btn btn-primary float-sm-right" value="Login" name="login">
				    </form>
			  	</div>
			</div>
		</div>
	</div>
</div>
<?php include('footer.php'); ?>
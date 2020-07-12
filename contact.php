<?php 
	include('header.php');
	include('navigation.php');
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-6 offset-sm-3">
			<div class="card">
			  	<div class="card-header text-sm-center">
				     <h2>Get in Touch</h2>
			  	</div>
			  	<div class="card-body">
				    <form method="POST" action="<?php htmlspecialchars('actions.php'); ?>">
				    	<?php if(isset($_POST['sendMessage'])){	echo $msg; } ?>
				    	<fieldset class="form-group">
				    		<label for="name">Name:</label>
				    		<input type="text" name="name" value="<?php echo @$_POST['name'] ?>" class="form-control" id="name" placeholder="Please Enter Your Name" required>
				    	</fieldset>

				    	<fieldset class="form-group">
				    		<label for="email">Email:</label>
				    		<input type="email" class="form-control" name="email" value="<?php echo @$_POST['email'] ?>" id="email" placeholder="Please Enter Your Email" required>
				    	</fieldset>

				    	<fieldset class="form-group">
				    		<label for="subject">Subject:</label>
				    		<input type="text" class="form-control" name="subject" value="<?php echo @$_POST['subject'] ?>" id="subject" placeholder="Please Enter Subjectt" required>
				    	</fieldset>

				    	<fieldset class="form-group">
				    		<label for="message">Message:</label>
				    		<textarea class="form-control" id="message" name="message" cols="10" rows="6" placeholder="Enter Your Message" required></textarea>
				    	</fieldset>
				    	<input type="submit" class="btn btn-primary float-sm-right" value="Send" name="sendMessage">
				    </form>
			  	</div>
			</div>
		</div>
	</div>
</div>
<?php include('footer.php'); ?>
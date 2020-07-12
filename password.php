<?php 
	include 'header.php';
	include 'navigation.php';

	if(!isset($_SESSION['user']->user_id)){
		header('Location:login.php');
	}
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-6 offset-sm-3">
      <div class="card">
          <div class="card-header text-sm-center">
            Account Details
          </div>
          <div class="card-body">
            <?php if(isset($_POST['password'])){
              echo $msg;
              }
            ?>
            <form method="POST" action="<?php htmlspecialchars('actions.php'); ?>">
              <fieldset>  
              <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']->user_id; ?>">
                <div class="form-group has-feedback">
                  <label for="oldpassword"  class="col-md-12 control-label">Old Password</label>
                  <div class="col-md-12  inputGroupContainer">
                    <div class="input-group">
                      <input class="form-control" id="userPw" type="password" placeholder="Please Enter Your Old Password" name="oldpassword" required>
                    </div>
                  </div>
                </div>
                <div class="form-group has-feedback">
                      <label for="password"  class="col-md-12 control-label">
                              Password
                          </label>
                          <div class="col-md-12  inputGroupContainer">
                          <div class="input-group">
                          <input class="form-control" id="userPw" type="password" placeholder="New Password" name="password" required>
                          </div>
                       </div>
                  </div>
               
                  <div class="form-group has-feedback">
                    <label for="confirmPassword"  class="col-md-12 control-label">Confirm Password</label>
                    <div class="col-md-12  inputGroupContainer">
                      <div class="input-group">
                        <input class="form-control" id="userPw2" type="password" placeholder="Confirm password" name="cpassword" data-match="#confirmPassword" required/>
                      </div>
                    </div>
                  </div>
              </fieldset>
              <input type="submit" class="btn btn-primary float-sm-right" value="Update" name="changepassword">
            </form>
          </div>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>
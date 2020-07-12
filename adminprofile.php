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
            <?php if(isset($_POST['update'])){
              echo $msg;
              }
            ?>
            <form method="post"  action="<?php htmlspecialchars('actions.php'); ?>">
              <fieldset>  
              <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']->user_id; ?>">    

              <!-- Text Input -->
                <div class="form-group">
                  <label class="col-md-12 control-label">Username</label>
                  <div class="col-md-12  inputGroupContainer">
                    <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input value="<?php echo $_SESSION['user']->username; ?>"  class="form-control" type="text" readonly>
                    </div>
                  </div>
                </div>
                <!-- Text input-->      
                <div class="form-group">
                  <label class="col-md-12 control-label">FullName</label>
                  <div class="col-md-12  inputGroupContainer">
                    <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input  name="fullname" placeholder="Full Name" value="<?php echo $_SESSION['user']->fullname; ?>"  class="form-control" type="text">
                    </div>
                  </div>
                </div>

                  <!-- Text input-->
                <div class="form-group">
                  <label class="col-md-12 control-label">E-Mail</label>
                  <div class="col-md-12  inputGroupContainer">
                    <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                      <input name="email" placeholder="E-Mail Address" value="<?php echo $_SESSION['user']->email; ?>"   class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" type="email">
                    </div>
                  </div>
                </div>

                <div class="form-group has-feedback">
                      <label for="password"  class="col-md-12 control-label">
                              Password
                          </label>
                          <div class="col-md-12  inputGroupContainer">
                          <div class="input-group">
                            <input class="form-control" id="userPw" type="password" placeholder="password" name="password"required>
                          </div>
                       </div>
                  </div>
                </fieldset>
                <input type="submit" class="btn btn-primary float-sm-right" value="Update" name="update">
              </form>
          </div>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>
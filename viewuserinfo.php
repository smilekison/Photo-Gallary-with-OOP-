<?php 
  include('photosheader.php');
  include('navigation.php');

  if(isset($_SESSION['user_id'])){
    header('Location:profile.php');
  }

if(isset($_GET['view'])){
  $user = new User;
  $user_id = $_GET['user_id'];
  
  $myrow = $user->getUserById($user_id);
    // echo $row['title'];
  // var_dump($row);
foreach ($myrow as $row) {   ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-10 offset-sm-1">
      <div class="card">
          <div class="card-header text-sm-center">
            View Information
          </div>
          <div class="card-body">
            <fieldset>  
            <!-- Text Input -->
              <div class="form-group">
                <label class="col-md-12 control-label">Username</label>
                <div class="col-md-12  inputGroupContainer">
                  <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input value="<?php echo $row['username']; ?>"  class="form-control" type="text" readonly>
                  </div>
                </div>
              </div>
              <!-- Text input-->      
              <div class="form-group">
                <label class="col-md-12 control-label">FullName</label>
                <div class="col-md-12  inputGroupContainer">
                  <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input  name="fullname" placeholder="Full Name" value="<?php echo $row['fullname']; ?>"  class="form-control" type="text">
                  </div>
                </div>
              </div>

                <!-- Text input-->
              <div class="form-group">
                <label class="col-md-12 control-label">E-Mail</label>
                <div class="col-md-12  inputGroupContainer">
                  <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input name="email" placeholder="E-Mail Address" value="<?php echo $row['email']; ?>"   class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" type="email">
                  </div>
                </div>
              </div>
            </fieldset>
          </div>
          </div>
      </div>
    </div>
  </div>
</div>
<?php include('footer.php'); ?>
 <?php }
  }

?>
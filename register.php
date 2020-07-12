<?php
include('header.php'); 
include('navigation.php');
include('loginwithfb.php');
    if(isset($_SESSION['user']->role)){
      header('Location:profile.php');
    }
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-6 offset-sm-3">
      <div class="card">
          <div class="card-header text-sm-center">
            Sign Up
          </div>
          <div class="card-body">
            <?php if(isset($_POST['register'])){
              echo $msg;
              }
            ?>
            <?php echo $output; ?>
            <form method="post" action="<?php htmlspecialchars('actions.php'); ?>" onsubmit="return validate()" name="vform">
              <fieldset>      
                 <label class="col-md-12 float-sm-center">Fullname</label>
                  <div class="col-md-12">
                    <input name="fullname" id="fullname" placeholder="Fullname" value="<?php echo @$_POST['fullname'] ?>"  class="form-control" type="text" required>
                    <div id="fullname_error" class="val_error"></div>
                  </div>
                <!-- Text Input -->
                <label class="col-md-12 float-sm-center">Username</label>
                  <div class="col-md-12">
                    <input name="username" id="username" placeholder="Username" value="<?php echo @$_POST['username'] ?>"  class="form-control" type="text" required>
                    <span id="availability"></span>
                    <div id="username_error" class="val_error"></div>
                  </div>
                  <!-- Text input-->
                  <label class="col-md-12 float-sm-center">Email</label>
                    <div class="col-md-12">
                        <input name="email" id="email" placeholder="Email" value="<?php echo @$_POST['email'] ?>"  class="form-control" type="email" required>
                        <span id="availabilitya"></span>
                        <div id="email_error" class="val_error"></div>
                    </div>
                
                  <label class="col-md-12 float-sm-center">Password</label>
                    <div class="col-md-12">
                        <input name="password" id="password" placeholder="Password" class="form-control" type="password" required>
                    </div>

                  <label class="col-md-12 float-sm-center">Confirm Password</label>
                    <div class="col-md-12">
                      <input name="password_confirmation" id="cpassword" placeholder="Confirm Password" class="form-control" type="password" required>
                      <div id="password_error" class="val_error"></div>
                    </div>
                 
                  <div class="col-md-12">
                    <img src="capt.php" alt="captch image" class="mt-3"><br><input type="text" name="captcha" placeholder="Type the above captcha" class="mt-3">
                  </div>
                </fieldset>
                <input type="submit" class="btn btn-primary float-sm-right" value="Register" name="register">
              </form>
          </div>
      </div>
    </div>
  </div>
</div>

<script>
  //Getting all input text objects from the form
  var fullname = document.forms['vform']['fullname'];
  var password = document.forms['vform']['password'];
  var password_confirmation = document.forms['vform']['password_confirmation'];


  //Getting all error display in objects
  var fullname_error = document.getElementById('fullname_error');
  var username_error = document.getElementById('username_error');
  var email_error = document.getElementById('email_error');
  var password_error = document.getElementById('password_error');

  //Setting all event listeners
  fullname.addEventListener("blur", fullnameVerify, true);
  username.addEventListener("blur", usernameVerify, true);
  email.addEventListener("blur", emailVerify, true);
  password.addEventListener("blur", passwordVerify, true);


  //validate function
  function validate(){
    //validating username empty
    if(fullname.value == ""){
      fullname.style.border = "1px solid red";
      fullname_error.textContent = "Fullname is required";
      fullname.focus();
      return false;
    }

    if(username.value == ""){
      username.style.border = "1px solid red";
      username_error.textContent = "Username is required";
      username.focus();
      return false;
    }

    //validating email empty
    if(email.value == ""){
      email.style.border = "1px solid red";
      email_error.textContent = "Email is required";
      email.focus();
      return false;
    }

    //validating password empty
    if(password.value == ""){
      password.style.border = "1px solid red";
      password_error.textContent = "Password is required";
      password.focus();
      return false;
    }

    //checking password and confirm password matches
      if(password.value != password_confirmation.value){
        password.style.border = "1px solid red";
        password_confirmation.style.border = "1px solid red";
        password_error.textContent = "The two password do not match";
        return false;
      }
  }

  //Event handler functions
  function usernameVerify(){
    if(username.value != ""){
      username.style.border = "1px solid #5E6E66";
      username_error.innerHTMl = "";
      return true;
    }
  }

  function emailVerify(){
    if(email.value != ""){
      email.style.border = "1px solid #5E6E66";
      email_error.innerHTMl = "";
      return true;
    }
  }

  function passwordVerify(){
    if(password.value != ""){
      password.style.border = "1px solid #5E6E66";
      password_error.innerHTMl = "";
      return true;
    }
  }
</script>

<script>
  $(document).ready(function(){
    $('#username').blur(function(){
      var username = $(this).val();
      $.ajax({
        url:'check.php',
        method:"POST",
        data:{username:username},
        success:function(data){
          $('#availability').html(data);
        }
      })
    });
  });


  $(document).ready(function(){
    $('#email').blur(function(){
      var email = $(this).val();
      $.ajax({
        url:'check.php',
        method:"POST",
        data:{email:email},
        success:function(dataa){
          $('#availabilitya').html(dataa);
        }
      })
    });
  });
</script>

<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback" async defer></script>

<script>
var onloadCallback = function() {
    grecaptcha.execute();
};

function setResponse(response) { 
    document.getElementById('captcha-response').value = response; 
}
</script>

<?php include('footer.php'); ?>
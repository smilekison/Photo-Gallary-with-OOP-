 <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="index.php">Gallery</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <?php if(!isset($_SESSION['user']->role)){ ?>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="initialtests.php">Test</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="OOTest.php">OOTest</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="reports.xml">XML STYLE</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="jsontable.php">JSON STYLE</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="dbxml.php">XML</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="json.php">JSON</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <li class="nav-item" id="customsearch">
           <script>
              (function() {
                var cx = '005107309789717846205:jiij_cfqycu';
                var gcse = document.createElement('script');
                gcse.type = 'text/javascript';
                gcse.async = true;
                gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(gcse, s);
              })();
            </script>
            <gcse:search></gcse:search>      
        </li>
    <?php }elseif($_SESSION['user']->role == 'admin'){ ?>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="profile.php">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="listusers.php">View Users</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="Photos" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Photos</a>
        <div class="dropdown-menu" aria-labelledby="Photos">
          <a class="dropdown-item" href="addphotos.php">Add Photos</a>
          <a class="dropdown-item" href="listphotos.php">View Photos</a>
          <a class="dropdown-item" href="removedphotos.php">Removed Photos</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="users" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" style="font-size:26px;"></i></a>
        <div class="dropdown-menu" aria-labelledby="users">
          <a class="dropdown-item" href="adminprofile.php">Profile</a>
          <a class="dropdown-item" href="password.php">Password</a>
          <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
      </li>
    </ul>

    <?php }else{ ?>

    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="profile.php">Dashboard</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" style="font-size:26px;"></i></a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="profile.php">Profile</a>
          <a class="dropdown-item" href="password.php">Password</a>
          <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
      </li>
    </ul>

    <?php } ?>
    
  </div>
</nav>
<?php 
	include 'header.php';
	include 'navigation.php';
//  include 'pdfgenerator.php';

	if(!isset($_SESSION['user']->user_id)){
		header('Location:login.php');
	}
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-10 offset-sm-1">
      <div class="card">
          <div class="card-header text-sm-center">
            All Users
          </div>
           <div class="card-body">
            <table class="table table-striped">
              <form method="post" action="pdfgenerator.php">  
                  <input type="submit" name="generate_pdf" class="btn btn-success" value="Generate PDF" />  
              </form> 
              <thead>
              <tr>
                <th>#</th>
                <th>Fullname</th>
                <th>Username</th>
                <th>Email</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <?php  
            $adm = new Admin;
            $myrow = $adm->getUsers();
            foreach ($myrow as $row) { ?>
              <tbody>
              <tr>
                <td><?php echo $row['user_id']; ?></td>
                <td><?php echo $row['fullname']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><a href="viewuserinfo.php?view=1&user_id=<?php echo $row['user_id']; ?>" class="btn btn-info">View</a></td>
                <td><a href="" class="btn btn-danger">Remove</a></td>
              </tr>
            </tbody>
            <?php } ?>
          </table>
          </div>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>


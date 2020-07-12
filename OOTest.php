<?php 
	include 'header.php';
	include 'navigation.php';
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-10 offset-sm-1">
      <div class="card">
          <div class="card-header text-sm-center">
            OOTest.php file
          </div>
           <div class="card-body">
            <table class="table table-striped">
              <thead>
              <tr>
                <th>#</th>
                <th>Fullname</th>
                <th>Username</th>
                <th>Email</th>
              </tr>
            </thead>

            
            <?php  
            //Creating an object for the user
            $adm = new user;

            //calling the getUsers method from the object to get the list of users.
            $myrow = $adm->getUsers();

            //creating the loop to show all the users present in the database.
            foreach ($myrow as $row) { ?>
              <tbody>
              <tr>
                <td><?php echo $row['user_id']; ?></td>
                <td><?php echo $row['fullname']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['email']; ?></td>
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


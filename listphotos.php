<?php 
	include 'header.php';
	include 'navigation.php';

	if(!isset($_SESSION['user']->user_id)){
		header('Location:login.php');
	}
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-10 offset-sm-1">
      <div class="card">
          <div class="card-header text-sm-center">
            All Photos
          </div>
           <div class="card-body">
            <table class="table table-striped">
              <thead>
              <tr>
                <th>#</th>
                <th>Title</th>
                <th>Subheading</th>
                <th>Author</th>
                <th>Publish Date</th>
                <th>Published</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <?php  
            $gallery = new Gallery;
            $myrow = $gallery->getActivePhotos();
            foreach ($myrow as $row) { ?>
              <tbody>
              <tr>
                <td><?php echo $row['photo_id']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['subheading']; ?></td>
                <td><?php echo $row['author']; ?></td>
                <td><?php echo $row['publishdate']; ?></td>
                <td><?php echo $row['publish']; ?></td>
                <td><a href="viewinfo.php?update=1&photo_id=<?php echo $row['photo_id']; ?>" class="btn btn-info">View</a></td>
                <td><a href="photosaction.php?delete=1&photo_id=<?php echo $row['photo_id']; ?>" class="btn btn-danger">Remove</a></td>
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


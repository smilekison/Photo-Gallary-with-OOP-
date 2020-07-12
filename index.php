<?php 
	include('header.php');
	include('navigation.php');
?>
<div id="demo" class="carousel slide" data-ride="carousel">
  <?php include('slider.php'); ?>
</div>
<div class="container-fluid">
	<div class="row">
    <?php  
      $gallery = new Gallery;
      $myrow = $gallery->getActivePhotos();
      foreach ($myrow as $row) { 
    ?>
		<div class="col-sm-3">
      <div class="card mt-3">
        <div class="card-header text-sm-center">
            <?php echo $row['title']; ?>
        </div>
        <div class="card-body text-sm-center">
          <img src="assets/images/<?php echo $row['image']; ?>" alt="images" style="width:100%; height: 100%;">
          <?php echo $row['subheading']; ?>
        </div>
        <div class="card-footer text-sm-center">
          <a href="viewphoto.php?view=1&photo_id=<?php echo $row['photo_id']; ?>" class="btn btn-info">View</a>
        </div>
      </div>
    </div>
    <?php } ?>
	</div>
</div>
<?php include('footer.php'); ?>
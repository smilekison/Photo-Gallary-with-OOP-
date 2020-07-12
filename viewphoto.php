<?php 
	include('header.php');
	include('navigation.php');
?>
<?php 
if(isset($_GET['view'])){
  $gallery = new Gallery;
  $photo_id = $_GET['photo_id'];
  
  $myrow = $gallery->getPhotosById($photo_id);
    // echo $row['title'];
  // var_dump($row);
foreach ($myrow as $row) {   ?>
<div class="container-fluid">
	<div class="card">
	<div class="card-header">
      <h1> <?php echo $row['title']; ?><br></h1>
    </div>
    <div class="card-body">
        <img src="assets/images/<?php echo $row['image']; ?>" class="responsive" width="600" height="400"><br>
    </div>
    <div class="card-body">
      <h2> <?php echo $row['subheading']; ?><br></h2>
    </div>
    <div class="card-footer">
        <?php echo $row['content']; ?><br>
    </div>
</div>

 <?php }
 }
  ?>



<?php include ('footer.php'); ?>
<?php 
  include('photosheader.php');
  include('navigation.php');

  if(isset($_SESSION['user_id'])){
    header('Location:profile.php');
  }

if(isset($_GET['update'])){
  $gallery = new Gallery;
  $photo_id = $_GET['photo_id'];
  
  $myrow = $gallery->getPhotosById($photo_id);
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
            <?php if(isset($_POST['update'])){
              echo $msg;
              }
            ?>
            <form method="POST" enctype="multipart/form-data" action="<?php htmlspecialchars('photosactions.php'); ?>">
              <input type="text" name="news_id" value="<?php echo $row['photo_id']; ?>">
              <fieldset class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" class="form-control" value="<?php echo $row['title']; ?>" id="title" placeholder="Please Enter Title" required>
              </fieldset>

              <fieldset class="form-group">
                <label for="subheading">Sub Heading:</label>
                <input type="text" class="form-control" name="subheading" value="<?php echo $row['subheading']; ?>" id="subheading" placeholder="Please Sub Heading" required>
              </fieldset>

              <label for="content">Content:</label>
              <textarea class="form-control" rows="10" cols="10" name="content" id="editor" placeholder="Please Enter the content for News"><?php echo $row['content']; ?></textarea>
              <fieldset class="form-group">
                <label for="image">Upload Image:</label>
                <input type="file" name="image" class="form-control" value="Upload" id="image" placeholder="Select Your Image" required />
              </fieldset>
              <fieldset class="form-group">
                <label for="author">Author:</label>
                <input type="text" name="author" class="form-control" value="<?php echo $row['author']; ?>" id="author" placeholder="Please Enter Author Name" required>
              </fieldset>

              <fieldset class="form-group">
                <label for="date">Date:</label>
                <input type="date" class="form-control" name="publishdate" value="<?php echo $row['publishdate']; ?>" id="date" placeholder="Please Enter Date" required>
              </fieldset>

              <fieldset class="form-group">
                <label for="date"><strong>Publish Now: </strong></label>
                <input type="checkbox" name="publish" id="publish" value="1" style="padding-left: 21px;" <?php echo ($row['publish']==1 ? 'checked' : '');?>>
              </fieldset>

              <input type="submit" class="btn btn-primary float-sm-right" value="Update" name="update">
            </form>
          </div>
      </div>
    </div>
  </div>
</div>

 <script>
  ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .catch( error => {
    console.error( error );
  });
</script>
<?php include('footer.php'); ?>
 <?php }
  }else{
    echo "Not clicked";
  }

?>
<?php 
  include('photosheader.php');
  include('navigation.php');

  if(isset($_SESSION['user_id'])){
    header('Location:profile.php');
  }
?>

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-10 offset-sm-1">
      <div class="card">
          <div class="card-header text-sm-center">
            Add New Photos
          </div>
          <div class="card-body">
            <?php if(isset($_POST['addphotos'])){
              echo $msg;
              }
            ?>
            <form method="POST" enctype="multipart/form-data" action="<?php htmlspecialchars('photosactions.php'); ?>">
              <fieldset class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Please Enter Title" required>
              </fieldset>
              <fieldset class="form-group">
                <label for="subheading">Sub Heading:</label>
                <input type="text" class="form-control" name="subheading" id="subheading" placeholder="Please Sub Heading" required>
              </fieldset>
              <label for="content">Content:</label>
              <textarea class="form-control" rows="10" cols="10" name="content" id="editor" placeholder="Please Enter the content for Photos"></textarea>
              <fieldset class="form-group">
                <label for="image">Upload Image:</label>
                <input type="file" name="image" class="form-control" value="Upload" id="image" placeholder="Select Your Image" required />
              </fieldset>
              <fieldset class="form-group">
                <label for="author">Author:</label>
                <input type="text" name="author" class="form-control" id="author" placeholder="Please Enter Author Name" required>
              </fieldset>
              <fieldset class="form-group">
                <label for="date">Date:</label>
                <input type="date" class="form-control" name="publishdate" id="date" placeholder="Please Enter Date" required>
              </fieldset>
              <fieldset class="form-group">
                <label for="date"><strong>Publish Now: </strong></label>
                <input type="checkbox" name="publish" id="publish" value="1" style="padding-left: 21px;" checked>
              </fieldset>
              <input type="submit" class="btn btn-primary float-sm-right" value="Add" name="addphotos">
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
<?php
include('authentication.php');
include('includes/header.php');
?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card-header">
        <h4>Add Category</h4>
      </div>
      <div class="message">
        <?php include('message.php');?>
      </div>
      <div class="card">
      <div class="card-body">
        <form action="admin.php" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-6">
              <label for="">Name</label>
              <input type="text" name="name" placeholder="Enter Category Name" class="form-control">
            </div>
            <div class="col-md-6">
              <label for="">Slug</label>
              <input type="text" name="slug" placeholder="Enter slug" class="form-control">
            </div>
            <div class="col-md-12">
              <label for="">Description</label>
              <textarea rows="3" name="description" placeholder="Enter Description" class="form-control"></textarea>
            </div>
            <div class="col-md-12">
              <label for="">Upload Image</label>
              <input type="file" name="image" class="form-control">
            </div>
            <!-- <div class="col-md-12">
              <label for="">Meta Title</label>
              <input type="text" name="meta_title" placeholder="Enter meta title" class="form-control">
            </div>
            <div class="col-md-12">
              <label for="">Meta Description</label>
              <textarea rows="3" name="meta_description" placeholder="Enter meta description" class="form-control"></textarea>
            </div> -->
            <div class="col-md-12">
              <label for="">Meta Keywords</label>
              <textarea rows="3" name="meta_keywords" placeholder="Enter meta keywords" class="form-control"></textarea>
            </div>
            <!-- <div class="col-md-6">
              <label for="">Status</label>
              <input type="checkbox" name="status">
            </div>
            <div class="col-md-6">
              <label for="">Popular</label>
              <input type="checkbox" name="popular">
            </div> -->
            <div class="col-md-12 pt-2">
              <button type="submit" class="btn btn-danger" name="add_category">Add Category</button>
            </div>
          </div>
        </form>               
          </div>
      </div>
    
        </div>
        </div>
<?php include('includes/footer.php'); ?>
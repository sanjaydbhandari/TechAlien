<?php
include('authentication.php');
include('includes/header.php');
// include('functions.php');
?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
    
    <?php
      if (isset($_GET['id'])) {
        $id = $_GET['id'];
        // $select = "SELECT * FROM categories WHERE id='$id' ";
        // $query = mysqli_query($conn, $select);

        $category=fetchId('categories',$id);

        // if (mysqli_num_rows($query) > 0) {
        if (mysqli_num_rows($category) > 0) {
        // foreach ($query as $row) {
        // $row=mysqli_fetch_array($query);
        $row=mysqli_fetch_array($category);
      ?>
      <div class="card">
      <form action="admin.php" method="POST" enctype="multipart/form-data">
        <div class="card-header">
          <h4>Edit Category <a href="category.php" class="btn btn-danger float-end btn-sm">Back</a></h4>
          
        </div>
        <div class="message">
          <?php include('message.php'); ?>
        </div>
        <div class="card-body">
          <form action="admin.php" method="post" enctype="multipart/form-data">
            <div class="row ">
              <input type="hidden" name="category_id" value="<?php echo $row['id']; ?>">
              <div class="col-md-6">
                <label for="">Name</label>
                <input type="text" name="name" value="<?php echo $row['name']; ?>" placeholder="Enter Category Name" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label for="">Slug</label>
                <input type="text" name="slug" value="<?php echo $row['slug']; ?>" placeholder="Enter slug" class="form-control" required>
              </div>
              <div class="col-md-12">
                <label for="">Description</label>
                <textarea rows="3" name="description" placeholder="Enter Description" class="form-control" required><?php echo $row['description']; ?></textarea>
              </div>
              <div class="col-md-10">
                <label for="">Upload Image</label>
                <input type="file" name="image" class="form-control">
            </div>
                <div class="col-md-2">
                <label for="">Current Image</label><br>
                <input type="hidden" name="previous_image" value="<?=$row['image']; ?>">
                <img src="uploads/<?php echo $row['image']; ?>" height="50px" width="50px" alt="<?=$row['name'];?> Category">
              </div>
              <!-- <div class="col-md-12">
                <label for="">Meta Title</label>
                <input type="text" name="meta_title" value="<?php echo $row['meta_title']; ?>" placeholder="Enter meta title" class="form-control">
              </div>
              <div class="col-md-12">
                <label for="">Meta Description</label>
                <textarea rows="3" name="meta_description" placeholder="Enter meta description" class="form-control"><?php echo $row['meta_description']; ?> </textarea>
              </div> -->
              <div class="col-md-12">
                <label for="">Meta Keywords</label>
                <textarea rows="3" name="meta_keywords" placeholder="Enter meta keywords" class="form-control" required><?php echo $row['meta_keywords']; ?></textarea>
              </div>
              <!-- <div class="col-md-6">
                <label for="">Status</label>
                <input type="checkbox" name="status" <?= $row['status'] ?'checked':'' ?>>
              </div>
              <div class="col-md-6">
                <label for="">Popular</label>
                <input type="checkbox" name="popular" <?= $row['popular'] ?'checked':'' ?>>
              </div> -->
            </div>
              
              <div class="col-md-12 pt-2">
                <button type="submit" class="btn btn-primary" name="update_category">Update Category</button>
              </div>
              
            </form>
    </div>
    </div>
        <!-- </div> -->
      <?php
                  }
                  else {
                    echo "Category Not Found";
                  }
                } else {
                  echo "No Record Found!";
                }
      ?>
  
  </div>
</div>
<?php include('includes/footer.php'); ?>

<?php
include('authentication.php');
include('includes/header.php');
// include('functions.php');
?>

<div class="container">
<div class="message"> 
        <?php include('message.php');?>
      </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
      <div class="card-header">
        <h4>Add Product</h4>
      </div>
      <div class="card-body">
        <form action="admin.php" method="post" enctype="multipart/form-data">
          <div class="row">
          <div class="col-md-12">
            <label for="" class="mt-2">Select Category</label>
            <?php
            $query_run=fetch('categories');
            if (mysqli_num_rows($query_run) > 0) {
            ?>
              <select name="category_id" class="form-control  p-2" >
              <option  value="" selected>Select Category</option>  
                <?php foreach ($query_run as $row) { ?>
                  <option value="<?= $row['id']; ?>"><?= $row['name']; ?></option>
                <?php } ?>
              </select>
            <?php
            }
            else
            {
              echo "No category";
            }
            ?>
        </div>
            <div class="col-md-6">
              <label for="" class="mt-2">Name</label>
              <input type="text" name="name" placeholder="Enter Product Name" class="form-control ">
            </div>
            <div class="col-md-6">
              <label for="" class="mt-2">Slug</label>
              <input type="text" name="slug" placeholder="Enter slug" class="form-control ">
            </div>
            <div class="col-md-6">
              <label for="" class="mt-2">Small Description</label>
              <textarea rows="3" name="small_description" placeholder="Enter Small Description" class="form-control "></textarea>
            </div>
            <div class="col-md-6">
              <label for="" class="mt-2">Description</label>
              <textarea rows="3" name="description" placeholder="Enter Description" class="form-control "></textarea>
            </div>
            <div class="col-md-4">
              <label for="" class="mt-2">Original Price</label>
              <input type="text" name="original_price" placeholder="Enter Original Price" class="form-control ">
            </div>
            <div class="col-md-4">
              <label for="" class="mt-2">Selling Price</label>
              <input type="text" name="selling_price" placeholder="Enter Selling Price" class="form-control ">
            </div>
            <div class="col-md-4">
              <label for="" class="mt-2">Quantity</label>
              <input type="text" name="quantity" placeholder="Enter Quantity" class="form-control ">
            </div>
            <div class="col-md-12">
              <label for="" class="mt-2">Upload Image</label>
              <input type="file" name="image" class="form-control ">
            </div>
            <!-- <div class="col-md-12">
              <label for="" class="mt-2">Meta Title</label>
              <input type="text" name="meta_title" placeholder="Enter meta title" class="form-control ">
            </div>
            <div class="col-md-12">
              <label for="" class="mt-2">Meta Description</label>
              <textarea rows="3" name="meta_description" placeholder="Enter meta description" class="form-control "></textarea>
            </div> -->
            <div class="col-md-12">
              <label for="" class="mt-2">Meta Keywords</label>
              <textarea rows="3" name="meta_keywords" placeholder="Enter meta keywords" class="form-control "></textarea>
            </div>
            <div class="col-md-12  mt-2">
              <button type="submit" class="btn btn-danger" name="add_product">Add Product</button>
            </div>
          </div>
        </form>
          </div>
      </div>
        </div>
        </div>
        </div>
<?php include('includes/footer.php'); ?>
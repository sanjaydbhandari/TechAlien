
<?php
include('authentication.php');
include('includes/header.php');
// include('functions.php');
?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
    <div class="card">
    <?php
      if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $product=fetchId('products',$id);

        // if (mysqli_num_rows($query) > 0) {
        if (mysqli_num_rows($product) > 0) {
        // foreach ($query as $row) {
        // $row=mysqli_fetch_array($query);
        $row=mysqli_fetch_array($product);
      ?>
      <div class="card-header">
        <h4>Edit Product</h4>
      </div>
      <div class="message">
        <?php include('message.php');?>
      </div>
      <div class="card-body">
        <form action="admin.php" method="post" enctype="multipart/form-data">
          <div class="row">
          <div class="col-md-12">
            <label for="" class="mt-2">Select Category</label>
            <?php
            $categories=fetch('categories');
            if (mysqli_num_rows($categories) > 0) {
            ?>
              <select name="category_id" class="form-control  p-2">
              <!-- <option  value="" selected>Select Category</option> -->
                <?php foreach ($categories as $item) { ?>
                  <option value="<?= $item['id']; ?>" <?= $row['category_id']==$item['id']?'selected':''?>><?=$item['name']?></option>
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
        <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
            <div class="col-md-6">
              <label for="" class="mt-2">Name</label>
              <input type="text" name="name" value="<?php echo $row['name']; ?>" placeholder="Enter Product Name" class="form-control ">
            </div>
            <div class="col-md-6">
              <label for="" class="mt-2">Slug</label>
              <input type="text" name="slug" value="<?php echo $row['slug']; ?>" placeholder="Enter slug" class="form-control ">
            </div>
            <div class="col-md-6">
              <label for="" class="mt-2">Small Description</label>
              <textarea rows="3" name="small_description" placeholder="Enter Small Description" class="form-control "><?php echo $row['small_description']; ?></textarea>
            </div>
            <div class="col-md-6">
              <label for="" class="mt-2">Description</label>
              <textarea rows="3" name="description" placeholder="Enter Description" class="form-control "><?php echo $row['description']; ?></textarea>
            </div>
            <div class="col-md-4">
              <label for="" class="mt-2">Original Price</label>
              <input type="text" name="original_price" value="<?php echo $row['original_price']; ?>" placeholder="Enter Original Price" class="form-control ">
            </div>
            <div class="col-md-4">
              <label for="" class="mt-2">Selling Price</label>
              <input type="text" name="selling_price" value="<?php echo $row['selling_price']; ?>" placeholder="Enter Selling Price" class="form-control ">
            </div>
            <div class="col-md-4">
              <label for="" class="mt-2">Quantity</label>
              <input type="text" name="quantity" value="<?php echo $row['quantity']; ?>" placeholder="Enter Quantity" class="form-control ">
            </div>
            <div class="col-md-10">
              <label for="" class="mt-2">Upload Image</label>
              <input type="file" name="image" class="form-control ">
            </div>
            <div class="col-md-2">
                <label for="">Current Image</label><br>
                <input type="hidden" name="previous_image" value="<?= $row['image']; ?>">
                <img src="uploads/products/<?php echo $row['image']; ?>" height="50px" width="50px" alt="Product Image">
              </div>
            <!-- <div class="col-md-12">
              <label for="" class="mt-2">Meta Title</label>
              <input type="text" name="meta_title" value="<?php echo $row['meta_title']; ?>" placeholder="Enter meta title" class="form-control ">
            </div>
            <div class="col-md-12">
              <label for="" class="mt-2">Meta Description</label>
              <textarea rows="3" name="meta_description" placeholder="Enter meta description" class="form-control "><?php echo $row['meta_description']; ?></textarea>
            </div> -->
            <div class="col-md-12">
              <label for="" class="mt-2">Meta Keywords</label>
              <textarea rows="3" name="meta_keywords" placeholder="Enter meta keywords" class="form-control "><?php echo $row['meta_keywords']; ?></textarea>
            </div>
            <div class="col-md-12  mt-2">
              <button type="submit" class="btn btn-primary" name="update_product">Update Product</button>
            </div>
          </div>
        </form>
          </div>
          <?php
                  }
                  else {
                    echo "Product Not Found";
                  }
                } else {
                  echo "No Record Found!";
                }
                ?>
      </div>
        </div>
        </div>
<?php include('includes/footer.php'); ?>
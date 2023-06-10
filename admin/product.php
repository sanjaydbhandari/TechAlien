<?php
include('authentication.php');
include('includes/header.php');
include('../config.php');
// include('functions.php');
?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card-header">
        <h4>Products</h4>
      </div>
      <div class="message">
        <?php include('message.php'); ?>
      </div>
      <div class="card-body">



        <table id="example1" class="table border table-bordered table-striped">
          <thead>
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Image</th>
              <th>quantity</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php
              // $select = "SELECT * FROM categories";
              // $query = mysqli_query($conn, $select);
              $product = fetch('products');

              // if (mysqli_num_rows($query) > 0) {
              if (mysqli_num_rows($product) > 0) {
                // foreach ($query as $row) {
                foreach ($product as $row) {
              ?>
            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['name']; ?></td>
              <!-- <td align="center"><input type="checkbox" name="trending" <?php echo ($row['trending'] == "1") ? 'checked' : ""; ?>></td>
                    <td align="center"><input type="checkbox" name="status" <?php echo $row['status'] == "1" ? "checked" : ""; ?>></td> -->
              <td>
                <img src="uploads/products/<?= $row['image'] ?>" height="50px" width="50px" alt="<?= $row['name'] ?>">
              </td>
              <td><?php echo $row['quantity']; ?></td>
              <td>
                <a href="edit_product.php?id=<?= $row['id']; ?>" class="btn btn-success">Edit</a>
              </td>

              <td>
                <form action="admin.php" method="POST"> 

                <!-- Delete Modal -->
              <div class="modal fade" id="productDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            Are you sure you want to delete this Product?</p>
                          </div>
                          <div class="modal-footer">
                            <form action="admin.php" method="POST">
                              <input type="hidden" name="product_id" class="product_id">
                              <!-- <input type="hidden" name="category_id" value="<?php echo isset($_POST['category_id']) ?>"> -->
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" name="delete_product" class="btn btn-danger">Delete</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Delete Modal end-->

                        <!-- <input type="text" name="product_id" value="<?php echo $row['id'] ?>">  -->
                        <button type="button" value="<?php echo $row['id'] ?>" class="btn btn-danger delete_product">Delete</button>
                </form>
              </td>
            </tr>
        <?php
                }
              } else {
                echo "NO Record Found";
              }
        ?>
          </tbody>
        </table>



      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
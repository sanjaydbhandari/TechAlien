
<?php
include('authentication.php');
include('includes/header.php');
include('../config.php');
// include('functions.php');
?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" >
  Launch demo modal
</button>




<!-- Delete Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this Item
      </div>
      <div class="modal-footer">
      <form action="admin.php" method="POST">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="delete_category" class="btn btn-danger">Delete</button>
      </form>
      </div>
    </div>
  </div>
  </div>
</div>

<!-- Delete Modal end-->

<?php include('includes/footer.php');?>










<!-- Delete Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Are you sure you want to delete <?=$row['name'];?> 
                        </div>
                        <div class="modal-footer">
                          <form action="admin.php" method="POST">
                            <input type="hidden" name="category_id" value="<?php echo $row['id'] ?>">
                            <!-- <input type="hidden" name="category_id" value="<?php echo isset($_POST['category_id']) ?>"> -->
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo $row['id'] ?>Close</button>
                            <button type="submit" name="delete_category" class="btn btn-danger">Delete</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Delete Modal end-->


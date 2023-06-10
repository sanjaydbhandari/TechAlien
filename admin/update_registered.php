<?php
include('functions.php');
//  include('authenticate.php');
include('includes/header.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <section class="content">

    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title text-bold">Update Registered Users <a href="admins.php" class="btn btn-sm btn-danger float-end">Back</a></h3>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <form action="admin.php" method="POST">
                    <div class="modal-body">
                      <?php
                      if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $select = "SELECT * FROM users WHERE id='$id' LIMIT 1";
                        $query = mysqli_query($conn, $select);

                        if (mysqli_num_rows($query) > 0) {
                          foreach ($query as $row) {
                      ?>
                            <!-- <div class="row"> -->
                            <input type="hidden" value="<?php echo $row['id']; ?>" name="id" class="form-control">
                              <div class="form-group">
                                <label for="">Full Name</label>
                                <input type="text" value="<?php echo $row['fullname']; ?>" name="fullname" class="form-control">
                              </div>
                              <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" value="<?php echo $row['email']; ?>" name="email" class="form-control">
                              </div>
                              <div class="form-group">
                                <label for="">Phone Number</label>
                                <input type="text" value="<?php echo $row['phone']; ?>" name="phone" class="form-control">
                              </div>
                              <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" value="<?php echo $row['password']; ?>" name="password" class="form-control">
                              </div>
                              <div class="form-group">
                                <label for="">Give Role</label>
                                <select name="role" class="form-control" required>
                                  <option value="0" <?=$row['role']==0?'selected':''?>>User</option>
                                  <option value="1" <?=$row['role']==1?'selected':''?>>Admin</option>
                                </select>
                              </div>
                              <!-- </div> -->
                        <?php
                          }
                        } else {
                          echo "No Record Found!";
                        }
                      }
                        ?>

                        <!-- </div> -->
                            </div>
                            <div class="col-md-12">
                            <div class="form-group">
                            <!-- <div class="modal-footer"> -->
                              <button type="submit" name="updateUser" class="btn btn-success float-end mt-4">Update</button>
                            </div>
                            </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>



</div>
<?php include('includes/footer.php');?>
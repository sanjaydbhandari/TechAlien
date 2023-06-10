<?php
include('functions.php');
include('includes/header.php');
?>

<div class="container">
  <div class="message">
    <?php include('message.php'); ?>
  </div>
  <div class="">
    <div class="row">
      <div class="col-md-12">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title text-bold">ADMINS<a href="" data-bs-toggle="modal" data-bs-target="#AddUserModal" class="btn btn-success float-end">Add Admin</a></h3>

          </div>
          <?php
          include('message.php');
          ?>
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Full Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Role</th>
                  <th>Action</th>
                  <th>created at</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $select = "SELECT * FROM users  ";
                $query = mysqli_query($conn, $select);
                if (mysqli_num_rows($query)) {
                  foreach ($query as $row) {
                ?>
                    <tr>
                      <td><?php echo $row['id']; ?></td>
                      <td><?php echo $row['fullname']; ?></td>
                      <td><?php echo $row['email']; ?></td>
                      <td><?php echo $row['phone']; ?></td>
                      <td>
                        <?php
                        if ($row['role'] == "0") {
                          echo "User";
                        } else if ($row['role'] == "1") {
                          echo "Admin";
                        } else {
                          echo "Invalid User";
                        }
                        ?>
                      </td>
                      <td>
                        <?php if ($row['role'] == 1) {
                        ?>

                          <a href="update_registered.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                          <button type="button" value="<?php echo $row['id'] ?>" class="btn btn-danger btn-sm delete_admin">Delete</button>
                        <?php
                        }
                        ?>
                          <!-- Delete Modal -->
                          <div class="modal fade" id="adminDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    Are you sure you want to delete Admin?
                                  </div>
                                  <div class="modal-footer">
                                    <form action="admin.php" method="POST">
                                      <input type="hidden" name="admin_id" class="admin_id" value="">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      <button type="submit" name="delete_admin" class="btn btn-danger">Delete</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- Delete Modal end-->



                          <!-- <input type="hidden" name="category_id" value="<?php echo $row['id'] ?>">
                  <button type="submit" name="delete_category" class="btn btn-danger">Delete</button> -->
                          <!-- <button type="button" name="delete_category" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button> -->




                          <!-- <button type="button" value="<?php echo $row['id'] ?>" class="btn btn-danger btn-sm delete_admin">Delete</button> -->

                      </td>
                      <!-- <td>
                          <?php echo $row['role']; ?>
                        </td> -->
                      <td><?php echo $row['created_at']; ?></td>
                    </tr>
                  <?php
                  }
                } else {
                  ?>
                  <tr>
                    <td>No Record Found</td>
                  </tr>
                <?php
                }
                ?>

                <!--admin Modal -->

                <div class="modal fade" id="AddUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>

                      <form action="admin.php" method="POST">
                        <div class="modal-body">
                          <div class="row">
                            <div class="form-group">
                              <label for="">Full Name</label>
                              <input type="text" name="fullname" class="form-control">
                            </div>
                            <div class="form-group">
                              <label for="">Email</label>
                              <span class="email-error"></span>
                              <input type="email" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                              <label for="">Phone Number</label>
                              <input type="text" name="phone" class="form-control">
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="">Confirm Password</label>
                                <input type="password" name="cpassword" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="">Role</label>
                                <select name="role" id="" class="form-control">
                                  <option value="1">Admin</option>
                                  <option value="0">User</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" name="add_admin" class="btn btn-primary">Save</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- modal end  -->

                <!-- Delete Modal -->
                <!-- <div class="modal fade" id="adminDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Are you sure you want to delete this Admin Account?
                        </div>
                        <div class="modal-footer">
                          <form action="admin.php" method="POST">
                            <input type="hidden" name="category_id" class="category_id"> -->
                            <!-- <input type="hidden" name="category_id" value="<?php echo isset($_POST['category_id']) ?>"> -->
                            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="delete_admin" class="btn btn-danger ">Delete</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> -->
                <!-- Delete Modal end-->



              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>


</div>
</div>
</div>
</div>
</div>
<?php include('includes/footer.php'); ?>
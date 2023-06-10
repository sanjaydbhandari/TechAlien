<?php
session_start();
if (isset($_SESSION['auth'])) {
  $_SESSION['msg'] = "You are already Logged In";
  header('Location:index.php');
  exit(0);
}
include('includes/header.php');
?>
<div class="container pt-3">
  <div class="row justify-content-center">
    <div class="col-md-6">
    <?php include('admin/message.php'); ?>
      <div class="card">
        <div class="card-header bg-success text-white text-center">
          <h4 class="fw-bold pt-2" style="letter-spacing:2px;">Registration</h4>
        </div>
        <div class="card-body">
          <form action="authcode.php" method="post">
            <div class="mb-2">
              <label class="form-label">FullName</label>
              <input type="text" name="fullname" class="form-control" placeholder="enter your fullname" class="box" value="">
            </div>
            <div class="mb-2">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="text" name="email" placeholder="enter your email" class="form-control" id="exampleInputEmail1" value="">
            </div>
            <div class="mb-2">
              <label class="form-label">Phone Number</label>
              <input type="text" name="phonenumber" class="form-control" placeholder="enter your PhoneNumber" value="">
            </div>
            <div class="mb-2">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" name="password" placeholder="enter your password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-2">
              <label class="form-label">Confirm Password</label>
              <input type="password" name="cpassword" placeholder="confirm your password" class="form-control">
            </div>
            <button type="submit" name="register" class="btn btn-success ">Register</button>
            <p>already have an account? <a href="login.php">login now!</a></p>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
<?php include('includes/scripts.php'); ?>
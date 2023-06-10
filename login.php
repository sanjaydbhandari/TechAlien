<?php
session_start();
if (isset($_SESSION['auth'])) {
  $_SESSION['msg'] = "You are already Logged In";
  header('Location:index.php');
}
include('includes/header.php'); 
include('redirect.php'); 
?>
<div class="container pt-3">
  <div class="row justify-content-center">
    <div class="col-md-5">
    <?php include('admin/message.php'); ?>
      <div class="card">
        <div class="card-header bg-success text-white text-center">
          <h4 fw-bold" style="letter-spacing:2px;">LOGIN</h4>
        </div>
        <div class="card-body">
          <form action="authcode.php" method="post">
            <div class="mb-2">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" name="email" placeholder="enter your email" class="form-control" id="exampleInputEmail1" value="">
            </div>
            <div class="mb-2">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" name="password" placeholder="enter your password" class="form-control" id="exampleInputPassword1">
            </div>
            <p>forgot your password don't worry? <a id="forgotpass" href="emailrecovery.php">forgot password</a></p>
            <button type="submit" name="login" class="btn btn-success">login</button>
            <p>don't have an account? <a href="signup.php">Sign up</a></p>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include('includes/scripts.php');?>

<?php

session_start();
include('config.php');
include('redirect.php');
// ob_start;

if (isset($_POST['submit'])) {
   if (isset($_GET['token'])) {
      $token = $_GET['token'];
      $newpassword = mysqli_real_escape_string($conn, $_POST['newpassword']);
      $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
      if (empty($newpassword)) {
         redirect('resetpassword.php?token=' . $token, 'New Password is required');
      } else if (strlen($_POST["newpassword"]) <= '8' || !preg_match("#[A-Z]+#", $_POST["newpassword"]) || !preg_match("#[a-z]+#", $_POST["newpassword"]) || !preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST["newpassword"])) {
         redirect('resetpassword.php?token=' . $token, 'Your Password Must have Contain 8 Digits which contain 1 Number, 1 Capital Letter, 1 Lowercase Letter and 1 Special Character!');
      } else if (empty($cpassword)) {
         redirect('resetpassword.php?token=' . $token, 'Confirm Password is required');
      } else {
         if ($newpassword != $cpassword) {
            redirect('resetpassword.php?token=' . $token, 'Password not matched!');
         } else {
            $newpassword = password_hash($newpassword, PASSWORD_BCRYPT);
            $updatequery = " Update users SET password = '$newpassword' where token='$token' ";
            $query = mysqli_query($conn, $updatequery);
            if ($query) {
               redirect('login.php', 'Your password has Updated!');
            } else {
               redirect('resetpassword.php?token=' . $token, 'failed to Update password!');
            }
         }
      }
   } else {
      echo "No Token Found!";
   }
}

?>

<?php include('includes/header.php'); ?>
<div class="container pt-3">
   <div class="row justify-content-center">
      <div class="col-md-6">
         <?php include('admin/message.php'); ?>
         <div class="card">
            <div class="card-header bg-success text-white text-center">
               <h4 class="fw-bold pt-2" style="letter-spacing:2px;">Reset Password</h4>
            </div>
            <div class="card-body">
               <form action="" method="post">
                  <div class="mb-2">
                     <label for="exampleInputPassword1" class="form-label">Password</label>
                     <input type="password" name="newpassword" placeholder="enter your password" class="form-control" id="exampleInputPassword1">
                  </div>
                  <div class="mb-2">
                     <label class="form-label">Confirm Password</label>
                     <input type="password" name="cpassword" placeholder="confirm your password" class="form-control">
                  </div>
                  <input type="submit" value="Update Password" class="btn btn-success" name="submit">
                  <p>want to change email id? <a href="emailrecovery.php">change email</a></p>
               </form>
            </div>
            <?php include('includes/scripts.php');?>

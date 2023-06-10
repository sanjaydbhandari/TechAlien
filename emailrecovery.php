<?php
session_start();
include('config.php');
include('redirect.php');
// include('includes/header.php');

if (isset($_POST['submit'])) {
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   if (empty(trim($email))) {
      redirect('emailrecovery.php', 'Email Id is Required');
   } else {
      $emailquery = " SELECT * FROM users WHERE (email = '$email')";
      $query = mysqli_query($conn, $emailquery);
      if (mysqli_num_rows($query) > 0) {
         $row = mysqli_fetch_assoc($query);
         $fullname = $row['fullname'];
         $token = $row['token'];
         $subject = "Reset Password";
         $body = "Hello $email. Click here to Reset your Password
         http://localhost/techalien/resetpassword.php?token=$token";
         $sender_email = "From: techalien.team@gmail.com";
         if (mail($email, $subject, $body, $sender_email)) {
            $_SESSION['msg'] = "$email Check your mail to Reset your Password";
            header('location:login.php');
         } else {
            echo "Email sending Failed...";
            $_SESSION['msg'] = "Something Went Wrong";
            header('location:emailrecovery.php');
         }
      } else {
         $_SESSION['msg'] = $email . " Email Id is Not Registered";
         header('location:signup.php');
      }
   }
}
?>

<?php
include('includes/header.php');
?>
<div class="container pt-3">
   <div class="row justify-content-center">
      <div class="col-md-5">
      <?php include('admin/message.php'); ?>
         <div class="card">
            <div class="card-header bg-success text-white text-center">
               <h4 class="fw-bold pt-1" style="letter-spacing:2px;">Recover Your Account</h4>
            </div>
            <div class="card-body">
               <form action="" method="post">
                  <div class="mb-2">
                     <label for="exampleInputEmail1" class="form-label">Email address</label>
                     <input type="email" name="email" placeholder="enter your email" class="form-control" id="exampleInputEmail1" value="">
                  </div>
                  <input type="submit" value="Send Mail" class="btn btn-success float-end" name="submit">
                  <p>already have an account? <a href="login.php">log In</a></p>
               </form>
            </div>
            <?php include('includes/scripts.php');?>
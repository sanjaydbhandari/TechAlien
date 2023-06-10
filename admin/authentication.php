<?php
include('../redirect.php');
include('functions.php');
// session_start();
if (isset($_SESSION['auth'])) {
  if($_SESSION["role"]==0)
  {
    redirect('../index.php','You Are Not Autherised as Admin');
    // $_SESSION["msg"]='You Are Not Autherised as Admin';
    // header('location:../index.php');
  }
}
else{
  redirect('../login.php','Login as Admin');
  // $_SESSION["msg"]='Login as Admin';
  //   header('location:../login.php');
}


?>
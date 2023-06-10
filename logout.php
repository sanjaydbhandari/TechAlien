<?php
session_start();

@include 'config.php';

if(isset($_SESSION['auth']))
  {
    unset($_SESSION['auth']);
    unset($_SESSION['auth_user']);
    $_SESSION['msg']="Logged Out Successfully";
  }
// session_destroy();

header('location:index.php');

?>
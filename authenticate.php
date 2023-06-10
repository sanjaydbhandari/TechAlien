<?php
// include('redirect.php');
// include('functions.php');
// include('redirect.php');

if (isset($_SESSION['auth'])==true) {

  
  $_SESSION['msg']='Login To Continue';
  header('Location:login.php'); 
  die();
    // redirect('login.php','Login To Continue');
  }



?>
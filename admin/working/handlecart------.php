<?php

session_start();
include('config.php');
include('redirect.php');

// redirect('product-view.php','Successfully Added To Cart');


if (isset($_SESSION['auth'])) 
{
  if (isset($_POST['addtocart'])) 
  {
    $prod_id = $_POST['prod_id'];
    $prod_qty = $_POST['prod_qty'];
    $user_id = $_SESSION['auth_user']['user_id'];

    $chk_existing_cart="SELECT * FROM carts WHERE prod_id='$prod_id' AND user_id='$user_id' ";
    $chk_existing_cart_run=mysqli_query($conn,$chk_existing_cart);
    redirect('','Login To Continue');
    if(mysqli_num_rows($chk_existing_cart_run)>0)
    {
      redirect('login.php','Login To Continue');
    }
  }
  else
    {

    }
}
else
{
  redirect('login.php','Login To Continue');
}
?>

<?php 
session_start();
include('config.php');

function getAllActive($table)
{
    global $conn;
    $query ="SELECT * FROM $table";
    return $query_run=mysqli_query($conn,$query);
}

function getIdActive($table)
{
    global $conn;
    $query ="SELECT * FROM $table WHERE status='0' AND status='0'";
    return $query_run=mysqli_query($conn,$query);
}


function getSlugActive($table,$slug)
{
    global $conn;
    $query ="SELECT * FROM $table WHERE slug='$slug' Limit 1";
    return $query_run=mysqli_query($conn,$query);
}


function getProdByCategory($category_id)
{
    global $conn;
    $query ="SELECT * FROM products WHERE category_id='$category_id'";
    return $query_run=mysqli_query($conn,$query);
}

function getCartItems()
{
    global $conn;
    $userId=$_SESSION['auth_user']['user_id'];
    $query="SELECT c.id as cid, c.prod_id, c.prod_qty, p.id as pid, p.name, p.image,p.selling_price 
    FROM carts c, products p WHERE c.prod_id=p.id AND c.user_id='$userId' ORDER BY c.id DESC "; 
    return $query_run=mysqli_query($conn,$query);
}

function getOrders()
{
    global $conn;
    $userId=$_SESSION['auth_user']['user_id'];
    $query=" SELECT * FROM orders WHERE user_id='$userId' ORDER BY id DESC";
    return $query_run=mysqli_query($conn,$query);
}

function checkTrackingNoValid($trackingNo)
{
    global $conn;
    $userId=$_SESSION['auth_user']['user_id'];
    $query="SELECT * FROM orders WHERE tracking_no='$trackingNo' AND user_id='$userId' ";
    return mysqli_query($conn,$query);
}

function fetch($table)
  {
    global $conn;
    $select = "SELECT * FROM $table";
    return $query = mysqli_query($conn, $select);
  }


  function search_product($search_item)
  {
    global $conn;
    $select = "SELECT * FROM products WHERE name LIKE '%{$search_item}%'";
    return $query = mysqli_query($conn, $select);
  }

  function fetch_product_quantity($prod_id)
  {
    global $conn;
    echo $prod_id;
    $select = "SELECT quantity FROM products WHERE id='$prod_id'";
    return $query_run = mysqli_query($conn, $select);
    

  }
  function fetchProductQuantity($prod_id)
{
    global $conn;
    $query ="SELECT * FROM products WHERE id='$prod_id'";
    return $query_run=mysqli_query($conn,$query);
    // echo $query_run;
}






// function redirect($url,$message)
// {
//     $_SESSION['message'] = $message;
//     header('Location: '.$url);
//     exit(0);
// }
?>
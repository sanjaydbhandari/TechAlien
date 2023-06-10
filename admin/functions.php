<?php
  session_start();
  include('../config.php');

  function fetch($table)
  {
    global $conn;
    $select = "SELECT * FROM $table";
    return $query = mysqli_query($conn, $select);
  }

  function fetchId($table,$id)
  {
    global $conn;
    $select = "SELECT * FROM $table WHERE id=$id";
    return $query = mysqli_query($conn, $select);
  }

  function  getAllOrders()
{
    global $conn;
    // $userId=$_SESSION['auth_user']['user_id'];
    $query=" SELECT * FROM orders WHERE status='0'";
    return $query_run=mysqli_query($conn,$query);
}
function checkTrackingNoValid($trackingNo)
{
    global $conn;
    $query="SELECT * FROM orders WHERE tracking_no='$trackingNo' ";
    return mysqli_query($conn,$query);
}

function getOrdersHistory()
{
  global $conn;
    // $userId=$_SESSION['auth_user']['user_id'];
    $query=" SELECT * FROM orders WHERE status!='0' ORDER BY id DESC";
    return $query_run=mysqli_query($conn,$query);
}

?>
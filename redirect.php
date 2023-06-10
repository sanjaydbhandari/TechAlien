<?php
function redirect($url,$msg)
{
  $_SESSION['msg'] = $msg;
  header('Location:'.$url);
  exit();
}
?>
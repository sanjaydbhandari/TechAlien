
<?php
if (isset($_SESSION['msg'])) {
?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong><?=$_SESSION['msg'];?></strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
  unset($_SESSION['msg']);
}
?>



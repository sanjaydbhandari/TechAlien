<footer class="footer pt-5">
  <div class="container-fluid">
    <div class="row align-items-center justify-content-lg-between">
      <div class="col-lg-6 mb-lg-0 mb-4">
        <div class="copyright text-center text-sm text-muted text-lg-start">
        </div>
      </div>
      <div class="col-lg-6">
        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
          <li class="nav-item">
            <a href="" class="nav-link pe-0 text-muted" target="_blank">About Us</a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link pe-0 text-muted" target="_blank">Services</a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link pe-0 text-muted" target="_blank">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>
</main>
<script src="../assets/js/jquery-3.6.4.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/perfect-scrollbar.min.js"></script>
<script src="../assets/js/smooth-scrollbar.min.js"></script>
<script>
  $(document).ready(function () {
    $('.delete_category').click(function (e){
      e.preventDefault();

      var category_id=$(this).val();
      // console.log(category_id);
      $('.category_id').val(category_id);
      $('#categoryDeleteModal').modal('show');
    });

    $('.delete_admin').click(function (e){
      e.preventDefault();

      var admin_id=$(this).val();
      // console.log(category_id);
      $('.admin_id').val(admin_id);
      $('#adminDeleteModal').modal('show');
    });

    $('.delete_product').click(function (e){
      e.preventDefault();

      var product_id=$(this).val();
      console.log(product_id);
      $('.product_id').val(product_id);
      $('#productDeleteModal').modal('show');
    });
  });
</script>


</body>

</html>
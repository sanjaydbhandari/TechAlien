<?php
include('userfunctions.php');
include('includes/header.php');
include('admin/message.php');
?>
<div class="container">
  <div class="row">
    <div class="col-md-12">

      <!-- slider -->
      <div class="slider">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="assets/images/banner/HomePageBanner.webp" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="assets/images/banner/1365-x-260-px-JBL-WAVE-RD-3499-jpeg.avif" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="assets/images/banner/OnePlus.avif" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="assets/images/banner/Premium-Audio-CLP-Banner-01-03-2023.avif" class="d-block w-100" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
      <!-- slider end -->


      <!-- <div class="categories"> -->
      <div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                    <h1 class="text-success text-center">Our Categories</h1>
                    <hr>
                    <div class="row">
                    <?php 
                        $categories=getAllActive("categories");

                        if(mysqli_num_rows($categories)>0)
                        {
                            foreach($categories as $item)
                            {
                                ?>
                                    <div class="col-md-4 mb-2">
                                        <a href="products.php?category=<?=$item['slug']?>">
                                        <div class="card shadow">
                                            <div class="card-body d-flex align-items-center justify-content-center">
                                                <img src="admin/uploads/<?=$item['image']; ?>" alt="Category Image" class="w-50">
                                                 <h4 class="text-center"><?=$item['name']; ?></h4>
                                            </div>
                                        </div>
                                        </a>
                                    </div>        

                                <?php
                            }
                        }
                        else
                        {
                            echo "Categories are Not Available";
                        }
                    ?>
                    </div>
                </div>
            </div>
    </div>
 </div>

        <!-- slider 2-->
      <div class="slider mt-5">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="assets/images/banner/OnePlus-11R-5G-CLP-Banner-28-02-2023.avif" class="d-block w-100" alt="...">
            </div>
            <!-- <div class="carousel-item">
              <img src="assets/images/banner/Pre-Summer-sale.avif" class="d-block w-100" alt="...">
            </div> -->
            <div class="carousel-item">
              <img src="assets/images/banner/1365-x-260-px-JBL-WAVE-RD-3499-jpeg.avif" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="assets/images/banner/Premium-Audio-CLP-Banner-01-03-2023.avif" class="d-block w-100" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
      <!-- slider2 end -->












</div>
</div>
</div>
<?php include('includes/footer.php'); ?>
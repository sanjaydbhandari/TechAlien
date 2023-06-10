<?php
 include('userfunctions.php');
 include('includes/header.php'); 
//  include('authenticate.php'); 
 ?>
<div class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                            <h2>Products</h2>
                            <hr>
                            <div class="row">
                            <?php 
                            if(isset($_POST['search_data']))
                            {
                                $search_data=$_POST['search_data'];
                                echo $search_data;
                                $products=search_product($search_data);
                            }
                                if(mysqli_num_rows($products)>0)
                                {
                                    foreach($products as $item)
                                    {
                                        ?>


<div class="col-md-3 mb-2">
<div class="card m-2" style="width: 18rem;">
<a href="product-view.php?product=<?=$item['slug']; ?>">
  <img src="admin/uploads/products/<?=$item['image'];?>" class="card-img-top" alt="...">
  <div class="card-body">
    <p class="card-text text-center bottom"><?=$item['name']; ?></p>

  </div>
</a>
</div>
</div>


                                            <!-- <div class="col-md-4 mb-2">
                                                <a href="product-view.php?product=<?=$item['slug']; ?>">
                                                    <div class="card shadow">
                                                        <div class="card-body d-flex align-items-center justify-content-center">
                                                            <img src="admin/uploads/products/<?=$item['image'];?>" alt="Product Image" width="250" height="250px" class="w-10">
                                                            <h4 class="text-center"><?=$item['name']; ?></h4>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>         -->

                                        <?php
                                        $_POST['search_data']='';
                                        // $_SESSION['category_name']=$category['name'];
                                    }
                                }
                                else
                                {
                                    echo"No data available";
                                }
                            ?>
                            </div>
                        </div>
                    </div>
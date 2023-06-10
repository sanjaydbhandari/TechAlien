<?php
 include('userfunctions.php');
 include('includes/header.php'); 

// $category_slug = $_GET['category'];
// $category=getSlugActive('categories',$category_slug);

 ?>
 <div class="py-3 ">
    <div class="container">
        <h6 class=" float-end fs-4 text-success">
            <a class="text-success" href="index.php">
                            Home/
                        </a>
                        <a class="text-success" href="categories.php">
                            categories
                        </a></h6>
    </div>
 </div>   

 <div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                    <h1>Our Categories</h1>
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
 <?php include('includes/footer.php');?>
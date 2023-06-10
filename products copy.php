<?php
 include('userfunctions.php');
 include('includes/header.php'); 

 if(isset($_GET['category'] ))
 {
 $category_slug=$_GET['category'];
 $category_data = getSlugActive("categories",$category_slug);
 $category=mysqli_fetch_array($category_data);
 $cid=$category['id'];
 if($category)
 {
    $cid=$category['id'];
    ?>
        <div class="py-3">
            <div class="container">
                <h6 class="float-end fs-4 text-success">
                    <a class="text-success" href="categories.php">
                        Home/
                    </a>
                    <a class="text-success" href="categories.php">
                    <?= $category['name']; ?>
                    </a>
                    </h6>
            </div>
        </div>   
        


        <div class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                            <h2><?= $category['name']; ?></h2>
                            <hr>
                            <div class="row">
                            <?php 
                                $products=getProdByCategory($cid);

                                if(mysqli_num_rows($products)>0)
                                {
                                    foreach($products as $item)
                                    {
                                        ?>
                                            <div class="col-md-4 mb-2">
                                                <a href="product-view.php?product=<?=$item['slug']; ?>">
                                                    <div class="card shadow">
                                                        <div class="card-body d-flex align-items-center justify-content-center">
                                                            <img src="admin/uploads/products/<?=$item['image'];?>" alt="Product Image" class="w-0">
                                                            <h4 class="text-center"><?=$item['name']; ?></h4>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>        

                                        <?php
                                        $_SESSION['category_name']=$category['name'];
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
            </div>
        </div>
    <?php 
    }
    else
    {
        echo"something went wrong";    
    }
}
 else
 {
    echo"something went wrong";
 }
 include('includes/footer.php');?>
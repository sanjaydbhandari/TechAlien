<?php
include('userfunctions.php');
include('includes/header.php');

if (isset($_GET['category'])) {
    $category_slug = $_GET['category'];
    $category_data = getSlugActive("categories", $category_slug);
    $category = mysqli_fetch_array($category_data);
    // $cid = $category['id'];
    if ($category) {
        $cid = $category['id'];
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
                    <!-- <form action="handlecart.php" method="post"> -->
                    <div class="col-md-12">
                        <h2><?= $category['name']; ?></h2>
                        <hr>
                        <div class="row">
                            <?php
                            $products = getProdByCategory($cid);
                            if (mysqli_num_rows($products) > 0) {
                                foreach ($products as $item) {
                            ?>
                                    <div class="col-md-3 mb-2">
                                        <div class="card m-2" style="width: 18rem;">
                                            <a href="product-view.php?product=<?= $item['slug']; ?>">
                                                <img src="admin/uploads/products/<?= $item['image']; ?>" class="card-img-top" alt="...">
                                                <div class="card-body text-center">
                                                    <p class="card-text f-12 bottom"><?= $item['name']; ?></p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    </form>
                            <?php
                                    $_SESSION['category_name'] = $category['name'];
                                }
                            } else {
                                echo "No data available";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    } else {
        echo "something went wrong";
    }
} else {
    echo "something went wrong";
}
include('includes/footer.php'); ?>
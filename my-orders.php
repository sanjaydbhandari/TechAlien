<?php

include('userfunctions.php');
//  include('authenticate.php');
include('includes/header.php');
?>


<div class="py-3 ">
    <div class="container">
        <h6 class="float-end fs-4 text-success">
            <a href="index.php" class="text-success">
                Home/
            </a>
            <a href="my-orders.php" class="text-success">
                My Orders
            </a>
        </h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="message">
            <?php include('admin/message.php'); ?>
        </div>
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tracking No</th>
                                <th>Price</th>
                                <th>Date</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_SESSION['auth'])) {
                                $orders = getOrders();
                                if (mysqli_num_rows($orders) > 0) {
                                    foreach ($orders as $item) {
                            ?>
                                        <tr>
                                            <td><?= $item['id']; ?></td>
                                            <td><?= $item['tracking_no']; ?></td>
                                            <td><?= $item['total_price']; ?></td>
                                            <td><?= $item['created_at']; ?></td>
                                            <td>
                                                <a href="view-order.php?t=<?= $item['tracking_no']; ?>" class="btn btn-sm btn-outline-success">View details</a>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="5">No orders yet</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>
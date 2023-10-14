<?php 
include('includes/header.php');
include('../functions/myfunction.php');
//include('../middleware/adminMiddleware.php')
?>

<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Orders</h4>                   
                </div>
                <div class="card-body" id="products_table">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Order Number</th>
                                <th>User</th>
                                <th>Total Price</th>
                                <th>Date</th>
                                <th>Details</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $orders = getAllOrders();

                                if(mysqli_num_rows($orders) > 0){
                                    foreach($orders as $item){
                                        ?>
                                        <tr >
                                            <td > <?= $item['id']; ?> </td>
                                            <td > <?= $item['name']; ?> </td>
                                            <td>$<?= $item['total_price']; ?> </td>
                                            <td> <?= $item['created_at']; ?> </td>
                                            <td>
                                            <a href="category.php" class="btn btn-primary ">Details</a>
                                            </td>

                                        </tr>
                                        <?php
                                    }
                                }else{
                                    ?>
                                        <tr>
                                        <td colspan="5">No Orders Yet</td>
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



<?php include('includes/footer.php');  ?>

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
                    <h4>Products</h4>                   
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Names</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Actions </th> 
                            
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $products = getAll("produits");
                            if ($products) {
                                while ($item = mysqli_fetch_assoc($products)) {
                                    ?>
                                    <tr>
                                        <td><?= $item['ID_PRODUIT']; ?></td>
                                        <td><?= $item['name']; ?></td>
                                        <td>
                                            <img src="../uploads/<?= $item['image_p']; ?>" width="50px" alt="<?= $item['image_p']; ?>">
                                        </td>
                                        <td>
                                        <?= $item['description']; ?>
                                        </td>
                                        <td>
                                        <?= $item['price']; ?>
                                        </td>
                                        <td>
                                            <a href="edit-prod.php?id=<?= $item['ID_PRODUIT']; ?>" class="btn btn-primary">Edit</a>
                                            <form action="code.php" method="post">
                                                <input type="hidden" name="category_id" value="<?= $item['ID_CATEGORIE']; ?>">
                                                <button type="submit" class="btn btn-danger" name="delete_cat_btn">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                }
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
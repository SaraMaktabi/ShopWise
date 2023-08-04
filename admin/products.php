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
                <div class="card-body" id="products_table">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Names</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Quantity in Stock</th> 
                                <th>Actions</th> 
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $products = getAll("produits");
                        if ($products) {
                            while ($item = mysqli_fetch_assoc($products)) {
                                $productId = $item['ID_PRODUIT'];
                                $stockQuery = "SELECT QUANTITE_EN_STOCK FROM stock WHERE PRODUIT_ID = $productId";
                                $stockResult = mysqli_query($conn, $stockQuery);
                                $stockData = mysqli_fetch_assoc($stockResult);
                                $quantityInStock = $stockData['QUANTITE_EN_STOCK'];
                                ?>
                                <tr>
                                    <td><?= $item['ID_PRODUIT']; ?></td>
                                    <td><?= $item['name']; ?></td>
                                    <td>
                                        <img src="../uploads/<?= $item['image_p']; ?>" width="50px" alt="<?= $item['image_p']; ?>">
                                    </td>
                                    <td><?= $item['description']; ?></td>
                                    <td><?= $item['price']; ?></td>
                                    <td><?= $quantityInStock; ?></td> <!-- Affichage de la quantité en stock -->
                                    <td>
                                        <a href="edit-prod.php?id=<?= $item['ID_PRODUIT']; ?>" class="btn btn-primary">Edit</a>
                                        <br>
                                        <button type="button" class="btn btn-sm btn-danger delete_prod_btn" value="<?= $item['ID_PRODUIT']; ?>">Delete</button>
                                        
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

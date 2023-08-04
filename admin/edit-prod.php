<?php 
include('includes/header.php');
include('../functions/myfunction.php');
?>

<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <?php
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $product = getById("produits", $id, "ID_PRODUIT" );
                    $quant = getById('stock', $id, "PRODUIT_ID" );
                    
                    if(mysqli_num_rows($product)>0){

                        $data = mysqli_fetch_array($product);
                        $stock = mysqli_fetch_array($quant)

                        ?>
                            <div class="card">
                            <div class="card-header">
                                <h4>Edit Products
                                    <a href="products.php" class="btn btn-primary float-end">Back</a>
                                </h4>
                                    
                            </div>
                            <div class="card-body">
                                <form action="code.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Category</label>
                                        <select name="category_id" class="form-select" >
                                        <option selected>Select Category</option>
                                            <?php
                                                $categories = getAll("categories");
                                                if(mysqli_num_rows($categories)>0){
                                                    foreach($categories as $item){
                                                        ?>
                                                            <option value="<?= $item['ID_CATEGORIE']; ?>" <?=$data['ID_CATEGORIE'] == $item['ID_CATEGORIE']?'selected':''; ?> ><?= $item['name']; ?></option>
                                                        <?php
                                                    }
                                                }else{
                                                    echo "No categorie available";
                                                }
                                                
                                            ?>
                                
                                        </select>
                                    </div>
                                    <input type="hidden" name="product_id" value="<?= $data['ID_PRODUIT'] ;?>">
                                    <div class="col-md-6">
                                        <label for="">Name</label>
                                        <input type="text" name="name" value="<?= $data['name']; ?>" placeholder="Enter your product name" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="mb-0">Upload Image</label>
                                        <input type="hidden" name="old_image" value="<?= $data['image_p']; ?>">
                                        <input type="file" name="image" class="form-control">
                                        <label for="" class="mb-0">Current Image</label>
                                        <img src="../uploads/<?= $data['image_p']; ?>" alt="Product Image" width="50px">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Quantity in Stock</label>
                                        <input type="number" name="quantity_in_stock" value="<?= $stock['QUANTITE_EN_STOCK']; ?>" placeholder="Enter the quantity in stock" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Price</label>
                                        <input type="text" name="price" value="<?= $data['price']; ?>" placeholder="Enter the selling price" class="form-control">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Description</label>
                                        <textarea rows="3" name="description" placeholder="Enter description" class="form-control"><?= $data['description']; ?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary" name="update_prod_btn">Save</button>
                                    </div>
                                </div>
                                
                                </form>
                            </div>
                        </div>
                        <?php
                    }else{
                        echo "Product not found";
                    }

                    
                }else{
                    echo "Id missing from url";
                }

            ?>
            
        </div>
    </div>
</div>

<?php include('includes/footer.php');  ?>
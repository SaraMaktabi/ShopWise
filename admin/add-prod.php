<?php 
include('includes/header.php');
include('../functions/myfunction.php');
?>

<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Products</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Name</label>
                            <select name="category_id" class="form-select" >
                            <option selected>Select Category</option>
                                <?php
                                    $categories = getAll("categories");
                                    if(mysqli_num_rows($categories)>0){
                                        foreach($categories as $item){
                                            ?>
                                                <option value="<?= $item['ID_CATEGORIE']; ?>"><?= $item['name']; ?></option>
                                            <?php
                                        }
                                    }else{
                                        echo "No categorie available";
                                    }
                                    
                                ?>
                       
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="">Name</label>
                            <input type="text" name="name" placeholder="Enter your Product name" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">Upload Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                    
                        <div class="col-md-6">
                            <label for="">Price</label>
                            <input type="text" name="price" placeholder="Enter the selling price" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">Quantity in Stock</label>
                            <input type="number" name="quantity_in_stock" placeholder="Enter the quantity in stock" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="">Description</label>
                            <textarea rows="3" name="description" placeholder="Enter description" class="form-control"></textarea>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn" name="add_prod_btn">Save</button>
                        </div>
                    </div>
                    <style>
          .btn{
            width: 100px;
            margin-top: 20px;
            background-color:#b97375;
            color: white;
          }
          .btn:hover{
            background-color: #9c5254;
            color: white;
          }                  
        </style>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php');  ?>
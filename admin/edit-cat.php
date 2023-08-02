
<?php 
include('includes/header.php');
include('../config/dbconn.php');
include('../functions/myfunction.php')
//include('../middleware/adminMiddleware.php');
?>
<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <?php
            if(isset($_GET['id']))
            {
                
                $id= $_GET['id'];
                $category = getById("categories", $id, 'ID_CATEGORIE');
                if(mysqli_num_rows($category) > 0)
                {
                    $data = mysqli_fetch_array($category);
                     ?>
                        <div class="card">
                    <div class="card-header">
                        <h4>Edit Category
                            <a href="category.php" class="btn btn-primary float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" name="category_id" value="<?=$data['ID_CATEGORIE'] ?>">
                                <label for="">Name</label>
                                <input type="text" name="name" value="<?=$data['name'] ?>" placeholder="Enter your category name" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="">Upload Image</label>
                                <input type="file" name="image" class="form-control">
                                <label for="">Current Image</label>
                                <input type="hidden" name="old_image" value="<?=$data['image_cat'] ?>">
                                <img src="../uploads/<?= $data['image_cat'] ?>"  width="60px" alt="">
                            </div>
                            <div class="col-md-12">
                                <label for="">Description</label>
                                <textarea rows="3" name="description" value="" placeholder="Enter description" class="form-control"><?=$data['description'] ?></textarea>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="update_cat_btn">Update</button>
                            </div>
                        </div>
                        
                        </form>
                    </div>
                </div>
                    <?php
                }else{
                    echo "Category not found";
                }
            }else{
                echo "Id missing from url";
            }
            ?>
            
        </div>
    </div>
</div>
<?php include('includes/footer.php');  ?>

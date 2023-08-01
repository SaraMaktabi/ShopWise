
<?php 
include('../includes/header.php');
include('../config/dbconn.php');
//include('../middleware/adminMiddleware.php');
?>
<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <?php
            if(isset($_GET['id']))
            {
                
                $id= $_GET['id'];
                $category = getById("categories", $id);
                if(mysqli_num_rows($category) > 0)
                {
                     ?>
                        <div class="card">
                    <div class="card-header">
                        <h4>Edit Category</h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Name</label>
                                <input type="text" name="name" placeholder="Enter your category name" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="">Upload Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="">Description</label>
                                <textarea rows="3" name="description" placeholder="Enter description" class="form-control"></textarea>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="add_cat_btn">Save</button>
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
<?php include('../includes/footer.php');  ?>

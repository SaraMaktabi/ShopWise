<?php 
include('includes/header.php');
//include('C:\xampp\htdocs\ShopWise_Project\admin\middleware');

include('./admin/functions/myfunction.php');
?>

<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Categories</h4>                   
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Names</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Edit </th> 
                            
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $category = getAll("categories");
                                if(mysqli_num_rows($category)>0)
                                {
                                    foreach($category as $item)
                                    {
                                        ?>
                                            <tr>
                                                <td><?=$item['id']; ?></td>
                                                <td><?=$item['name']; ?></td>
                                                <td>
                                                    <img src="../uploads/<?=$item['image']; ?>" alt="<?=$item['image']; ?>">
                                                </td>
                                                <td>
                                                    <?=$item['status'] == '0'? "Visible":"Hidden" ?>
                                                </td>
                                                <td>
                                                    <a href="#" class="btn btn-primary">Edit</a>
                                                </td>
                                            </tr>
                                        <?php
                                    }
                                }
                            ?>
                            <tr>
                                <td>1</td>
                                <td>Shoes</td>
                                <td>1</td>
                                <td>visibles</td>
                                <td>Edit</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php');  ?>
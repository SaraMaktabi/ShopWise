<?php 

include('../includes/header.php');
include('../functions/myfunction.php');


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
                                <th>Description</th>
                                <th>Edit </th> 
                            
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $category = getAll("categories");
                            if ($category) {
                                while ($item = mysqli_fetch_assoc($category)) {
                                    ?>
                                    <tr>
                                        <td><?= $item['ID_CATEGORIE']; ?></td>
                                        <td><?= $item['name']; ?></td>
                                        <td>
                                            <img src="../uploads/<?= $item['image_cat']; ?>" width="50px" alt="<?= $item['image_cat']; ?>">
                                        </td>
                                        <td>
                                        <?= $item['description']; ?>
                                        </td>
                                        <td>
                                            <a href="edit-cat.php?id=<?= $item['ID_CATEGORIE']; ?>" class="btn btn-primary">Edit</a>
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

<?php include('../includes/footer.php');  ?>
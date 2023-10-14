<?php

//include('functions/userfunctions.php');
include('functions/userfunction.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopWise</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
/>
<!-- Link To CSS -->    
    <link rel="stylesheet" href="index.css">
    <!--<link rel="stylesheet" href="assets/css/bootstrap.min.css">-->
<!-- Box Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>
    
        
        <!--header-->
        <header class="header">
            <div class="header-1">
                <div class="logo">
                    <a href="index.php">
                    <img src="images/logo.png" alt="Logo du site">
                    </a>
                </div>
                <form action="" class="search-form">
                    <input type="search" name="" placeholder="Search here..." id="search-box">
                    <label for="search-box" class="fas fa-search"></label>
                </form>
                <div class="icons">
                    <div id="search-btn" class="fas fa-search"></div>
                    <a href="cart.php" class="fas fa-shopping-cart"></a>
                    
                    
                </div>
            </div> 
            <div class="header-2">
                <nav class="navbar">
                    <a href="index.php">Home</a>
                    <a href="#Featured">Featured</a>
                    <a href="categories.php">Categories</a>
                    <a href="#Reviews">Reviews</a>
                </nav>
            </div> 
        </header>  
        <!--bottom navbar-->
        <nav class="bottom-navbar">
            <a href="index.php" class="fas fa-home"></a>
            <a href="#Featured" class="fas fa-list"></a>
            <a href="#Arrivals" class="fas fa-tags"></a>
            <a href="#Reviews" class="fas fa-comments"></a> 
        </nav>


        <!--Categories-->
        <section class="featured" id="featured">
            <h1 class="heading"><span>Our Categories</span></h1>
            
                <div class="swiper">
                    <?php
                    $categories = getAllActive("categories");

                    if (mysqli_num_rows($categories) > 0) {
                        foreach ($categories as $item) {
                            ?>
                            <div class="col-md-4" id="categ">
                                <a href="produits.php?category=<?= $item['name']; ?>">
                                    <div class="card">
                                        <img src="uploads/<?= $item['image_cat']; ?>" alt="Category image" class="card-img-top" width="200px">
                                        <div class="card-body">
                                            <h2 class="card-title category-name"><?= $item['name']; ?></h2>
                                        </div>
                                    </div>
                                </a>
                                    
                            </div>
                            <?php
                        }
                    } else {
                        echo "No data available";
                    }
                    ?>
                </div>
            
            <style>
                #categ {
                    display: inline-block;
                    margin: 3px;
                }

                .category-name {
                    color: #444;
                    margin-top: 10px;
                    text-align: center; /* Center-align the category name */
                }

                .card {
                    border: none; /* Remove default card border */
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
                    transition: transform 0.3s ease; /* Add hover effect */
                }

                .card:hover {
                    transform: translateY(-5px);
                }
            </style>
        </section>



        
        

       
    

    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>       
    <!--link to js-->
    <script src="script.js"></script>
    <script src="assets/js/jquery-3.7.0.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

</body>
</html>

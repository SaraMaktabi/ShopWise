
<?php
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

    <!--alertify js--> 
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    
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
                    <a href="#">
                    <img src="images/logo.png" alt="Logo du site">
                    </a>
                </div>
                <form action="" class="search-form">
                    <input type="search" name="" placeholder="Search here..." id="search-box">
                    <label for="search-box" class="fas fa-search"></label>
                </form>
                <div class="icons">
                    <div id="search-btn" class="fas fa-search"></div>
                    <a href="#" class="fas fa-shopping-cart"></a>
                    
                    
                </div>
            </div> 
            <div class="header-2">
                <nav class="navbar">
                    <a href="#home">Home</a>
                    <a href="#Featured">Featured</a>
                    <a href="#Arrivals">Categories</a>
                    <a href="#Reviews">Reviews</a>
                </nav>
            </div> 
        </header>  
        <!--bottom navbar-->
        <nav class="bottom-navbar">
            <a href="#home" class="fas fa-home"></a>
            <a href="#Featured" class="fas fa-list"></a>
            <a href="#Arrivals" class="fas fa-tags"></a>
            <a href="#Reviews" class="fas fa-comments"></a> 
        </nav>


        <!--single products-->
        <?php
        if(isset($_GET['product'])){

            $product_name = $_GET['product'];
            $product_data = getNameActive("produits" ,$product_name);
            $product = mysqli_fetch_array($product_data);

            if($product){

                ?>

                <section class="featured" id="featured">
                    <h1 class="heading"><span>Single Product</span></h1>
                    <div class="swiper product_data">
                        <div class="product-details">
                            <div class="product-image">
                                <img src="uploads/<?= $product['image_p']; ?>" alt="Product image" width="200px">
                            </div>
                            <div class="product-info">
                                <h4 class="product-name"><?= $product['name']; ?></h4>
                                <hr class="divider">
                                <h3>Product description:</h3>
                                <p class="product-description"><?= $product['description']; ?></p>
                                <hr class="divider">
                                <p class="product-price">$<?= $product['price']; ?></p>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="custom-input-group">
                                            <div class="decrement_btn">-</div>
                                            <input type="text" class="custom-input input-qty" value="1">
                                            <div class="increment_btn">+</div>
                                        </div>
                                    </div>
                                </div>
                                <button class="addToCartBtn" value="<?= $product['ID_PRODUIT']; ?>"><i class="fas fa-shopping-cart"> Add to Cart</i> </button>
                                <button class="addToCartBtn"><i class="fas fa-heart"> Add to Wishlist</i></button>
                            </div>
                        </div>
                    </div>

                    <style>
                        .swiper {
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            padding: 40px;
                            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
                        }

                        .product-details {
                            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
                            display: flex;
                            align-items: center;
                            background-color: #fff;
                            padding: 20px;
                            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
                            border-radius: 5px;
                        }

                        .product-image img {
                            max-width: 100%;
                            height: auto;
                        }

                        .product-info {
                            margin-left: 20px;
                        }

                        .product-name {
                            font-size: 24px;
                            margin: 0;
                        }

                        .divider {
                            margin: 10px 0;
                            border: none;
                            border-top: 1px solid #ccc;
                        }

                        .product-description {
                            font-size: 18px;
                            line-height: 1.5;
                            margin: 0;
                            color: #444;
                        }
                        .product-price {
                            color: #35A29F;
                            font-size: 20px;
                            margin: 10px 0;
                        }

                        .addToCartBtn {
                            margin-top: 1rem;
                            display: inline-block;
                            padding: .9rem 3rem;
                            border-radius: .5rem;
                            border: none;
                            color: #fff;
                            background: var(--main-color);
                            font-size: 1.7rem;
                            cursor: pointer;
                            font-weight: 500;
                        }

                        .addToCartBtn:hover {
                            background: var(--dark);
                        }
                        .custom-input-group {
                            display: inline-flex;
                            align-items: center;
                            border: 1px solid #ccc;
                            border-radius: 4px;
                            overflow: hidden;
                        }

                        .decrement_btn {
                            flex: 0 0 auto;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            padding: 5px 10px;
                            font-size: 14px;
                            color: #333;
                            background-color: #f1f1f1;
                            border: 1px solid #ccc;
                            border-right: none;
                            cursor: pointer;
                        }
                        .increment_btn {
                            flex: 0 0 auto;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            padding: 5px 10px;
                            font-size: 14px;
                            color: #333;
                            background-color: #f1f1f1;
                            border: 1px solid #ccc;
                            border-right: none;
                            cursor: pointer;
                        }

                        .input-addon:last-child {
                            border-right: 1px solid #ccc;
                            border-left: none;
                        }

                        .custom-input {
                            text-align: center;
                            width: 40px;
                            flex: 1;
                            margin: 0;
                            padding: 5px;
                            font-size: 14px;
                            color: #333;
                            background-color: #fff;
                            border: 1px solid #ccc;
                            border-radius: 0;
                            outline: none;
                        }

                        .input-addon:hover {
                            background-color: #e0e0e0;
                        }

                    </style>

                </section>
                        
                        
                    

                <?php

            }else{
            echo "Product not found!";
            }


        }else{
            echo "Something went wrong";
        }
        ?>


       
    
    
    

    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>       
    <!--link to js-->
    <script src="script.js"></script>
    <script src="assets/js/jquery-3.7.0.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/custom.js"></script>

    <!-- Alertify js-->
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
  <script>
        
    <?php 
    if(isset($_SESSION['message'])) { 
      ?>
        alertify.set('notifier','position', 'top-right');
        alertify.success('<?= $_SESSION['message']; ?>');
     <?php 
      unset($_SESSION['message']);
      } 
      ?>
  
  </script>


</body>
</html>

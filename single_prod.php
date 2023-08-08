<?php
//include('functions/userfunctions.php');
?>

<?php session_start(); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive E-Commerce Website </title>

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
                    <a href="#" class="fas fa-heart"></a>
                    
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
        if(isset($_GET['ID_PRODUIT'])){
            $product = $_GET[''];
        }else{
            echo "Something went wrong";
        }


        ?>


       
    

    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>       
    <!--link to js-->
    <script src="script.js"></script>
    <script src="assets/js/jquery-3.7.0.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

</body>
</html>

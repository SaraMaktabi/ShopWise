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
    <!--<link rel="stylesheet" href="assets/css/bootstrap.min.css">-->
<!-- Box Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!--alertify js--> 
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
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

        <!--Shopping cart-->
        <section class="featured" id="featured">
    <h1 class="heading"><span>Checkout </span></h1>
    <?php
    if(isset($_SESSION['user_id'])){
        $items = getCartItems($_SESSION['user_id']);
        if(!empty($items)){
    ?>
    <div class="swiper">
        <table class="table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                $items = getCartItems($_SESSION['user_id']);
                $totalPrice = 0;
                foreach ($items as $citem) {
                ?>
                <tr class="card product_data">
                    <td class="col-md-2">
                        <img src="uploads/<?= $citem['image_p']; ?>" alt="image" width="100px">
                    </td>
                    <td class="col-md-4">
                        <h2><?= $citem['name']; ?></h2>
                    </td>
                    <td class="col-md-2">
                        <h2>$<?= $citem['price']; ?></h2>
                    </td>
                    <td class="col-md-2">
                        <h2><?= $citem['prod_qty']; ?></h2>
                    </td>
                </tr>
                <?php
                $totalPrice += $citem['price'] * $citem['prod_qty'];
                }
                ?>
                
            </tbody>
        </table>
        <h1 style="font-size: x-large;">Total Price: $<?= $totalPrice ?>  </h1>
    </div>
    <br>
    <br>

    <div class="form-container">
        <form action="placeorder.php" method="POST">
            <br>
                <h1 class="heading"><span>Basic details</span></h1>
                    <hr class="hr">
                <div class="row">
                    <div class="">
                        <label class="label">Name</label>
                        <input type="text" name="name" placeholder="Enter your name..." class="form-control" >
                    </div>
                    <div class="">
                        <label class="label">E-mail</label>
                        <input type="email" name="email" placeholder="Enter your email..." class="form-control" >
                    </div>
                    <div class="">
                        <label class="label">Phone</label>
                        <input type="text" name="phone" placeholder="Enter your Phone number..." class="form-control" >
                    </div>
                    <div class="">
                        <label class="label">Pin Code</label>
                        <input type="text" name="pincode" placeholder="Enter your pin code..." class="form-control" >
                    </div>
                    <div class="">
                        <label class="label">Address</label>
                        <textarea name="address"  rows="10" class="form-control" ></textarea>
                    </div>
                </div>
            <button class="btn" type="submit" name="placeOrderBtn" style="border:none"> Confirm and place order</button>

        </form>
        
    </div>
    
    <?php
        } else {
            echo "<p>Your cart is empty.</p>";
        }
    } else {
        echo "<p>Please log in to view your cart.</p>";
    }
    ?>
</section>


<style>
.swiper {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            
            text-align: center;
        }

/* Stylisation du tableau */
.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.table th, .table td {

    padding: 10px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}

.table th {
    font-size: 15px;
    background-color: #f2f2f2;
}

.table img {
    max-width: 100px;
    height: auto;
}

.table .btn {
    background-color: #dc3545;
    color: #fff;
    border: none;
    border-radius: 3px;
    padding: 5px 10px;
    cursor: pointer;
}

.table .btn i {
    margin-right: 5px;
}

/* Stylisation des colonnes personnalisées */
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

                        /* Style du conteneur principal */
.form-container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f2f2f2;
    border: 1px solid #ccc;
    border-radius: 5px;
}

/* Style du titre */
.heading {
    font-size: 24px;
    text-align: center;
}

/* Style des labels */
.label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
    font-size: 13px;
}

/* Style des champs de saisie */
.form-control {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

/* Style du bouton de soumission */
.submit-button {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

/* Style de la ligne de séparation */
.hr {
    border-top: 1px solid #ccc;
    margin: 20px 0;
}

/* Style du champ de texte "Address" */
textarea.form-control {
    height: 150px;
}

/* Style pour les erreurs de validation (facultatif) */
.error-message {
    color: #ff0000;
    font-size: 14px;
}

/* Style pour les messages de succès (facultatif) */
.success-message {
    color: #00cc00;
    font-size: 14px;
}

            
</style>

        
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

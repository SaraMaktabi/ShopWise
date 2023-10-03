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

        
    <!-- Order Details Page -->
    <section class="featured" id="featured">
        <h1 class="heading"><span>Order Details</span></h1>
        <?php
        if(isset($_GET['order_id'])){
            $order_id = $_GET['order_id'];
            $order = getOrderDetails($order_id); // Implement this function to get order details by order_id
            $orderItems = getOrderItems($order_id); // Implement this function to get order items by order_id

            if(!empty($order) && !empty($orderItems)){ // Check if both order and order items are not empty
        ?>
        <div class="swiper">
            <h2>Order Information</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Order Number</th>
                        <th>Total Price</th>
                        <th>Date</th>
                        <!-- Add more columns for order details here if needed -->
                    </tr>
                </thead>
                <tbody>
                    <tr style="font-size: 15px;" class="card">
                        <td><?= $order['id']; ?></td>
                        <td>$<?= $order['total_price']; ?></td>
                        <td><?= $order['created_at']; ?></td>
                        <!-- Add more table rows for order details here if needed -->
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="swiper">
            <h2>Order Items</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <!-- Add more columns for order item details here if needed -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($orderItems as $item) {
                        echo '<tr>';
                        echo '<td>' . $item['ame'] . '</td>';
                        echo '<td>' . $item['qty'] . '</td>';
                        echo '<td>$' . $item['price'] . '</td>';
                        // Add more table rows for order item details here if needed
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <?php
            } else {
                echo "<p>Order not found or no items in the order.</p>";
            }
        } else {
            echo "<p>Invalid order ID.</p>";
        }
        ?>
    </section>


<style>


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

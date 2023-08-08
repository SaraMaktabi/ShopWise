<?php session_start(); ?>


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
                    <div id="login-btn" class="fas fa-user"></div>
                </div>
            </div> 
            <div class="header-2">
                <nav class="navbar">
                    <a href="#home">Home</a>
                    <a href="#Featured">Featured</a>
                    <a href="categories.php">Categories</a>
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

        


       
    <?php
        // Inclure le fichier de connexion à la base de données
        require_once "connexion.php";

        // Inclure le fichier de traitement du formulaire de connexion
        require_once "login.php";
        
        // Inclure le fichier de traitement du formulaire de création de compte
        require_once "create_account.php";
    ?>
    

     <!--login form-->
        <div class="login-form-container">
            <div id="close-login-btn" class="fas fa-times"></div>
            <form id="login-form" action="create_account.php" method="post" class="active-form">
                <h3>Log in</h3>
                <span>Email</span>
                <input type="email" name="email" class="box" placeholder="Enter your email...">
                <span>Password</span>
                <input type="password" name="password" class="box" id="" placeholder="Enter your password...">
                <div class="checkbox">
                    <input type="checkbox" name="" id="remember-me">
                    <label for="remember-me">Remember me</label>
                </div>
                <!-- Affichage du message d'erreur s'il y en a un -->
                <?php if ($error_message): ?>
                    <p style="color: red;"><?php echo $error_message; ?></p>
                <?php endif; ?>
                <input type="submit" name="login_btn" value="log in"  class="btn">
                <p>Forget password ? <a href="">Click here</a></p>
                <p>Don't have an account? <a href="#" id="show-create-account-form">Create one</a></p>
            </form>
           

            <!--create account-->
            
            <form id="create-account-form" action="create_account.php" method="post" style="display: none;" onsubmit="return validateForm();">
        <h3>Create an Account</h3>
        <span>Username</span>
        <input type="text" name="name" id="username" class="box" placeholder="Enter your username..." required>
        <div id="username-error" class="error-message"></div>
        
        <span>Phone</span>
        <input type="tel" name="phone" id="phone" class="box" placeholder="Enter your phone number..." required>
        <div id="phone-error" class="error-message"></div>
        
        <span>Email</span>
        <input type="email" name="email" id="email" class="box" placeholder="Enter your email..." required>
        <div id="email-error" class="error-message"></div>
        
        <span>Password</span>
        <input type="password" name="password" id="password" class="box" placeholder="Enter your password..." required>
        <div id="password-error" class="error-message"></div>
        
        <span>Confirm Password</span>
        <input type="password" name="cpassword" id="password2" class="box" placeholder="Confirm your password..." required>
        <div id="password2-error" class="error-message"></div>

        <input type="submit" name="register_btn" value="Create Account" class="btn" onclick="return validateForm();">
        <p>Already have an account? <a href="#" id="show-login-form">Log in</a></p>
    </form>

    <script>
        function validateForm() {
            const usernameValue = document.getElementById('username').value.trim();
            const phoneValue = document.getElementById('phone').value.trim();
            const emailValue = document.getElementById('email').value.trim();
            const passwordValue = document.getElementById('password').value.trim();
            const password2Value = document.getElementById('password2').value.trim();
            
            if(usernameValue === '' ) {
                setErrorFor(username,'Username cannot be blank' );
                return false; // Prevent form submission
            } else {
                setSuccessFor(username );
            }
            if (emailValue ==='') {
                setErrorFor(email, 'Email cannot be blank');
                return false; // Prevent form submission
            } else if (!isEmail (emailValue)) {
                setErrorFor(email, 'Not a valid email');
                return false; // Prevent form submission
            } else {
                setSuccessFor(email);
            }
            if (passwordValue === '') {
                setErrorFor(password,'Password cannot be blank');
                return false; // Prevent form submission
            } else {
                setSuccessFor(password);
            }
            if (password2Value === ''){
                setErrorFor(password2, 'Password2 cannot be blank');
                return false; // Prevent form submission
            } else if(passwordValue !== password2Value) {
                setErrorFor(password2, 'Passwords does not match');
                return false; // Prevent form submission
            } else{
                setSuccessFor(password2);
            }

            // Validate other fields (phone, email, password, and password2) similarly

            // Check if there are any errors
            const errors = document.querySelectorAll('.error');
            if (errors.length > 0) {
                return false; // Prevent form submission if there are errors
            }
            return true;
        }

        function setErrorFor(inputId, message) {
            const formControl = document.getElementById(inputId).parentElement;
            const small = formControl.querySelector('small');
            formControl.className = 'form-control error';
            small.innerText = message;
        }

        function setSuccessFor(inputId) {
            const formControl = document.getElementById(inputId).parentElement;
            formControl.className = 'form-control success';
        }

        
    </script>

        


        </div>
        <script>
            document.getElementById("show-create-account-form").addEventListener("click", function() {
                document.getElementById("login-form").style.display = "none";
                document.getElementById("create-account-form").style.display = "block";
            });
        
            document.getElementById("show-login-form").addEventListener("click", function() {
                document.getElementById("create-account-form").style.display = "none";
                document.getElementById("login-form").style.display = "block";
            });
        </script>
        
       




        <!--home section-->
        <section class="home" id="home">
            <div class="row">
                <div class="content">
                    <h1>Shop Now</h1>
                    <p>New Arrival of Fresh Products</p>
                    <a href="#" class="btn">Shop Now</a>
                </div>
                
            </div>
        </section>
        <!--icons section-->
        <div class="icons-container">
            <div class="icons">
                <i class="fas fa-paper-plane"></i>
                <h3>Free Shipping</h3>
                <p>order over $100</p>

            </div>
            <div class="icons">
                <i class="fas fa-lock"></i>
                <h3>Secure payment</h3>
                <p>100 secure payment</p>
                
            </div>
            <div class="icons">
                <i class="fas fa-redo-alt"></i>
                <h3>easy returns</h3>
                <p>10 days returns</p>
            </div>
            <div class="icons">
                <i class="fas fa-headset"></i>
                <h3>24/7 support</h3>
                <p>Contact us anytime</p>
            </div>
        </div>

        <!--Featured section-->
        <section class="featured" id="featured">
    <h1 class="heading"><span>Featured Products</span></h1>
    <div class="swiper featured-slider">
        <div class="swiper-wrapper">
            <?php
            // Include the database connection file
            include('connexion.php');

            // Fetch the data from the database
            $sql = "SELECT image_p, price, ID_PRODUIT FROM produits LIMIT 10"; // Assuming you have 10 featured products
            $result = $conn->query($sql);
            
            // Check if there are any results
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Replace the image source and price with the database values
                    echo '<div class="swiper-slide box">
                            <div class="icons">
                                
                                <a href="#" class="fas fa-heart"></a>
                                <a href="single_prod.php?id=' . $row["ID_PRODUIT"] . '" class="fas fa-eye"></a>
                            </div>
                            <div class="image">
                                <img src="uploads/' . $row['image_p'] . '" alt="' . $row['image_p'] . '">
                            </div>
                            <div class="content">
                                <h3>Featured Products</h3>
                                <div class="price">$' . $row["price"] . '<span>$500</span></div>
                                <a href="#" class="btn">add to cart</a>
                            </div>
                        </div>';
                }
            } else {
                echo "No featured products found in the database.";
            }

            // Close the database connection
            $conn->close();
            ?>
        </div>    
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>   
    </div>
</section>


        

        <!--newsletter section-->
        <section class="newsletter">
            <form action="">
                <h3>Subscribe for latest updates</h3>
                <input type="email" name="" placeholder="Enter your email..." id="" class="box">
                <input type="submit" value="Subscribe" class="btn">
            </form>
        </section>


        <!--arrivals section-->
        <!--<section class="arrivals" id="arrivals">
            <h1 class="heading"><span>New Arrivals</span></h1>
            <div class="swiper arrivals-slider">
                <div class="swiper-wrapper">
                    <a href="#" class="swiper-slide box">
                        <div class="image">
                            <img src="images/prod1.jpg" alt="">
                        </div>
                        <div class="content">
                            <h3>new arrivals</h3>
                            <div class="price">$15.99 <span>$20.99</span></div>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </a>

                    <a href="#" class="swiper-slide box">
                        <div class="image">
                            <img src="images/prod2.jpg" alt="">
                        </div>
                        <div class="content">
                            <h3>new arrivals</h3>
                            <div class="price">$15.99 <span>$20.99</span></div>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </a>

                    <a href="#" class="swiper-slide box">
                        <div class="image">
                            <img src="images/prod3.jpg" alt="">
                        </div>
                        <div class="content">
                            <h3>new arrivals</h3>
                            <div class="price">$15.99 <span>$20.99</span></div>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </a>

                    <a href="#" class="swiper-slide box">
                        <div class="image">
                            <img src="images/prod4.jpg" alt="">
                        </div>
                        <div class="content">
                            <h3>new arrivals</h3>
                            <div class="price">$15.99 <span>$20.99</span></div>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </a>

                    

                    <a href="#" class="swiper-slide box">
                        <div class="image">
                            <img src="images/prod5.jpg" alt="">
                        </div>
                        <div class="content">
                            <h3>new arrivals</h3>
                            <div class="price">$15.99 <span>$20.99</span></div>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </a>

                    <a href="#" class="swiper-slide box">
                        <div class="image">
                            <img src="images/prod6.jpg" alt="">
                        </div>
                        <div class="content">
                            <h3>new arrivals</h3>
                            <div class="price">$15.99 <span>$20.99</span></div>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </a>

                    <a href="#" class="swiper-slide box">
                        <div class="image">
                            <img src="images/prod7.jpg" alt="">
                        </div>
                        <div class="content">
                            <h3>new arrivals</h3>
                            <div class="price">$15.99 <span>$20.99</span></div>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </a>

                    <a href="#" class="swiper-slide box">
                        <div class="image">
                            <img src="images/prod8.jpg" alt="">
                        </div>
                        <div class="content">
                            <h3>new arrivals</h3>
                            <div class="price">$15.99 <span>$20.99</span></div>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </a>

                    <a href="#" class="swiper-slide box">
                        <div class="image">
                            <img src="images/prod9.jpg" alt="">
                        </div>
                        <div class="content">
                            <h3>new arrivals</h3>
                            <div class="price">$15.99 <span>$20.99</span></div>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </a>

                    <a href="#" class="swiper-slide box">
                        <div class="image">
                            <img src="images/prod10.jpg" alt="">
                        </div>
                        <div class="content">
                            <h3>new arrivals</h3>
                            <div class="price">$15.99 <span>$20.99</span></div>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="swiper arrivals-slider">
                    <div class="swiper-wrapper">
                        <a href="#" class="swiper-slide box">
                            <div class="image">
                                <img src="images/prod1.jpg" alt="">
                            </div>
                            <div class="content">
                                <h3>new arrivals</h3>
                                <div class="price">$15.99 <span>$20.99</span></div>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                        </a>
    
                        <a href="#" class="swiper-slide box">
                            <div class="image">
                                <img src="images/prod2.jpg" alt="">
                            </div>
                            <div class="content">
                                <h3>new arrivals</h3>
                                <div class="price">$15.99 <span>$20.99</span></div>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                        </a>
    
                        <a href="#" class="swiper-slide box">
                            <div class="image">
                                <img src="images/prod3.jpg" alt="">
                            </div>
                            <div class="content">
                                <h3>new arrivals</h3>
                                <div class="price">$15.99 <span>$20.99</span></div>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                        </a>
    
                        <a href="#" class="swiper-slide box">
                            <div class="image">
                                <img src="images/prod4.jpg" alt="">
                            </div>
                            <div class="content">
                                <h3>new arrivals</h3>
                                <div class="price">$15.99 <span>$20.99</span></div>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                        </a>
    
                        
    
                        <a href="#" class="swiper-slide box">
                            <div class="image">
                                <img src="images/prod5.jpg" alt="">
                            </div>
                            <div class="content">
                                <h3>new arrivals</h3>
                                <div class="price">$15.99 <span>$20.99</span></div>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                        </a>
    
                        <a href="#" class="swiper-slide box">
                            <div class="image">
                                <img src="images/prod6.jpg" alt="">
                            </div>
                            <div class="content">
                                <h3>new arrivals</h3>
                                <div class="price">$15.99 <span>$20.99</span></div>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                        </a>
    
                        <a href="#" class="swiper-slide box">
                            <div class="image">
                                <img src="images/prod7.jpg" alt="">
                            </div>
                            <div class="content">
                                <h3>new arrivals</h3>
                                <div class="price">$15.99 <span>$20.99</span></div>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                        </a>
    
                        <a href="#" class="swiper-slide box">
                            <div class="image">
                                <img src="images/prod8.jpg" alt="">
                            </div>
                            <div class="content">
                                <h3>new arrivals</h3>
                                <div class="price">$15.99 <span>$20.99</span></div>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                        </a>
    
                        <a href="#" class="swiper-slide box">
                            <div class="image">
                                <img src="images/prod9.jpg" alt="">
                            </div>
                            <div class="content">
                                <h3>new arrivals</h3>
                                <div class="price">$15.99 <span>$20.99</span></div>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                        </a>
    
                        <a href="#" class="swiper-slide box">
                            <div class="image">
                                <img src="images/prod10.jpg" alt="">
                            </div>
                            <div class="content">
                                <h3>new arrivals</h3>
                                <div class="price">$15.99 <span>$20.99</span></div>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                        </a>
                    </div>
            </div>
        </section>-->



        <!--deal section-->
        <section class="deal">
            <div class="content">
                <h3>Deal of The Day</h3>
                <h1>Upto 50% Off</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus ipsum odio laudantium rerum temporibus consequuntur eius sint, cupiditate aspernatur veniam. Atque sunt dignissimos inventore praesentium perferendis voluptas. Corporis, eius dicta!</p>
                <a href="#" class="btn">Shop Now</a>    
            </div>
            <div class="image">
                <img src="images/dealp.jpg" alt="">
            </div>
        </section>


        <!--reviews section-->
        <section class="reviews" id="reviews">
            <h1 class="heading"><span>Client's Reviews</span></h1>
            <div class="swiper reviews-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide box">
                        <img src="images/review1.jpg" alt="">
                        <h3>John deo</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex dolores, officiis quo molestiae perfere.</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>

                    <div class="swiper-slide box">
                        <img src="images/review2.jpg" alt="">
                        <h3>John deo</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex dolores, officiis quo molestiae perfere.</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>

                    <div class="swiper-slide box">
                        <img src="images/review3.jpg" alt="">
                        <h3>John deo</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex dolores, officiis quo molestiae perfere.</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>

                    <div class="swiper-slide box">
                        <img src="images/review4.jpg" alt="">
                        <h3>John deo</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex dolores, officiis quo molestiae perfere.</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                    <div class="swiper-slide box">
                        <img src="images/review5.jpg" alt="">
                        <h3>John deo</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex dolores, officiis quo molestiae perfere.</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                    <div class="swiper-slide box">
                        <img src="images/review6.jpg" alt="">
                        <h3>John deo</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex dolores, officiis quo molestiae perfere.</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
            </section>

        </div>


        <!--footer section-->
        <section class="footer">
            <div class="box-container">
                <div class="box">
                    <h2>ShopWise</h2>
                    <p>Lorem ipsum dolor sit amet,  aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in vo
                        luptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                         mollit anim id est laborum</p>
                </div>
                <div class="box">
                    <h2>Links</h2>
                    <a href=""><i class="fas fa-arrow-right"></i>home</a>
                    <a href=""><i class="fas fa-arrow-right"></i>Featured</a>
                    <a href=""><i class="fas fa-arrow-right"></i>Arrivals</a>
                    <a href=""><i class="fas fa-arrow-right"></i>Reviews</a>
                </div>
                <div class="box">
                    <h2>Support</h2>
                    <a href=""><i class="fas fa-arrow-right"></i>Products</a>
                    <a href=""><i class="fas fa-arrow-right"></i>Help & Support</a>
                    <a href=""><i class="fas fa-arrow-right"></i>FAQ</a>
                    <a href=""><i class="fas fa-arrow-right"></i>Reviews</a>
            
                </div>
                <div class="box">
                    <h2>Contact info</h2>
                    <a href=""><i class="fas fa-phone"></i>05 22 00 00 00</a>
                    <a href=""><i class="fas fa-phone"></i>05 22 11 11 11</a>
                    <a href=""><i class="fas fa-envelope"></i>Shopwise9@gmail.com</a>
                    <img src="images/worldmap.png" class="map" alt="">
                </div>
            </div>
            <div class="share">
                <a href="" class="fab fa-facebook"></a>
                <a href="" class="fab fa-twitter"></a>
                <a href="" class="fab fa-instagram"></a>
                <a href="" class="fab fa-linkedin"></a>
                <a href="" class="fab fa-pinterest"></a>
            </div>
            
        </section>











        
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>       
    <!--link to js-->
    <script src="script.js"></script>
    <script src="assets/js/jquery-3.7.0.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

</body>
</html>
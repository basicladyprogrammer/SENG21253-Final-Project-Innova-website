<header>
<div class="myHeader">
<div class="top-bar">
        
        <ul class="top-link-container">
        <li class="link-item"><a href="index.php" class="link">Home</a></li>   
        <li class="link-item"><a href="about.php" class="link">About us</a></li>
    <li class="link-item"><a href="users_area/user_login.php" class="link">Hello, sign in</a></li>
            <li class="link-item"><a href="#" class="link">Whishlist</a></li>          
</ul>
        </div>

<nav class="navbar">
        <div class="nav">
                <a href="index.php" class=""><img src="images/logo_innova.png" id="brand-logo" alt="logo" ></a>
                <div class="nav-items">
                
                    <div class="search">

                        <form id="form1" role="search" action="search_product.php" method="get">
                            <input type="text" class="search-box" placeholder="search product" aria-label="Search" name="search_data">
                            <!-- <input type="submit" value="Search" class="search-btn" name="search_data_product" placeholder="search"> -->


                        <!-- <form class="d-flex" role="search" action="search_product.php" method="get">
                            <input class="form-control me-2" type="search" placeholder="Search" 
                            aria-label="Search" name="search_data">
                            <input type="submit" value="Search" class="btn btn-outline-light"
                            name="search_data_product"> -->
                        </form>
                        <button class="search-btn" name="search_data_product"  type="submit" form="form1" value="Submit">search</button>
                    
                    </div>
                <a href="users_area\profile.php"><img src="images\New folder\avatar.png" alt="user"></a>
                
                    <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup>
                        <?php 
                            cart_item(); 
                        ?>
                        </sup>
                    </a>

                </div>
            </div>
        <ul class="links-container">
            <!-- <li class="link-item"><a href="#" class="link">home</a></li>
            <li class="link-item"><a href="#" class="link">Laptops & desktops</a></li>
            <li class="link-item"><a href="#" class="link">Components</a></li>
            <li class="link-item"><a href="#" class="link">monitors</a></li>
            <li class="link-item"><a href="#" class="link">accessories</a></li>
            <li class="link-item"><a href="#" class="link">gaming</a></li>
            <li class="link-item"><a href="#" class="link">brands</a></li> -->
            <li class="link-item">
                <?php
                //calling function
                    getcategories();
                ?></li>
        </ul>
    </nav>
</div>  
</header>
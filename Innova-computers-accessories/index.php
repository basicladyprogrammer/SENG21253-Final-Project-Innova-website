<?php
    include 'connect.php';
    include 'functions/common_function.php';
?>
<html>
    <head>
    <link href="css/home.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/header.js"></script>
    <script src="js/home.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" 
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
     <!-- Vendor Script -->
     <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
    
    </head>

    <body>
     <?php include 'const/header.php'; ?> 
     <?php
          cart();
        ?>
    
        <!--  -->


        <div id="slider">
		<figure>
			<!-- <img src="images\wallpapersden.com_computer-hardware-monitor_wxl.jpg">
			<img src="images/3580ff8c34ba82247242d43963de15f6.jpg">
			<img src="images/Laptop-Asus-Wallpaper-For-Desktop.jpg"> -->
			<img src="images\B8baPr943ReNzMbJ6ZKRSF.jpg">
            <img src="images\High_resolution_wallpaper_background_ID_77701417647.jpg">
            <img src="images\FZPo4InXEAAFeF0.jpg">
            <img src="images\96-965189_hd-wallpaper-msi-gaming-laptop.jpg">
            <img src="images\mb_z170gm.jpg">
		</figure>
	</div>

 
    <section class="product">
        <h2 class="product-category"> products</h2>
        <!-- <button class="pre-btn"><img src="images/New folder/arrow.png" alt=""></button>
        <button class="nxt-btn"><img src="images/New folder/arrow.png" alt=""></button>
         -->
        <div class="wrap">
    <!-- fourth child -->
    <!-- <div class="row px-1">
          <div class="col-md-10"> -->
        <!-- <div class="product-card">
            <div class="product-info"> -->
            <!-- products -->
            <!-- <div class="row"> -->
            <!--fetching products-->
            <?php
            //calling function
            getproductcards();
            get_unique_categories();
            // $ip = getIPAddress();  
            // echo 'User Real IP Address - '.$ip; 
            ?>
              
              <!--row end-->
            <!-- </div> -->
            <!--col end-->
          <!-- </div> -->
        </div>
        </section>

            <div class="card-body">
            

    <div class="card-container">
        <div class="imgBx">
            <img src="images\Card\MX3X2 copy.png" alt="Nike Jordan Proto-Lyte Image">
        </div>
        <div class="details">
            <div class="content">
                <h2>Beats Solo3 <br>
                    <span>Wireless on-ear headphones</span>
                </h2>
                <p>
                Beats Solo3 Wireless supports spatial audio for immersive music – delivering a surround sound experience that you can take with you anywhere
                <br>Beats Solo3 Wireless delivers premium playback with fine-tuned acoustics that maximize clarity breadth, and balance.
                </p>
                <p class="product-colors">Available Colors:
                    <span class="black active" data-color-primary="#000" data-color-sec="#212121" data-pic="images\Card\MX3X2 copy.png"></span>
                    <span class="red" data-color-primary="#7E021C" data-color-sec="#bd072d" data-pic="images\Card\MX412 copy.png"></span>
                    <span class="orange" data-color-primary="#CE5B39" data-color-sec="#F18557" data-pic="images\Card\MX472 copy.png"></span>
                </p>
                <h3>Rs. 12,800</h3>
                <button>Buy Now</button>
            </div>
        </div>
    </div>

    


    <script>
        // Change The Picture and Associated Element Color when Color Options Are Clicked.
        $(".product-colors span").click(function() {
            $(".product-colors span").removeClass("active");
            $(this).addClass("active");
            $(".active").css("border-color", $(this).attr("data-color-sec"))
            $("card-body").css("background", $(this).attr("data-color-primary"));
            $(".content h2").css("color", $(this).attr("data-color-sec"));
            $(".content h3").css("color", $(this).attr("data-color-sec"));
            $(".card-container .imgBx").css("background", $(this).attr("data-color-sec"));
            $(".card-container .details button").css("background", $(this).attr("data-color-sec"));
            $(".imgBx img").attr('src', $(this).attr("data-pic"));
        });
    </script>

            </div>
            
            <div class="feedback">
          <!-- <h2 class="product-category">Warrenty...</h2> -->
            <!-- Categories to be displayed -->
            <ul class="cards">
                <li>
                    <a href="" class="card">
                    <img src="images\feedback\Green Modern Check Shield Logo Template (1).jpg" class="card__image" alt="" />
                    <div class="card__overlay">
                        <div class="card__header">
                        <svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>                     
                        <img class="card__thumb" src="images\feedback\WhatsApp Image 2023-01-17 at 22.41.40 (2).jpeg" alt="" />
                        <div class="card__header-text">
                            <h3 class="card__title">SECURITY</h3>            
                            <span class="card__status">Jessica Parker</span>
                        </div>
                        </div>
                        <p class="card__description">In case of faulty products, we have an upstanding warranty and claim procedures to make sure that your requirements are met in minimum time loss as possible.</p>
                    </div>
                    </a>      
                </li>
                <li>
                    <a href="" class="card">
                    <img src="images\feedback\Green Modern Check Shield Logo Template (2).jpg" class="card__image" alt="" />
                    <div class="card__overlay">        
                        <div class="card__header">
                        <svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>                 
                        <img class="card__thumb" src="images\feedback\WhatsApp Image 2023-01-17 at 22.41.40 (1).jpeg" alt="" />
                        <div class="card__header-text">
                            <h3 class="card__title">CUSTOM ORDERS</h3>
                            <span class="card__status">J. Polly</span>
                        </div>
                        </div>
                        <p class="card__description">In case your requirements supersedes what the local market has to offer, we will provide you with assistance to meet these requirements.</p>
                    </div>
                    </a>
                </li>
                <li>
                    <a href="" class="card">
                    <img src="images\feedback\Green Modern Check Shield Logo Template (3).jpg" class="card__image" alt="" />
                    <div class="card__overlay">
                        <div class="card__header">
                        <svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>                     
                        <img class="card__thumb" src="images\feedback\WhatsApp Image 2023-01-17 at 22.41.39.jpeg" alt="" />
                        <div class="card__header-text">
                            <h3 class="card__title">24 HOUR SERVICE</h3>
                            <span class="card__status">Aaron Canterbury</span>
                        </div>
                        </div>
                        <p class="card__description">Perfect for long office days. My eyes feel so much better now</p>
                    </div>
                    </a>
                </li>
                <li>
                    <a href="" class="card">
                    <img src="images\feedback\Green Modern Check Shield Logo Template (4).jpg" class="card__image" alt="" />
                    <div class="card__overlay">
                        <div class="card__header">
                        <svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>                 
                        <img class="card__thumb" src="images\feedback\WhatsApp Image 2023-01-17 at 22.41.39 (1).jpeg" alt="" />
                        <div class="card__header-text">
                            <h3 class="card__title">HOME DELIVERY</h3>
                            <span class="card__status">kim Cattrall</span>
                        </div>          
                        </div>
                        <p class="card__description">To further facilitate your access to your needs, we offer to deliver to meet your requirements straight to where you live within Sri Lankan borders.</p>
                    </div>
                    </a>
                </li>    
            </ul>
          </div>
        <!-- <script>
            window.onscroll = function() {myFunction()};

            var header = document.getElementById("myHeader");
            var sticky = header.offsetTop;

            function myFunction() {
            if (window.pageYOffset > sticky) {
                header.classList.add("sticky");
            } else {
                header.classList.remove("sticky");
            }
            }
        </script> -->


    <?php include 'const/footer.php'; ?> 
    
</body>
</html>
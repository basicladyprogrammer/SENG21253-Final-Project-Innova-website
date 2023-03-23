<?php
    include 'connect.php';
    include 'functions/common_function.php';
?>
<html>
    <head>
    <link href="css/home.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/header.js"></script>
    <script>const productImages = document.querySelectorAll(".product-images img");
            const productImagesSlide = document.querySelector(".image-slider");

            let activeImageSlide = 0;

            productImages.forEach((item,i)=>{
                item.addEventListener('click',()=>{
                    productImages[activeImageSlide].classList.remove('active');
                    item.classList.add('active');
                    productImagesSlide.style.backgroundImage = `url('${item.src}')`
                    activeImageSlide =i;
                })
            })


            //toggle size button
            const colorBtns = document.querySelectorAll('.color-radio-btn');
            let checkedBtn =0;

            colorBtns.forEach((item,i)=>{
                item.addEventListener('click', () =>{
                    colorBtns[checkedBtn].add('check');
                    checkedBtn=i;
                })
})</script>
    <link href="css/product_details.css" rel="stylesheet" type="text/css">
    
    </head>

    <body>
     <?php include 'const/header.php'; ?> 

            
     <div class="product-container">
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
            view_details();
            get_unique_categories();
            // $ip = getIPAddress();  
            // echo 'User Real IP Address - '.$ip; 
            ?>
              
              <!--row end-->
            <!-- </div> -->
            <!--col end-->
          <!-- </div> -->
          <script src="js\product_details.js"></script>
        </div>




     <?php include 'const/footer.php'; ?> 
    
    </body>
</html>
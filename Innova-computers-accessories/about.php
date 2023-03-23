
<?php
    include 'connect.php';
    include 'functions/common_function.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About us</title>
    <link rel="stylesheet" type="text/css" href="css/about.css"
          href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link href="css/home.css" rel="stylesheet" type="text/css">
</head>
<body>

 <!-- Header -->
 <?php include 'const/header.php'; ?>

<!-- breadcrumb -->
<!-- Header Section End -->


<!-- About Section Begin -->
<section class="about">
    <div class="container">
        <div class="about__pic">
                <img src="images/about/backgroundpic.png" class="container-fluid" alt="">
        </div>
        <div class="row">
                <div class="about__item ">
                    <h4>Who We Are ?</h4>
                    <p>We're a company that specializes in providing computer solutions to help you
                        achieve your next big idea or strategy. We are still growing our business, and we anticipate
                        that our website will soon be your one-stop shop for all laptop and computer needs. If you have any
                        questions, please send us an email or give us a call; we would be delighted to hear from you.</p>
                </div>
                <div class="about__item">
                    <h4>What We Do ?</h4>
                    <p>We understand your computer/computer hardware requirements and want to make things as simple as possible
                        for you. You can buy in-stock things and have them delivered in two days, or you can pre-order
                        items that aren't in stock and we'll do our best to get them for you.</p>
                </div>
           
                <div class="about__item">
                    <h4>Why Choose Us?</h4>
                    <p>Innova understands how busy we all are, which is why we are giving a free delivery service
                        islandwide. Innova is committed to being ahead of the competition, which means we provide the
                        best products, as well as a variety of other unique services. Come to Innova the next time
                        you need a laptop or a Computer and experience the difference.</p>
                </div>
        </div>
    </div>
</section>
<!-- About Section End -->


<!-- Brand Section Begin -->
<section class="brands">
    <div class="container">
                <div class="section-title">
                    <h2>Our Brands</h2>
                </div>
        <div class="row">
            <a href="#" class="brand_logo"><img src="images/brand/Dell.png" alt=""></a>
            <a href="#" class="brand_logo"><img src="images/brand/hp.png" alt=""></a>
            <a href="#" class="brand_logo"><img src="images/brand/apple.png" alt=""></a>
        </div>
        <div class="row">

            <a href="#" class="brand_logo"><img src="images/brand/asus.png" alt=""></a>
            <a href="#" class="brand_logo"><img src="images/brand/kingston.png" alt=""></a> 
        </div>
    </div>
</section>
<!-- brand Section End -->




<!-- Team Section Begin -->
<section class="team">
    <div class="container">
                <div class="section-title">
                    <h2>Meet Our Team</h2>
                </div>
        <div class="row">
                <div class="team__item">
                    <img src="images/about/team-1.jpeg" alt="">
                    <h4>Hashin</h4>
                    <span>Web Dev</span>
                </div>
                <div class="team__item">
                    <img src="images/about/team-2.jpeg" alt="">
                    <h4>Ramesh</h4>
                    <span>Web Dev</span>
                </div>
                <div class="team__item">
                    <img src="images/about/team-3.jpeg" alt="">
                    <h4>Vijitha</h4>
                    <span>Web Dev</span>
                </div>
                <div class="team__item">
                    <img src="images/about/team-4.jpeg" alt="">
                    <h4>Anat</h4>
                    <span>Web Dev</span>
                </div>
                <div class="team__item">
                    <img src="images/about/team-5.jpeg" alt="">
                    <h4>Pavi</h4>
                    <span>Web Dev</span>
                </div>
        </div>
    </div>
</section>
<!-- Team Section End -->





<!-- Footer Section -->
<?php include 'const/footer.php'; ?>


</body>
</html>

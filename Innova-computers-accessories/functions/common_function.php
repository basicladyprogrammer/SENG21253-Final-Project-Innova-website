<?php

//including connect file
include('C:\wamp64\www\innova-computer accessories\connect.php');



//getting products cards
function getproductcards(){
  global $con;

  //condition to check isset or not
  if(!isset($_GET['category'])){
      
  $select_query="Select * from products order by rand() LIMIT 0,9";
          $result_query=mysqli_query($con,$select_query);
          while($row=mysqli_fetch_assoc($result_query)){
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_description=$row['product_description'];
            $product_keywords=$row['product_keywords'];
            $product_image1=$row['product_image1'];
            $category_id=$row['category_id'];
            $product_price=$row['product_price'];
            echo "<div class='product-card'>
            <div class='product-info'>
                <h2 class='product-brand'>$product_title</h2>
                <p class='product-short-des'>$product_description</p>
                <span class='price'>Rs.$product_price</span><span class='actual-price'>$product_price</span>
            </div>
            <div class='product-image'>
                <span class='discount-tag'>20% off</span>
                <a href='index.php?add_to_cart=$product_id' ><button class='card-btn'>add to cart</button></a>
                    <a href='product_details.php?product_id=$product_id' ><img src='admin_area\upload_images/$product_image1' class='product-thumb' alt=''></a>
                  
            </div>
            
        </div>";
          }
  }
}


//getting unique categories
function get_unique_categories(){
    global $con;

    //condition to check isset or not
    if(isset($_GET['category'])){
    $category_id=$_GET['category'];
    $select_query="Select * from products where category_id=$category_id";
            $result_query=mysqli_query($con,$select_query);
            $num_of_rows=mysqli_num_rows($result_query);
            if($num_of_rows==0){
                echo "<h2 class='text-center text-danger'>No Stock for this category</h2>";
            }
            while($row=mysqli_fetch_assoc($result_query)){
              $product_id=$row['product_id'];
              $product_title=$row['product_title'];
              $product_description=$row['product_description'];
              $product_keywords=$row['product_keywords'];
              $product_image1=$row['product_image1'];
              $category_id=$row['category_id'];
              $product_price=$row['product_price'];
              echo "<div class='product-card'>
              <div class='product-info'>
                  <h2 class='product-brand'>$product_title</h2>
                  <p class='product-short-des'>$product_description</p>
                  <span class='price'>$product_price</span><span class='actual-price'>$product_price</span>
              </div>
              <div class='product-image'>
                  
                  <a href='index.php?add_to_cart=$product_id' ><button class='card-btn'>add to cart</button></a>
                    <a href='product_details.php?product_id=$product_id' ><img src='admin_area\upload_images/$product_image1' class='product-thumb' alt=''></a>
                  
                </div>
              
          </div>";
            }
    }
}

// Edited

//displaying categories in header nav
function getcategories(){
    global $con;
    $select_cat="select * from categories";
                $result_cat=mysqli_query($con,$select_cat);
                while($row_data=mysqli_fetch_assoc($result_cat)){
                  $cat_title=$row_data['category_title'];
                  $cat_id=$row_data['category_id'];
                  echo "
                  <a href='category_display.php?category=$cat_id' class='link'>$cat_title</a>
                ";
                }
}

function getcategories_footer(){
  global $con;
  $select_cat="select * from categories";
              $result_cat=mysqli_query($con,$select_cat);
              while($row_data=mysqli_fetch_assoc($result_cat)){
                $cat_title=$row_data['category_title'];
                $cat_id=$row_data['category_id'];
                echo "
                <a href='category_display.php?category=$cat_id' class='footer-link'>$cat_title</a>
              ";
              }
}

//view details functions
// function view_detail(){
//     global $con;

//     //condition to check isset or not
//     if(isset($_GET['product_id'])){
//     if(!isset($_GET['category'])){  
//         $product_id=$_GET['product_id'];
//         $select_query="Select * from products where product_id='$product_id'";
//             $result_query=mysqli_query($con,$select_query);
//             while($row=mysqli_fetch_assoc($result_query)){
//               $product_id=$row['product_id'];
//               $product_title=$row['product_title'];
//               $product_description=$row['product_description'];
//               $product_keywords=$row['product_keywords'];
//               $product_image1=$row['product_image1'];
//               $product_image2=$row['product_image2'];
//               $category_id=$row['category_id'];
//               $product_price=$row['product_price'];
//               echo "
//               <div class='col-md-4'>
//                     <!--card-->
//                     <div class='card'>
//                   <img src='./admin_area/upload_images/$product_image1' class='card-img-top' alt='$product_title'>
//                   <div class='card-body'>
//                     <h5 class='card-title'>$product_title</h5>
//                     <p class='card-text'>$product_description</p>
//                     <p class='card-text'>$product_price</p>
//                     <a href='index.php?add_to_cart=$product_id' class='btn btn-danger'>Add to cart</a>
//                     <a href='index.php' class='btn btn-secondary'>Go Home</a>
//                   </div>
//                 </div>
//                 </div>
//                 <div class='col-md-8'>
//                     <!--related images-->
//                     <div class='row'>
//                         <div class='col-md-12'>
//                             <h4 class='text-center text-danger mb-5'>Related products</h4>
//                         </div>
//                         <div class='col-md-6'>
//                             <img src='./admin_area/upload_images/$product_image2' class='card-img-top' alt='$product_title'>
//                         </div>
//                     </div>
//                 </div>";
//             }
//     }  
// }
// }

//view details functions
function view_details(){
  global $con;

  //condition to check isset or not
  if(isset($_GET['product_id'])){
  if(!isset($_GET['category'])){  
      $product_id=$_GET['product_id'];
      $select_query="Select * from products where product_id='$product_id'";
          $result_query=mysqli_query($con,$select_query);
          while($row=mysqli_fetch_assoc($result_query)){
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_description=$row['product_description'];
            $product_keywords=$row['product_keywords'];
            $product_image1=$row['product_image1'];
            $product_image2=$row['product_image2'];
            $category_id=$row['category_id'];
            $product_price=$row['product_price'];
            echo "
            <section class='product-details'>
                <div class='image-slider'>
                    <div class='product-images'>
                        <img src='admin_area/upload_images/$product_image1' class='active' alt=''>
                        <img src='admin_area/upload_images/$product_image2' class='' alt=''>
                       
            
                    </div>
                </div>
                <div class='details'>
                    <h2 class='product-brand'>$product_title</h2>
                    

                    <span class='product-price'>Rs.$product_price</span>
                    
                   

                    

                    
                    <a href='index.php?add_to_cart=$product_id' class=''>
                      <button class='btn cart-btn'>add to cart</button>
                    </a>
                    <a href='users_area/checkout.php' class=''>
                    <button class='btn'>Buy</button></a>
                </div>
             </section>
    
              <section class='deatils-des'>
                  <h2 class='heading'>Description</h2> 
                  <p class='des'>$product_description</p>
              </section>
              <style>
              .image-slider{
                width:650px;
                height: 500px;
                position: relative;
                background-image: url('admin_area/upload_images/$product_image1');
                background-size: cover;
            }
            </style>
              ";
          }
  }  
}
}



//cart function
function cart(){
    if(isset($_GET['add_to_cart'])){
        global $con;//because we are having it inside file
        $get_ip_address = getIPAddress();  
        $get_product_id=$_GET['add_to_cart'];
        $select_query="select * from cart_details where ip_address='$get_ip_address' and 
        product_id=$get_product_id";
        $result_query=mysqli_query($con,$select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows>0){
            echo "<script>alert('This item is already present inside the cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }else{
            $insert_query="insert into cart_details (product_id,ip_address,quantity) values 
            ($get_product_id,'$get_ip_address',0)";
            $result_query=mysqli_query($con,$insert_query);
            echo "<script>alert('Item is added to the cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";


        }

    }
}
//brands
function getBrands(){
  global $con;
  $select_brands = "select * from brands";
  $result_brands = mysqli_query($con,$select_brands);
  // $row_data = mysqli_fetch_assoc($result_brands);
  // echo $row_data['brand_title'];
  while($row_data = mysqli_fetch_assoc($result_brands)){
      $brand_title = $row_data['brand_title'];
      $brand_id = $row_data['brand_id'];
      echo "
          <li class='nav-item'>
          <a href='category_display.php?brand=$brand_id' class='footer-link'>$brand_title</a>
          </li>";
  }
}


//--function to get cart item number 
function cart_item(){
  if(isset($_GET['add_to_cart'])){
      global $con;//because we are having it inside file
      $get_ip_address = getIPAddress();
      $select_query="select * from cart_details where ip_address='$get_ip_address'";
      $result_query=mysqli_query($con,$select_query);
      $count_cart_items=mysqli_num_rows($result_query);
  }else{
      global $con;//because we are having it inside file
      $get_ip_address = getIPAddress();
      $select_query="select * from cart_details where ip_address='$get_ip_address'";
      $result_query=mysqli_query($con,$select_query);
      $count_cart_items=mysqli_num_rows($result_query);
  }
  echo $count_cart_items;
}


//get ip address function
function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  

//getting all products
function get_all_products(){
  global $con;

  //condition to check isset or not
  if(!isset($_GET['category'])){
      
  $select_query="Select * from products order by rand()";
          $result_query=mysqli_query($con,$select_query);
          while($row=mysqli_fetch_assoc($result_query)){
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_description=$row['product_description'];
            $product_keywords=$row['product_keywords'];
            $product_image1=$row['product_image1'];
            $category_id=$row['category_id'];
            $product_price=$row['product_price'];
            echo "<div class='col-md-4 mb-2'>
              <div class='card'>
                <img src='admin_area\upload_images$product_image1' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                  <h5 class='card-title'>$product_title</h5>
                  <p class='card-text'>$product_description</p>
                  <p class='card-text'>$product_price</p>
                  <a href='index.php?add_to_cart=$product_id' class='btn btn-danger'>Add to cart</a>
                  <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                </div>
              </div>
            </div>";
          }
  }
}

//total price function
function total_cart_price(){
  global $con;
  $get_ip_address = getIPAddress(); 
  $total_price=0; 
  $cart_query="select * from cart_details where ip_address='$get_ip_address'";
  $result=mysqli_query($con,$cart_query);
  while($row=mysqli_fetch_array($result)){
    $product_id=$row['product_id'];
    $select_products="select * from products where product_id='$product_id'";
    $result_products=mysqli_query($con,$select_products);
    while($row_product_price=mysqli_fetch_array($result_products)){
      $product_price=array($row_product_price['product_price']);
      $product_values=array_sum($product_price);
      $total_price+=$product_values;
    }
  }
  echo $total_price;
}

//searching products function
function search_product(){
  global $con;
  if(isset($_GET['search_data_product'])){
      $search_data_value=$_GET['search_data'];
      $search_query="Select * from products where product_keywords LIKE '%$search_data_value%'";
          $result_query=mysqli_query($con,$search_query);
          $num_of_rows=mysqli_num_rows($result_query);
          if($num_of_rows==0){
              echo "<h2 class='text-center text-danger'>
              No results match</h2>";
          }
          while($row=mysqli_fetch_assoc($result_query)){
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_description=$row['product_description'];
            $product_keywords=$row['product_keywords'];
            $product_image1=$row['product_image1'];
            $category_id=$row['category_id'];
            $product_price=$row['product_price'];
            echo "<div class='product-card'>
            <div class='product-info'>
                <h2 class='product-brand'>$product_title</h2>
                <p class='product-short-des'>$product_description</p>
                <span class='price'>$product_price</span><span class='actual-price'>$product_price</span>
            </div>
            <div class='product-image'>
                
                <a href='index.php?add_to_cart=$product_id' ><button class='card-btn'>add to cart</button></a>
                  <a href='product_details.php?product_id=$product_id' ><img src='admin_area\upload_images/$product_image1' class='product-thumb' alt=''></a>
                
              </div>
            
        </div>";
          }
      }
}

//-- get user order details
function get_user_order_details(){
  global $con;
  $user_name=$_SESSION['username'];
  $get_details="Select * from user_table where user_name='$user_name'";
  $result_query=mysqli_query($con,$get_details);
  while($row_query=mysqli_fetch_array($result_query)){
      $user_id=$row_query['user_id'];
      if(!isset($_GET['edit_account'])){
          if(!isset($_GET['my_orders'])){
              if(!isset($_GET['delete_account'])){
                  $get_orders="Select * from user_orders where user_id=$user_id and order_status='pending'";
                  $result_orders_query=mysqli_query($con,$get_orders);
                  $row_count=mysqli_num_rows($result_orders_query);
                  if($row_count>0){
                      echo "<h3 class='text-center text-success mt-5 mb-2'>You have <span class='text-danger'>$row_count</span> pending orders</h3>
                      <p class='text-center'><a href='profile.php?my_orders' class='text-dark'>Order Details</a></p>";
                  }else{
                      echo "<h3 class='text-center text-success mt-5 mb-2'>You have Zero pending orders</h3>
                      <p class='text-center'><a href='../index.php' class='text-dark'>Explore products</a></p>";
                  }
              }
          }
      }
  }
}

?>


<!-- <a onclick='alertw($product_title)' ><img src='image/$product_image1' class='product-thumb' alt=''></a>
                  <button class='card-btn'>add to cart</button> -->
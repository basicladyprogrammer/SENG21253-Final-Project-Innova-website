
<h2>All products</h2>
<div class="container">
        <div class="row">
            <form action="" method="post">
            <table class="table table-bordered text-center">

<div class='table-wrapper'>
<table class="fl-table">
    <thead class="fl-table">
        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Product image</th>
            <th>Product Price</th>
            <th>Total sold</th>
            <th>Status</th>
            <th>Update</th>
            <th>Delete</th>

        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $get_products="select * from products";
        $result=mysqli_query($con,$get_products);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $product_id=$row['product_id'];
            $product_name=$row['product_title'];
            $product_image=$row['product_image1'];
            $product_price=$row['product_price'];
            $status=$row['status'];
            $number++;
            ?>

            
            <tr class='text-center'>
            <td><?php echo $number; ?></td>
            <td><?php echo $product_name; ?></td>
            <td><img src='./upload_images/<?php echo $product_image; ?>' alt='' class='product_image'></td>
            <td><?php echo $product_price; ?></td>
            <td><!--?php
            $get_count="select * from orders_pending where product_id=$product_id";
            $result_count=mysqli_query($con,$get_count);
            $rows_count=mysqli_num_rows($result_count);
            echo $rows_count;
            ?-->0</td>
            <td><?php echo $status; ?></td>
            <td><a href='index.php?update_products' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='index.php?delete_product=<?php echo $product_id ?>' class='text-light' data-toggle='modal' data-target='#exampleModal'><i class='fa-solid fa-trash'></i></a></td>
        </tr>";
        <?php
        }
        ?>
        
    </tbody>

</table>
    </div>
    </div>
    </div>
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h4>Are you sure you want to delete this?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"> <a href="./index.php?view_product" class="text-light text-decoration-none"> No </a></button>
        <button type="button" class="btn btn-primary"> <a href='index.php?delete_product=<?php echo $product_id ?>' class='text-light text-decoration-none'>Yes</a> </button>
      </div>
    </div>
  </div>
</div>
<h3 class="text-center text-success">All Orders</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-info text-center">
            <!-- php code -->
            <?php
                $get_orders="Select * from user_orders";
                $result=mysqli_query($con,$get_orders);
                $row_count=mysqli_num_rows($result);
                if($row_count==0){
                    echo "<h2 class='text-danger text-center mt-5'>No orders yet</h2>";
                }else{
                    echo "<tr>
                    <th>Slno</th>
                    <th>Due Amount</th>
                    <th>Invoice number</th>
                    <th>Total product</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody class='bg-secondary text-light'>
                    ";
                    $number=0;
                    while($row=mysqli_fetch_assoc($result)){
                        $order_id=$row['order_id'];
                        $user_id=$row['user_id'];
                        $due_amount=$row['amount_due'];
                        $invoice_number=$row['invoice_number'];
                        $total_products=$row['total_products'];
                        $order_date=$row['order_date'];
                        $order_status=$row['order_status'];
                        $number++;
                ?>
                        <tr class='text-center'>
                            <td><?php echo $number ?></td>
                            <td><?php echo $due_amount ?></td>
                            <td><?php echo $invoice_number ?></td>
                            <td><?php echo $total_products ?></td>
                            <td><?php echo $order_date ?></td>
                            <td><?php echo $order_status ?></td>
                            <td><a href='index.php?delete_orders=<?php echo $order_id ?>' 
                            class='text-light' data-toggle='modal' data-target='#exampleModal'><i class='fa-solid fa-trash'></i></a></td>
                        </tr> 
                    <?php
                }
            }
            ?>
        
        </tbody>
    </table>
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h4>Are you sure you want to delete this?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"> <a href="./index.php?view_categories" class="text-light text-decoration-none"> No </a></button>
        <button type="button" class="btn btn-primary"> <a href='index.php?delete_orders=<?php echo $order_id ?>' class='text-light text-decoration-none'>Yes</a> </button>
      </div>
    </div>
  </div>
</div>
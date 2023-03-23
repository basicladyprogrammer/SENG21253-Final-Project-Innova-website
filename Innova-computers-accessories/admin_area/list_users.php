<h3 class="text-center text-success">All Users</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-info text-center">
            <!-- php code -->
            <?php
                $get_users="Select * from user_table";
                $result=mysqli_query($con,$get_users);
                $row_count=mysqli_num_rows($result);
                if($row_count==0){
                    echo "<h2 class='text-danger text-center mt-5'>No users yet</h2>";
                }else{
                    echo "<tr>
                    <th>Slno</th>
                    <th>User name</th>
                    <th>User email</th>
                    <th>User Image</th>
                    <th>User address</th>
                    <th>User mobile</th>
                    <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody class='bg-secondary text-light'>
                    ";
                    $number=0;
                    while($row=mysqli_fetch_assoc($result)){
                        $user_id=$row['user_id'];
                        $user_name=$row['user_name'];
                        $user_email=$row['user_email'];
                        $user_image=$row['user_image'];
                        $user_address=$row['user_address'];
                        $user_mobile=$row['user_mobile'];
                        $number++;
                ?>
                        <tr class='text-center'>
                            <td><?php echo $number ?></td>
                            <td><?php echo $user_name ?></td>
                            <td><?php echo $user_email ?></td>
                            <?php echo "<td><img src='../users_area/user_images/$user_image' alt='$user_name' class='admin_image'> </td>"; ?>
                            <td><?php echo $user_address ?></td>
                            <td><?php echo $user_mobile ?></td>
                            <td><a href='index.php?delete_users=<?php echo $user_id ?>' 
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
        <button type="button" class="btn btn-primary"> <a href='index.php?delete_users=<?php echo $user_id ?>' class='text-light text-decoration-none'>Yes</a> </button>
      </div>
    </div>
  </div>
</div>
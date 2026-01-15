<?php
session_start();
include('../config.php');


include('../includes/header.php');
include('../includes/sidebar.php');


?>

<div class="container">
    <div class="row">
        <div class="col-mt-12">
            <div class="card">
                <div class="card-header">
                    <h4>ALL PRODUCTS</h4>
                    <div class="cardbody">
                        <table class="table table-bordered ">
                            <thead>
                               <tr>

                               <th>id</th>
                               <th>category_id</th>
                               <th>Name</th>
                               <th>Image</th>
                               <th>Status</th>
                               <th>Edit</th>
                               <th>Delete</th>

                               </tr> 
                            </thead>
                                <tbody>
  <?php
  $sql="SELECT * FROM `products`";
  $result=mysqli_query($conn,$sql);
  

  if(mysqli_num_rows($result) >0){
    while($row= mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['category_id']; ?></td>

            <td><?php echo $row['name']; ?></td>
            <td>
                 <img src="../uploads/<?php echo $row['image'];?>" width="50px" height="50px" alt="product.php">
        </td>
        <th><?php echo $row['status'] =='1'? "visible" : "Hidden" ?></th>
            <th>
                <a href="edit_product.php?id=<?php echo $row['id'];?>" class="btn btn-sm btn-success"> Edit</a>
            </th>
            
            <th>
                <form action="delete_Product.php"method="Post" >
                 <input type="hidden" name="id" value="<?=$row ['id'] ;?>">
                <button type="submit"class="btn btn-sm btn-danger" name="delete_product">Delete</button>
                </form>
            </th>
            
            
        </tr>
        <?php

    }
} else {
        echo "<tr><td colspan='7'>No Products Found</td></tr>";
  

  }
  ?>


  </tbody>
  </table>
  


                           
                     

                    </div>

                </div>
            </div>

        </div>
    </div>

</div>


<!-- jQuery Library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Delete Confirmation Script -->
<script>
$(document).on('submit', 'form[action="delete_Product.php"]', function(e) {
    if (!confirm("Are you sure you want to delete this product?")) {
        e.preventDefault();
    }
});
</script>

<?php include('../includes/footer.php'); ?>


?>
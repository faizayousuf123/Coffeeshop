<?php
session_start();
include('../config.php');


include('../includes/header.php');
include('../includes/sidebar.php');
include('../includes/footer.php');

?>
<div class="container">
    <div class="row">
        <div class="col-mt-12">
            <div class="card">
            <div class="card-header">
                <h4>categories</h4>
                </div>
               <div class="cardbody">
               <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Edit</th>
                         <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql="SELECT * FROM `categories`";
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result) >0){
                        while($row= mysqli_fetch_assoc($result)){
                            ?>
                        
    
                         <tr>
                            <td><?php echo $row['id'];?></td>
                            <td><?php echo $row['name'];?></td>
                            <td>
                                <img src="../uploads/<?php echo $row['image'];?>" width="70px" alt="category.php">
                            </td>
                            <td>
                                <?php echo $row['status'] == 1 ? 'visible':'Hidden';?>
                            </td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Edit</a>
                            </td>
                            <td>
                                <form action="manage_category.php" method="POST">
                                    <input type="hidden" name="id" value="<?=$row['id'];?>">
                                <button type="submit" class="btn btn-danger" name="delete_category">Delete</button>
                           </form>
                            </td>
                        </tr>
                 
                        <?php    
                  }
                  
                  }else{
                   echo" <tr><td colspan='3'>No records found></td></tr>";
                  }
                    ?>

                    </tbody>


               </table>

               </div>
            </div>
        </div>
    </div>
</div>
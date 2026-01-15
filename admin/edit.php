<?php
session_start();
include('../config.php');
include('../includes/header.php');
include('../includes/sidebar.php');
include('../includes/footer.php');

?>

<div class="container">
    <div class="row">
    <div class="col-md-12">
        <?php
        
        
        if(isset($_GET['id']))
      {
            $id=$_GET['id'];
            $sql="SELECT * FROM `categories` WHERE id='$id'";
            $result=mysqli_query($conn,$sql);

            if(mysqli_num_rows($result)>0)
            {
                $data=mysqli_fetch_array($result);
   
        ?>
        <div class="card">
            <div class="card-header">
                <h4>Edit categories</h4>
                </div>
                <div class="card-body">
      
      
    <form action="manage_category.php" method="POST"enctype="multipart/form-data">
                   <div class="col mb-3">
                    <input type="hidden" name="id" value="<?=$data['id']?>">
                           <div class="col-md-12">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" value="<?= $data['name']?>" class="form-control" placeholder="Enter Your Name">
                           </div>
                           <div class="col mb-3">
                           <div class="col-md-12">
                            <label for="slug" class="form-label">slug</label>
                            <input type="text" name="slug"value="<?= $data['slug']?>" class="form-control" placeholder="Enter Your slug">
                           </div>
                           <div class="col mb-3">
                           <div class="col-md-12">
                            <label for="">Description</label>
                            <input type="text" class="form-control"name="description" value="<?= $data['description']?>">
                           </div>
                           <div class="col mb-3">
                           <div class="col-md-12">
                           <label>Upload Image</label>
                           <input type="file" name="image" class="form-control">                         
                           <input type="hidden" name="old_image" value="<?=$data['image']?>">
                           <label> Current image</label>
                           <img src="../uploads/<?= $data['image'];?>" width="50px" height="50px" alt="">
                        </div>
                           
                           <div class="col mb-3">
                           <div class="col-md-12">
                            <label for="">meta_title</label>
                            <input type="text" class="form-control" name="meta_title" value="<?= $data['meta_title']?>">
                            </div>
                           <div class="col mb-3">
                           <div class="col-md-12">
                            <label for="">meta_description</label>
                            <textarea rows="3" class="form-control" name="meta_description">
                            <?=$data['meta_description']?> 
                        </textarea>
                           </div>
                           <div class="col mb-3">
                           <div class="col-md-12">
                            <label for="">meta_key </label>
                            <textarea rows="3" class="form-control" name="meta_key"><?=$data['meta_key']?> </textarea>
                           </div>
                           <div class="col mb-3">
                           <div class="mt-12">
                           <label>status</label>
                           <input type="hidden" name="status" value="0">
                           <input type="checkbox" name="status" value="1"<?= $data['status'] == 1 ? 'checked' : "" ?>>
                           </div>
                           <div class="col mb-3">
                           <div class="mt-12">
                           <label>trending</label>
                           <input type="hidden" name="trending" value="0">
                           <input type="checkbox" name="popular" value="1"<?= $data['popular'] == 1 ? 'checked' : "" ?>>
                           </div>
                           <div class="col mb-3">
                           <div class="col-md-12">
                           <button type="submit" class="btn btn-primary" name="update_categories">update</button>
                           </div>
                           </form>
                        </div>
                   
                   
                   <?php
        }
        else
        {
            echo "no data found";
        }
    }
    
    
 else
        {
            echo "id missing from url";
        }
                   
                   ?>
                  
                </div>
                </div></div>
            </div>
        

   



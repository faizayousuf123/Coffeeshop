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
        <div class="card">
            <div class="card-header">
                <h4>Add Products</h4>
                </div>
                <div class="card-body">
                   <form action="manage_product.php" method="POST" enctype="multipart/form-data">
                   <div class="col mb-3">
                   <div class="col-md-12">
                            <label for="">Select category</label>
                            <select  name="category_id" class="form-select mb-2">
                   <option selected>Select category</option>
                   <?php
                   $sql="SELECT * FROM `categories`";
                   $categories=mysqli_query($conn,$sql);

                  if(mysqli_num_rows($categories) > 0 ){
                    foreach( $categories as $item){
                  
                ?>
                    <option value="<?= $item['id'];?>">
                        <?= $item['name'] ;?>
                    </option>
                        <?php
                  
                    
                    }
                }
              
                   
                   else{
                   echo"<option>No category found</option>";
                   }
                ?>
                
                
                  
                               </select>
                            
                           </div>
                           
                           <div class="col-md-12">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control mb-2" placeholder="Enter Your Name">
                           </div>

                           <div class="col-md-12">
                            <label for="slug" class="form-label">slug</label>
                            <input type="text" name="slug" class="form-control mb-2" placeholder="Enter Your slug">
                           </div>

                           <div class="col-md-12">
                            <label for="small_description" class="form-label">small_description</label>
                            <textarea name="small_description" class="form-control" rows="2"></textarea>
                           </div>
                           
                           <div class="col mb-3">
                           <div class="col-md-12">
                            <label for="">Description</label>
                            <input type="text" class="form-control mb-2"name="description">
                           </div>

                           <div class="col-md-12">
                            <label for="original_price" class="form-label">original_price</label>
                            <input type="number" name="original_price" class="form-control mb-2" placeholder="Enter original_price">
                           </div>

                           <div class="col-md-12">
                            <label for="selling_price" class="form-label">selling_price</label>
                            <input type="number" name="selling_price" class="form-control mb-2" placeholder="Enter selling_price">
                           </div>

                           <div class="col mb-3">
                           <div class="col-md-12">
                            <label for=""> upload image</label>
                            <input type="file" class="form-control mb-2" name="image">
                           </div>
                           <div class="col-md-12">
                            <label for="Quantity" class="form-label">Quantity</label>
                            <input type="number" name="qty" class="form-control mb-2" placeholder="Enter Quantity" class="form control">
                           </div>

                           <div class="col mb-3">
                           <div class="mt-12">
                           <label for="">status</label>
                           <input type="checkbox" name="status" value="1">
                          </div>

                          <div class="col mb-3">
                           <div class="mt-12">
                           <label for="">trending</label>
                           <input type="checkbox" name="trending" value="1">
                          </div>
                          
                           
                           
                           <div class="col mb-3">
                           <div class="col-md-12">
                            <label for="">meta_title</label>
                            <input type="text" class="form-control mb-2" name="meta_title">
                           </div>

                           <div class="col mb-3">
                           <div class="col-md-12">
                            <label for="">meta_description</label>
                            <textarea rows="3" class="form-control mb-2" name="meta_description"></textarea>
                           </div>

                           <div class="col mb-3">
                           <div class="col-md-12">
                            <label for="">meta_keywords</label>
                            <textarea rows="3" class="form-control mb-2" name="meta_keywords" placeholder="Enter Your meta_keywords"></textarea>
                           </div>
                           
                           
                           <div class="col mb-3">
                           <div class="col-md-12">
                           <button type="submit" class="btn btn-primary" name="add_product">Save</button>
                           </div>
                           </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
                
          
            
        

   



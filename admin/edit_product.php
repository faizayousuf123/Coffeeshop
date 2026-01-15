<?php
session_start();
include('../config.php');
include('../includes/header.php');
include('../includes/sidebar.php');

?>
 <?php 
//update Product
if(isset($_POST['update_product'])){
  
    $id=$_POST['id']; 
    $category_id=$_POST['category_id'];
    $name=$_POST['name']; 
    $slug=$_POST['slug'];
    $small_description=$_POST['small_description'];
    $description=$_POST['description'];
    $original_price=$_POST['original_price'];
    $selling_price=$_POST['selling_price'];
    $qty=$_POST['qty'];
    $meta_title=($_POST['meta_title']);
   $meta_description=($_POST['meta_description']);
   $meta_keywords=($_POST['meta_keywords']); 
    $status = ($_POST['status']);
    $trending = ($_POST['trending']);
    $path = "../uploads/";
    

    $new_image = $_FILES['image']['name'];
     $old_image = $_POST['old_image'];
     $update_Filename = $old_image;
  
     if($new_image != ""){
        $update_Filename=$new_image;
         }
         else{
           $update_Filename=$old_image;
         }

   

    //query update
  
   $sql= "UPDATE products SET category_id='$category_id',name='$name',slug='$slug',small_description='$small_description',description='$description',original_price='$original_price',selling_price='$selling_price',qty='$qty',meta_title='$meta_title',meta_description='$meta_description',meta_keywords='$meta_keywords',image='$update_Filename',status='$status',trending='$trending' WHERE id='$id'";
   $result=mysqli_query($conn,$sql);
   if($result)
   {
    

 //move wd new image

 
   if($_FILES['image']['name'] !=""){
    move_uploaded_file($_FILES['image']['tmp_name'], $path.$update_Filename);

  
   // Optional: delete old image
   if(file_exists($path.'/'.$old_image) && $old_image != ''){
    unlink($path.'/'.$old_image);
}
}
   
 $_SESSION['message']= " Product update sucessfully";
  header("Location:edit_product.php?id=$id");
   exit();
   }else{
    $_SESSION['message']= "Error updating products";
    header("Location:edit_product.php?id=$id");
    exit();
   
   }

  
 }
?>

<div class="container">
    <div class="row">
    <div class="col-md-12">

    <?php
    if(isset($_GET['id'])){
        $id=$_GET['id'];
    
    $sql="SELECT * FROM `products` WHERE id='$id'";
    $result=mysqli_query($conn,$sql);

 if(mysqli_num_rows($result)>0){
 $row=(mysqli_fetch_assoc($result));
 ?>
 
  
    <div class="card">
        <div class="card-header">
            <h4>Edit Products</h4>
 </div>
            <div class="card-body">
               <form action="edit_product.php"method="POST" enctype="multipart/form-data">
               <div class="col mb-3">
               <div class="col-md-12">
                
                <!-- CATEGORY DROPDOWN -->
                        <label for="">Select category</label>
                        <select  name="category_id" class="form-select mb-2">
               <option selected>Select category</option>
               <?php
               $sql="SELECT * FROM `categories`";
               $result=mysqli_query($conn,$sql);
              if(mysqli_num_rows($result)>0 ){
              while($category=mysqli_fetch_assoc($result)){
                ?>
             
             
    <option value="<?=$category['id'];?>"
                    <?= ($row['category_id'] == $category['id']) ? 'selected' : '' ?>>
                    <?= $category['name'];?>
                </option>
              
               
                           <?php }} ?>
                           </select>
                        
                       </div>
                       
                       <div class="col-md-12">
                       <input type="hidden" name="id" value="<?=$row['id']; ?>">
                       <label for="name" class="form-label">Name</label>
                        <input type="text" required name="name" value="<?=$row['name'];?>" class="form-control mb-2" placeholder="Enter Your Name">
                       </div>

                       <div class="col-md-12">
                        <label for="slug" class="form-label">slug</label>
                        <input type="text" required name="slug"value="<?=$row['slug'];?>" class="form-control mb-2" placeholder="Enter Your slug">
                       </div>

                       <div class="col-md-12">
                        <label for="small_description" class="form-label">small_description</label>
                        <textarea  name="small_description" class="form-control" rows="2" required><?=$row['small_description'];?></textarea>
                       </div>
                       
                       <div class="col mb-3">
                       <div class="col-md-12">
                        <label for="">Description</label>
                        <input type="text" class="form-control mb-2" required name="description" value="<?=$row['description'];?>">
                       </div>

                       <div class="col-md-12">
                        <label for="original_price" class="form-label">original_price</label>
                        <input type="number"  required name="original_price"  value="<?=$row['original_price'];?>" class="form-control mb-2" placeholder="Enter original_price">
                       </div>

                       <div class="col-md-12">
                        <label for="selling_price" class="form-label">selling_price</label>
                        <input type="number" required name="selling_price" value="<?=$row['selling_price'];?>" class="form-control mb-2" placeholder="Enter selling_price">
                       </div>

                       <div class="col mb-3">
                       <div class="col-md-12">
                        <label> uploaded image</label>
                        <input type="hidden" name="old_image" value="<?=$row['image']; ?>">
                        <input type="file"  name="image" class="form-control mb-2">
                        <label>current image</label>
                        <img src="../uploads/<?= $row['image'];?>" width="50px" height="50px" alt="">
                        </div>
                       <div class="col-md-12">
                        <label for="Quantity" class="form-label">Quantity</label>
                        <input type="number" required name="qty" value="<?=$row['qty'];?>" class="form-control mb-2" placeholder="Enter Quantity" class="form control">
                       </div>

                       <div class="col mb-3">
                       <div class="mt-12">
                       <label>status</label>
                       <input type="hidden" name="status" value="1">
                       <input type="checkbox" name="status" value="1" <?=($row['status']=='1')?'checked':''?>>
                      </div>

                      <div class="col mb-3">
                       <div class="mt-12">
                       <label>trending</label>
                       <input type="hidden" name="trending" value="0">
                       <input type="checkbox" name="trending" value="1" <?=($row['trending']=='1')?'checked':''?>>
                      </div>
                      
                       
                       
                       <div class="col mb-3">
                       <div class="col-md-12">
                        <label for="">meta_title</label>
                        <input type="text" class="form-control mb-2"required name="meta_title"value="<?=$row['meta_title'];?>">
                       </div>

                       <div class="col mb-3">
                       <div class="col-md-12">
                        <label for="">meta_description</label>
                        <textarea rows="3" class="form-control mb-2" required name="meta_description"><?=$row['meta_description'];?></textarea>
                       </div>

                       <div class="col mb-3">
                       <div class="col-md-12">
                        <label for="">meta_keywords</label>
                        <textarea rows="3" class="form-control mb-2"required name="meta_keywords" placeholder="Enter Your meta_keywords"><?=$row['meta_keywords'];?></textarea>
                       </div>
                       
                       
                       <div class="col mb-3">
                       <div class="col-md-12">
                       <button type="submit" class="btn btn-primary" name="update_product">update</button>
                       </div>
                       </form>
                    </div>
                </div>
                 
                <?php
            } else {
                echo "<h4>Product not found!</h4>";
            }

        } else {
            echo "<h4>ID missing from URL</h4>";
        }
        ?>
        
</div>
</div>
</div>
<?php include('../includes/footer.php'); ?>

//Add PRODUCT 
<?php
session_start();
include('../config.php');

if(isset($_POST['add_product'])){
$category_id = ($_POST['category_id']);
$name = ($_POST['name']);
$slug = ($_POST['slug']);
$small_description =( $_POST['small_description']);
$description = ($_POST['description']);
$original_price = ($_POST['original_price']);
$selling_price = ($_POST['selling_price']);
$qty = ($_POST['qty']);
$meta_title = ($_POST['meta_title']);
$meta_description = ($_POST['meta_description']);
$meta_keywords = ($_POST['meta_keywords']);
$status = isset($_POST['status'])?'1':'0';
$trending = isset($_POST['trending'])?'1':'0';

//handle image upload
$path='../uploads';
$filename = '';

if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
$image = $_FILES['image']['name'];
$image_ext = pathinfo($image,PATHINFO_EXTENSION);
$filename = time().'.'.$image_ext;
}

$sql="INSERT INTO `products`
 (category_id,name,slug,small_description,description,original_price,selling_price,image,qty, status,trending,meta_title,meta_description,meta_keywords)
   VALUES
('$category_id','$name','$slug','$small_description','$description','$original_price','$selling_price','$filename', '$qty','$status','$trending','$meta_title','$meta_description','$meta_keywords')";
$result = mysqli_query($conn,$sql);



    // ❗ If SQL fails → Show error
    if(!$result){
      die("SQL ERROR: " . mysqli_error($conn));
  }
  // upload image only if SQL success
if($filename !=''){
  move_uploaded_file($_FILES['image']['tmp_name'], $path. '/' .$filename);
}
$_SESSION['message'] = "Product added successfully!";
header("Location:All_Products.php");
exit();
}else{
$_SESSION['message']="SOMETHING WRONG!";
header("Location:add_product.php.mysqli_error($conn)");
  exit();
} 


?>








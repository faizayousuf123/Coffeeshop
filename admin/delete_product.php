<?php
include("../config.php");
session_start();

if(isset($_POST['delete_product'])){
   $id=($_POST['id']);
   $delete_query="DELETE FROM `products` WHERE id='$id'";
   $delete_query=mysqli_query($conn,$delete_query);

   if($delete_query_run){
    // Optional: delete old image
   if(file_exists($path.'/'.$old_image) && $old_image != ''){
    unlink($path.'/'.$old_image);
}
}
   $_SESSION['message']="Delete Product Sucessfully";
   header("Location:All_products.php");
   }

   else{
    $_SESSION['message']="Something went wrong";
   header("Location:All_products.php");
   }
   
   

?>
<?php
session_start();
include('../config.php');

//add category

if(isset($_POST['add_categories'])) {
    $name=($_POST['name']);
    $slug=($_POST['slug']);
    $description=($_POST['description']);
    $meta_title=($_POST['meta_title']);
    $meta_description=($_POST['meta_description']);
    $meta_key=($_POST['meta_key']);
    $status=isset($_POST['status'])? 1 : 0; 
    $popular=isset($_POST['popular']) ? 1 : 0; 
    $path = "../uploads/";

    if(isset($_FILES['image']['name']) && $_FILES['image']['name']!= ''){
   $image= $_FILES['image']['name'];
   $image_ext=pathinfo($image,PATHINFO_EXTENSION);
    $filename=time() . '.' . $image_ext;
    $path="../uploads";
    move_uploaded_file($_FILES['image']['tmp_name'],$path . '/' .$filename);
    } else{
        $filename = ""; // no image uploaded
    }

   $sql="INSERT into `categories`(name,slug,description,image,status,popular,meta_title,meta_description,meta_key)VALUES('$name','$slug','$description','$filename','$status','$popular','$meta_title','$meta_description','$meta_key')";
   $result=mysqli_query($conn,$sql);

   if($result){
    $_SESSION['message']= "Category Added SucessFully!";
   header("Location:add_categories.php");
   exit();
  
 }else{
    $_SESSION['message']="Failed to add category";
    header("location:add_categories.php. mysqli_error($conn)");
    exit();

 }
   }

//update category
 else if(isset($_POST['update_categories'])){
  $id=($_POST['id']);
  $name=($_POST['name']);
  $slug=($_POST['slug']);
  $description=($_POST['description']);
  $meta_title=($_POST['meta_title']);
  $meta_description=($_POST['meta_description']);
  $meta_key=($_POST['meta_key']);
  $status=isset($_POST['status'])? 1 : 0;
  $popular=isset($_POST['popular'])? 1 : 0;

 $new_image=$_FILES['image']['name'];
 $old_image=$_POST['old_image'];
  
 if($new_image != ""){
 $update_Filename=$new_image;
  }
  else{
    $update_Filename=$old_image;
  }

  $path = "../uploads/";
  $update_query="UPDATE categories SET name='$name',slug='$slug',description='$description',meta_title='$meta_title',meta_description='$meta_description',meta_key='$meta_key',status='$status',popular='$popular',image='$update_Filename' WHERE id='$id' ";
 $result=mysqli_query($conn,$update_query);

 if($result)
 {
 
  //move wd new image
  if($_FILES['image']['name'] !=""){
    move_uploaded_file($_FILES['image']['tmp_name'], $path.$update_Filename);
   //delete file if it exists
   // if(file_exists("../uploads/".$old_image))
    {
   //  unlink("../uploads/".$old_image);
    }
   {
      $_SESSION['message'] = "Category updated successfully!";
      header("Location:edit.php?id=$id");
      exit();
    }

  }
  else{
    $_SESSION['message'] = "something went wrong";

  }
 
 
}
 }

 else if(isset($_POST['delete_category'])){
  $id=($_POST['id']);
   $delete_query="DELETE FROM `categories` WHERE id='$id'";
   $delete_query_run=mysqli_query($conn,$delete_query);

   if($delete_query_run){
    $_SESSION['message']=" Category Delete sucessfully";
  header("location:category.php");
    exit();
   }
   else{
    $_SESSION['message']="something wrong";
    header("location:category.php");
    exit();
   }

 
 }
  

?>


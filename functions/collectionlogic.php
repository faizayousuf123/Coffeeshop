<?php 
session_start();
include('config.php');


// record all table
function getAllactive($table)
{
  global $con;
 $sql="Select * FROM $table WHERE status='1'";
 return mysqli_query($con, $sql);
 
}
//single record
function getSlugActive($table , $slug){
  global $con;
 $sql="Select * FROM $table WHERE slug='$slug' AND status='1' LIMIT 1";
 return mysqli_query($con, $sql);


}
function getIDActive($table , $id){
  global $con;
  $sql="Select * FROM $table WHERE id='$id' AND status='1'";
  return mysqli_query($con, $sql);
}
function getprodByCategory($category_id){
  global $con;
  $sql="SELECT * FROM products WHERE category_id='$category_id' AND status='1' ";
  return mysqli_query($con, $sql);
  

}
?>

        
<?php 
require_once __DIR__ . '/../config.php'; // collectionlogic.php ke liye


// record all table
function getAllactive($table)
{
global $conn;
 $sql="Select * FROM $table WHERE status='1'";
 return mysqli_query($conn, $sql);
}
//single record

function getslugActive($table , $slug){
global $conn;
$slug = mysqli_real_escape_string($conn, $slug);
$sql="Select * FROM $table WHERE slug='$slug' AND status='1' LIMIT 1";
return mysqli_query($conn, $sql);


}
function getIDActive($table , $id){
global $conn;
  $sql="Select * FROM $table WHERE id='$id' AND status='1'";
  return mysqli_query($conn, $sql);
}
function getprodByCategory($category_id){
 global $conn;

$category_id = (int) $category_id; 

//if (!isset($conn)) {
 // die("Database connection not found!");
//}    


  $sql="SELECT * FROM products WHERE category_id='$category_id' AND status='1' ";
 $result = mysqli_query($conn, $sql);
 if (!$result) {
  die("Query Failed: " . mysqli_error($conn));
}
return $result;
}

?>

        
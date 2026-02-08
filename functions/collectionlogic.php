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
// Display cart function
function getCartItems()
{
  global $conn;
 $userId = $_SESSION['auth_user']['user_id'];
  $sql = "Select c.id as cid,c.prod_id ,c.prod_qty,p.id as pid,p.name,p.image,
  p.selling_price FROM carts c, products p WHERE c.prod_id = p.id AND c.user_id='$userId' ORDER by c.id DESC";

  return mysqli_query($conn, $sql);
} 
function getprodByCategory($category_id){
 global $conn;

$category_id = (int) $category_id; 

  $sql="SELECT * FROM products WHERE category_id='$category_id' AND status='1' ";
 $result = mysqli_query($conn, $sql);
 if (!$result) {
  die("Query Failed: " . mysqli_error($conn));
}
return $result;
}

?>

        
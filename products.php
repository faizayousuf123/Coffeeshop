<?php
include('config.php');
include('./includes/header.php');
include('functions/collectionlogic.php');

if(isset($_GET['category'])){
$category_slug=strtolower( $_GET['category']);

$category_data= getslugActive("categories",$category_slug);

$category=mysqli_fetch_array($category_data);
if($category){
$category_id = $category['id'];

?>

<div class="py-3 bg-primary">
<div class="container">
    <h3 class="white-text">
       <a class="text-white" href="categories.php"> 
       Home/
  </a>
      <a  class="text-white" href="categories.php"> collection /
        </a>
        <?=$category['name'];?>
        </h3>
  </div>
  </div>

<div class="py-3">
<div class="container">
    
        <div class="col-md-12">
       
         <h1><?=$category['name'];?></h1>
       
         <hr>
         <div class="row">
      
         
        <?php 
      $products = getprodByCategory($category_id);

        if($products && mysqli_num_rows($products)>0)
        {
            while($item=mysqli_fetch_assoc($products))
          {
          ?>
          <div class="col-md-4 mb-2">
          <a href="product_view.php?product=<?=$item['slug']; ?>">
            <div class="card shadow">
                <div class="card-body text-center">
                    <img src="uploads/<?= $item['image']; ?>" alt="product image" class="card-img-top" 
                   style="height:200px; object-fit:cover;"> 
                <h4><?= $item['name']; ?></h4> 
     
         </div>
            </div>
          </a>
          </div>
         
          <?php
          }
      } else {
        echo"no products foind in this category";
          
      
      } 
   } else{
            echo"no data found";
        }
      
        ?>
    
       
       
       </div>
    </div>
</div>
<?php 
}else{
    echo"something wrong";
}


include('./includes/footer.php');
?>
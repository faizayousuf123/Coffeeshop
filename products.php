<?php
include('config.php');
include('./includes/header.php');
include('functions/collectionlogic.php');

 $category_slug= $_GET['category'] ??'';
 $category_query = getSlugActive("categories",$category_slug);
if(mysqli_num_rows($category_query) > 0)
{
   $category = mysqli_fetch_assoc($category_query);
   }

if($category){
 $category_id = $category['id'];
  
}
else
{
   echo "Category not found";
}


?>
<div class="py-3 bg-primary">
<div class="container">
    <h3 class="white-text">Home/collection/<?= $category['name']; ?></h3>
  </div>
</div>
<div class="py-3">
<div class="container">
    
        <div class="col-md-12">
       <h1><?= $category['name']; ?></h1>
       
         <hr>
         <div class="row">
      
        <?php 
      $products = getprodByCategory($category_id , '1');

    if($products && mysqli_num_rows($products)>0)
        {
          while($item= mysqli_fetch_assoc($products))
          {
          ?>
          <div class="col-md-3 mb-4">
            <a href="#">
            <div class="card h-100 shadow">
                <div class="card-body text-center">
                    <img src="uploads/<?= $item['image']; ?>" alt="products.php"class="card-img-top" 
                    style="height:200px; object-fit:cover;"> 
                <h4><?= $item['name']; ?></h4> 
     
            
         </div>
            </div>
            </a>
          </div>
          <?php
      
          }
  }
      
  else{
          echo"no data available";
      } 
    
    
    
     ?>
       
       </div>
    </div>
</div>


<?php 
include('./includes/footer.php');
?>
        


    
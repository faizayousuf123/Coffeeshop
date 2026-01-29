<?php
include('config.php');
include(__DIR__ . '/includes/header.php');
include('includes/navbar.php');

include('./functions/collectionlogic.php');

?>
<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">Home/Collection</h6>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>OUR COLLECTION</h1>
                <hr>
                <div class="row">
                <?php
           $categories = getAllactive("categories");
       if(mysqli_num_rows($categories)>0){
        foreach($categories as $item)
        {
            
         ?>
         <div class="col-md-3 mb-2">
            <a href="products.php?category=<?= $item['slug']; ?>">
            <div class="card shadow">
                <div class="card-body">
  <img src="uploads/<?= $item['image']; ?>" alt="category image" class="card-img-top" 
                   style="height:200px; object-fit:cover;"> 
  <h4 class="text-center"><?= $item['name']; ?></h4>

            </div>
         </div>
         </a>
         </div>
        
         <?php
        }
       }else{
         echo"no data found";
         }
         ?>
                </div>
               
            </div>
        </div>
    </div>
</div>
<?php 
require_once 'includes/header.php';
include('includes/footer.php');
?>

<?php

include('./includes/header.php');
include('config.php');
include('functions/collectionlogic.php');

?>

<div class="py-3 bg-primary">
<div class="container">
    <h3 class="white-text"> Home /collection /</h3>
  </div>
  </div>

<div class="py-5">
<div class="container">
    
        <div class="col-md-12">
       
         <h1>OUR COLLECTIONS</h1>
       
         <hr>
         <div class="row">
      
         
        <?php 
      $categories = getAllactive("categories");

     
        if($categories && mysqli_num_rows($categories)>0)
        {
          while($item= mysqli_fetch_assoc($categories))
          {
          ?>
          <div class="col-md-3 mb-4">
          <a href="products.php?category=<?=$item['slug']; ?>">
            <div class="card h-100 shadow">
                <div class="card-body text-center">
                    <img src="uploads/<?= $item['image']; ?>"  alt="categories.php"class="card-img-top" 
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
            echo"no data found";
        }
        ?>
       
       </div>
    </div>
</div>



        

<?php
include('./includes/footer.php');
?>
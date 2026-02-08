<?php

include('functions/collectionlogic.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">
         <a href=index.page class="text-white"> Home/</a>   
         <a href=cart.php class="text-white">Cart</a>
       </h6>

    </div>

</div>




<div class="py-5">
    <div class="container">
        <div class="card card-body shadow">
    <div class="row">
        <div class="col-md-12">
        <div class="row align-item-center">
                    <div class="col-md-5">
                       <h6>Product </h6>
                    </div>
                    <div class="col-md-3">
                        <h6>Price</h6>
                    </div>
                    <div class="col-md-2">
                        <h6>Quantity</h6>
                    </div>

                    <div class="col-md-2">
                        <h6>Remove</h6>
                 
  </div>
  </div>
  </div>




            
                    <?php $item = getCartItems();
                    foreach($item as $citem){
                   
                    ?>
                    <div class="card product_data shadow-sm mb-3">
                  
                <div class="row align-item-center">
                    <div class="col-md-2">
                       <img src="uploads/<?=$citem['image']?>" alt="image" width="80px">

                    </div>
                    <div class="col-md-3">
                        <h5><?= $citem['name']?></h5>
                    </div>
                    <div class="col-md-3">
                        <h4><?= $citem['selling_price'] ?></h4>
                    </div>

                    <div class="col-md-2">
                 
    <div class="input-group mb-3" style="width:130px">
  <button class="input-group-text decrement-btn">-</button>
  <input type="text" class="form-control text-center input-qty bg-white" value="<?= $citem['prod_qty'] ?>" min="1" readonly>
<button class="input-group-text increment-btn">+</button>
</div>
</div>


<div class="col-md-2">
    <button class="btn btn-danger btn-sm">Remove</button>
</div>
</div>
</div>
                   
            <?php 
                    }
                 
                   ?>

        </div>
    </div>
    
    </div>
</div>








<?php
include('includes/footer.php');
?>

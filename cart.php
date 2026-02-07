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
    <div class="row">
        <div class="col-md-12">
            
                    <?php $item=getCartItems();
                    foreach($item as $citems)
                    {
                   echo $citem['name'];}

                    ?>
                   
                </div>
            
        </div>
    </div>
    
    </div>
</div>








<?php
include('includes/footer.php');
?>

<?php
require_once'config.php';
require 'includes/header.php';

if(isset($_GET['product'])){
    $product = $_GET['product'];
    $product_data= getslugActive("products" ,$product_slug);
    $product=mysqli_fetch_array($product_data);

if($product)
{
?>
 <div class="py-3 bg-primary">
    <div class="row">
        <a class="text-white" href="categories.php">Home/</a>
        <a class="text-white" href="categories.php">collection/</a>
        <?= $product['name']; ?>
    </div>
 </div>

 <div class="container mt-3">
    <div class="row">
        <div class="col-md-4">
            <img src="uploads/<?= $item['image']; ?>" alt="product image" class="card-img-top" style="height:200px; object-fit:cover";>
            </div>
            <div class="col-md-8">
             <h4> <?= $product['name']; ?></h4> 
           <hr>
           <p><?= $product['small_description']; ?></p>
           <hr>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <h5>Rs<s> <?=$product['original_price']; ?> </s></h5>
                </div>
                <div class="col-md-6">
                    <h5><?= $product['selling_price']; ?></h5>
                </div>
            </div>
            <div class="col-md-6">
                <h5> <?= $product['description']; ?></h5>
                <hr>
            </div>

        </div>
    </div>
 </div>
 <?php
}else {
    echo "Product not Found";
}
}
else{
    echo "something wrong";
}

?>
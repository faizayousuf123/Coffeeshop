<?php
include('config.php');
include('./includes/header.php');
include('functions/collectionlogic.php');

if(isset($_GET['product'])){
    $product_slug = $_GET['product'];
    $product_data= getslugActive("products" ,$product_slug);
    $product=mysqli_fetch_array($product_data);

if($product)
{
?>
 <div class="py-3 bg-primary">
    <div class="container">
    <div class="row">
        <h6 class="text-white">
        <a class="text-white" href="categories.php">Home/</a>
        <a class="text-white" href="categories.php">collection/</a>
        <?= $product['name']; ?></h6>
    </div></div>
 
 <div class="bg-light py-4">
 <div class="container mt-3">
    <div class="row">
        <div class="col-md-4">
            <img src="uploads/<?= $product['image']; ?>" alt="product image" class="w-100">
            </div>
            
            <div class="col-md-8">
             <h4 class="fw-bold"> <?= $product['name']; ?>
             <span class="float-end-text"><?php if($product['trending']){echo "trending";} ?></span> 
             </h4>
             <hr>
           <p><?= $product['small_description']; ?></p>
        
            <div class="row">
            <div class="col-md-6">
            <h5 class="fw-bold"><span class="text-sucess"><?= $product['selling_price']; ?> </span></h5>
            
                </div>
                <div class="col-md-6">
                <h5>Rs<s class="text-danger"> <?=$product['original_price']; ?> </s></h5>
                    
                </div>
                
            </div>
            <div class="row">
                <div class="d-flex align-items-center mt-2">
         <button onclick="changeQty(this, -1)">-</button>
         <input type="number" class="qty form-control text-center mx-2"
             style="width:60px;" value="1" min="1">
        <button onclick="changeQty(this, 1)">+</button>
                </div>
                </div>
                
               <div class="row mt-3">
                <div class="col-md-6">
         <button class="btn btn-primary px-4 addToCartBtn" value="<?= $product['id'];?>"><i class="fa fa-shopping-cart me-2"></i>AddToCart</button>
              </div>

              <div class="col-md-6">
              <button class="btn btn-danger px-4"><i class="fa fa-heart me-2"></i>wishlist</button>
            </div> 
             <hr>
            </div>
            <div class="col-md-6">
                <h5> <?= $product['description']; ?></h5>
                
                </div>
                <hr>
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
include('includes/footer.php');
?>

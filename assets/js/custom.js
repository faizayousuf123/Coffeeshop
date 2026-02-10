$(document).ready(function () {
  
  $('.increment-btn').click(function (e) { 
    e.preventDefault(); 

     var qty = $(this).closest('.product_data').find('.input-qty').val();
  var value = parseInt(qty,10);
  
  value = isNaN(value) ? 0: value;
  if(value < 20){
    value++;
   $(this).closest('.product_data').find('.input-qty').val(value);
  }
}); 
}); 
  
  
$('.decrement-btn').click(function (e) { 
  e.preventDefault();

   var qty = $(this).closest('.product_data').find('.input-qty').val();
var value = parseInt(qty , 10);
value = isNaN(value) ? 0: value;
if(value > 0){
  value--;
  $(this).closest('.product_data').find('.input-qty').val(value);
}
  
}); 

  

 //addtocart
 $('.addToCartBtn').click(function (e) { 
  e.preventDefault();

 
  var qty = $(this).closest('.product_data').find('.input-qty').val();
    let prod_id = $(this).val();

  $.ajax({
    type: "POST",
    url: "functions/handlecart.php",
    data: {
      "prod_id" :prod_id,
      "prod_qty" :qty,
      "scope" : "add"

    },
   
    success: function (response) {
      if(response == 201){
        alertify.success("Product Added to cart");
      }
      else if(response == "existing"){
        alertify.success("Product already in cart");
      }
      else if(response == 401){
        alertify.success("Login to continue");
        setTimeout(function () {
          window.location.href = "login.php";
        }, 1500); // 1.5 second baad redirect
      }
        
      
      else if(response == 500){
        alertify.success("something went wrong");
      }
    }
    

  });
  
  
}); 

//update cart wd ajax
$(selector).on('click','.updateQty', function () {
   var qty=$(this).closest('.product_data').find('.input_qty').val();
   var prod_id=$(this).val;
   alert(qty);

   $.ajax({
    type: "POST",
    url: "functions/handlecart.php",
    data: {
      "prod_id":prod_id,
      "prod_qty":qty,
      "scope":"update",
    },
    
    success: function (response) {
      (response==200)
       // alert('response');
      }
    
   });
 
});






$(document).ready(function () {
  
  $('.increment-btn').click(function (e) { 
    e.preventDefault();

     var qty = $('.input-qty').val(newvalue);
  var value = parseInt(qty , 10);
  value = isNaN(value) ? 0: value;
  if(value < 10){
    value++;
    $('.input-qty').val(newvalue);
  }
    
  });
});
  
  $(document).on('click', '.decrement-btn', function () {
    let input = $(this).siblings('.input-qty');
    let val = parseInt(input.val()) || 1;
  
    if (val > 1) {
      input.val(val - 1);
    }
  }); 

  

 //addtocart
 
 
$(document).on('click','.addToCartBtn',function (e) { 
  e.preventDefault();
  


  var qty = $(this).closest('.product_data').find('.input-qty').val();

   var prod_id = $(this).val();

 

   $.ajax({
    method: "POST",
    url: "functions/handlecart.php",
    data: {
     "prod_id" : prod_id,
      "prod_qty" : qty,
      "scope" : "add"
    }, 
    
    success: function (response) {
    
      if(response === 201)
        {
        alertify.success("Product added to cart");
      }
      
      
      else if(response == "existing")
        {
         alertify.warning("Product already in cart");
     }
        
      else if(response == 401)
        {
       
        alertify.success("Please login first to add items to cart");setTimeout(function () {
          window.location.href = "login.php";
        }, 1500);
      
    }
      else if(response == 500)
        {
       
        alertify.success("something went wrong");
      }

      }
        
      
    });
   });




 
  
  

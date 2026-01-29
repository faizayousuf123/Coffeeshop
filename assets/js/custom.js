$(document).ready(function () {
  $(document).on('click', '.increment-btn', function () {
    let input = $(this).siblings('.input-qty');
    let val = parseInt(input.val()) || 1;
  
    if (val < 10) {
      input.val(val + 1);
    }
  });
  
  $(document).on('click', '.decrement-btn', function () {
    let input = $(this).siblings('.input-qty');
    let val = parseInt(input.val()) || 1;
  
    if (val > 1) {
      input.val(val - 1);
    }
  }); 
});
  

 //addtocart
 
$(document).ready(function () {
 
  $(document).on('click', '.addToCartBtn', function (e) {
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
      if(response == 201)
        {
        alertify.success("Product added to cart");
      }
      else if(response === "existing")
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

  });


 
  
  

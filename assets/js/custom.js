//$(document).ready(function () {
    var qty = $('.increment-btn').click(function (e) { 
        e.preventDefault();
        $(this)
        .closest('.product_data')
        .find('.input-qty')
        .val();
        var qty = input.value;
      var value = parseInt(qty,10);
      value = isNaN(value)? 0 :value;
      if(value < 10){
        value++;
       
        $(this).closest('.product_data').find('.input-qty').val(value);
      }

    });
//});
function changeQty(btn, step) {
    let input = btn.parentElement.querySelector('.qty');
    let value = parseInt(input.value) + step;
    input.value = value < 1 ? 1 : value;
}
$(document).ready(function () {
 
  $(document).on('click', '.addToCartBtn', function (e) {
    e.preventDefault();
   var prod_id = $(this).val();

   $.ajax({
    method: "POST",
    url: "functions/handlecart.php",
    data:{
   "prod_id" : prod_id,
    "prod_qty" : prod_qty,
     "scope" : "add"
    }, 
    
    success: function (response) {
      if(response == 201)
        {
        alertify.success("Product added to cart")
      }
      else if(response == 401)
        {
       
        alertify.success("Product added to cart");
      }
      else if(response == 500)
        {
       
        alertify.success("something went wrong");
      }

      }
        
      
    
   });

});
 
  
  
});
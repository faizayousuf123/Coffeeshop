<?php
session_start();

include('../config.php');


if(isset($_SESSION['auth']))
{
if(isset($_POST['scope']))
{

    $scope = $_POST['scope'];
    switch ($scope) {
        case "add":

       $prod_id = (int) $_POST['prod_id'];
      // $prod_qty = isset($_POST['prod_qty']) && $_POST['prod_qty'] > 0
         //   ? (int)$_POST['prod_qty']
         //   : 1;
       $pro_qty = (int) $_POST['prod_qty'];
       $user_id =  (int) $_SESSION['auth_user']['user_id'];


      //  $check_cart = "SELECT id FROM carts 
                       //WHERE prod_id='$prod_id' 
                      // AND user_id='$user_id'";
       // $check_cart_run = mysqli_query($conn, $check_cart);

       // if (mysqli_num_rows($check_cart_run) > 0)
       //  {
          //  echo "existing";
       //   
       // }
       // else
       // {
            //Insert new cart item
       $sql= "INSERT INTO carts (user_id,prod_id,prod_qty)VALUES ('$user_id' , '$prod_id' , '$prod_qty')";
        $result= mysqli_query($conn,$sql);
        if($insert_cart_run)
        {
       echo 201;
        }
        else{
            echo 500;
 }
    
    
       break;

       default;
       echo "500";
    }

}

else{
    echo "401";

}}

?>
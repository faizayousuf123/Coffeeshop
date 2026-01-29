<?php
session_start();
include('../config.php');


if(isset($_SESSION['auth']))
{
if(isset($_POST['scope'])){
    $scope = $_POST['scope'];
    switch ($scope) {
        case "add":

       $prod_id = (int) $_POST['prod_id'];
       $prod_qty = isset($_POST['prod_qty']) && $_POST['prod_qty'] > 0
            ? (int)$_POST['prod_qty']
            : 1;
      // $pro_qty = (int) $_POST['prod_qty'];
       $user_id =  (int) $_SESSION['auth_user']['user_id'];

       $chk_existing_cart ="SELECT * FROM  CARTS WHERE prod_id='$prod_id' AND user_id='$user_id'";
       $chk_existing_cart= mysqli_query($conn,$chk_existing_cart);
       
       $sql="INSERT INTO carts(user_id,prod_id,prod_qty)VALUES('$user_id' , '$prod_id' , '$prod_qty')";
        $result= mysqli_query($conn,$sql);
        if($result)
        {
       echo "201";
        }
        else{
            echo "500";
        }
    
       break;

       default;
       echo "500";
    }

}

else{
    echo "401";

}
}
?>
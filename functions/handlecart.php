<?php
include('../config.php');

if(isset($_SESSION['auth']))
{
if(isset($_POST['scope'])){
    $scope = $_POST['scope'];
    switch ($scope) {
        case "add";
       $prod_id = $_POST['prod_id'];
       $pro_qty = $_POST['prod_qty'];
       $user_id = $_POST['register']['user_id'];

       $sql="inser INTO `carts`(user_id, prod_id, prod_qty)VALUES('$user_id' ,'$prod_id' , '$pro_qty')";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
       echo 201;
        }
        else{
            echo 500;
        }
       break;

       default;
       echo 500;
    }

}
}
else{
    echo 401;

}
?>
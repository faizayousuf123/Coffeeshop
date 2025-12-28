<?php
include('../config.php');
session_start();

if(isset($_POST['register']));

{
    $name=$conn->real_escape_string($_POST['name']);
    $email=$conn->real_escape_string($_POST['email']);
    $phone=$conn->real_escape_string($_POST['phone']);
    $password=$conn->real_escape_string($_POST['password']);
    $cpassword=$conn->real_escape_string($_POST['cpassword']);

   
    //insert query
    $sql="INSERT INTO `register`(name,email,phone,password,role_as)VALUES('$name','$email', '$phone','$password',0)";
    $result=mysqli_query($conn,$sql);

    //check result
        if($result){
        $_SESSION['message'] = "Registered Successfully";
        header('Location:../login.php');
 
exit;

    }
    else
    {
      $_SESSION['message'] = "Database Error: " . mysqli_error($conn);
      header('location:../register.php');
           exit;
    }
  }
 


?>
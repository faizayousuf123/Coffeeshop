<?php
 include('../config.php');
session_start();
session_unset();

if(isset($_POST['login']))
{
    $email=$conn->real_escape_string($_POST['email']);
    $password=$conn->real_escape_string($_POST['password']);

    $sql="SELECT * FROM `register` WHERE email='$email' AND password='$password'";
  $result=mysqli_query($conn,$sql);

  if(mysqli_num_rows($result) >0)
  {
   $_SESSION['auth']= true;

   $userdata=mysqli_fetch_array($result);
    $userid=$userdata['id'];
    $name=$userdata['name'];
    $email=$userdata['email'];
    $role_as=$userdata['role_as'];

    $_SESSION['auth_user']= [
      'user_id'=>$userid,
      'name'=> $name,
       'email'=> $email,
      'role_as' => $role_as

   ];
   $_SESSION['role_as'] = $role_as;


   
   if($role_as == 1) {
    $_SESSION['message'] = "Welcome to Admin Dashboard";
    header("Location: ../admin/index.php");
    exit;
    
    }
    else
    {
      $_SESSION['message']="Login Sucessfully";
    header("Location:../index.php");
    exit;
    }
  }
    
  else{
    $_SESSION['message']="Invalid credientals";
    header("Location:../login.php");
    exit;

  }


  }else{
    $_SESSION['message']="Invalid Email";
    header("Location:../login.php");
    exit;

  }



?>
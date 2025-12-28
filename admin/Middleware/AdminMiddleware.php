<?php 
if (session_status() === PHP_SESSION_NONE){
    session_start();
}


// Check agar user login nahi hai
if(!isset($_SESSION['register'])){
    $_SESSION['message'] = "Login to continue";
    header("Location: ../login.php");
    exit(0);
}

// Check agar user admin nahi hai
if($_SESSION['register']['role_as'] != 1){
    $_SESSION['message'] = "You are not authorized user";
    header("Location: ../index.php"); // better: admin ke liye index.php, user ke liye home page
    exit(0);
}
?>

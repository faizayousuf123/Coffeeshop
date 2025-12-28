<?php  
session_start();
include('config.php');
include('includes/header.php');

if(isset($_SESSION['register'])){
$_SESSION['message']=['you are already login'];
header('location:index.php');
exit;
}


?>

   
    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
              <div class="col-mt-8">
                <div class="card">
                    <div class="cardheader">
                    <h4>Login Form</h4>
                    </div>
                        <div class="cardbody">
                        
                        <form action="functions/login_action.php" method="POST">
  
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="text" name="email" class="form-control" placeholder=" Enter your Email" >
    
  </div>
  
  <div class="mb-3">
    <label for="Password" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" placeholder=" Enter your password" id="exampleInputPassword1">
  </div> 

  <div class="mb-3 form-check">
  <input type="checkbox" class="form-check-input" id="as_admin" name="as_admin">
  <label class="form-check-label" for="as_admin">Login as Admin</label>
</div>

  
  <button type="submit" name="login" class="btn btn-primary">login</button>
</form>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php')?>;
   

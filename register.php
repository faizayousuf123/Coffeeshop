<?php include ('includes/header.php');
if(isset($_SESSION['register'])){
  $_SESSION['message']=['you are already login'];
  header('location:index.php');
  exit;
  }
 ?>;

   
    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
              <div class="col-mt-8">
                <div class="card">
                    <div class="cardheader">
                    <h4>Registration Form</h4>
                    </div>
                        <div class="cardbody">
                        
                        <form action="functions/register_action.php" method="POST">
  <div class="mb-3">
    <label for="Name" class="form-label">Name</label>
    <input type="text" name="name" class="form-control" placeholder=" Enter your name" >
    
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="text" name="email" class="form-control" placeholder=" Enter your Email" >
    
  </div>
  <div class="mb-3">
    <label for="Phone" class="form-label">Phone</label>
    <input type="text" name="phone" class="form-control" placeholder=" Enter your Phone" >
    
  </div>
  <div class="mb-3">
    <label for="Password" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" placeholder=" Enter your password" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="Password" class="form-label">confirm password</label>
    <input type="password" name="cpassword" class="form-control" placeholder=" Enter your confirm password" id="exampleInputPassword1">
  </div>
  
  <button type="submit" name="register" class="btn btn-primary">Register</button>
</form>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php')?>;
   

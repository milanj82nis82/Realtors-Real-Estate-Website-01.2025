<?php
require_once '../include/config.inc.php';
require_once '../include/db.inc.php';
require_once 'include/class_autoloader.inc.php';

try {

    $admin = new Admin();




} catch ( PDOException $e ){
    echo $e -> getMessage();
}

?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
   <?php require_once 'partials/__head.inc.php' ?>
</head>

<body>


<div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="">
                        <img class="align-content" src="images/logo.png" alt="">
                    </a>
                </div>
                <div class="login-form">
<?php


try {


    if( isset($_POST['adminLogin'])){

$email = $_POST['email'];
$password = $_POST['password'];
$admin = new Admin();
$admin -> adminlogin(  $email , $password );


    }// adminRegister


} catch ( PDOException $e ){
    echo $e -> getMessage();
}



?>


                    <form action="" method="POST" >
                       
                        <div class="form-group">
                                <label>Email address</label>
                                <input type="email" class="form-control" placeholder="Email" name="email">
                        </div>                            
                        
                        <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                        
                                    
                                    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30" name="adminLogin">Login</button>
                                    <div class="social-login-content">
                                        <div class="social-button">
                                            <button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i class="ti-facebook"></i>Register with facebook</button>
                                            <button type="button" class="btn social twitter btn-flat btn-addon mt-2"><i class="ti-twitter"></i>Register with twitter</button>
                                        </div>
                                    </div>
                                    <div class="register-link m-t-15 text-center">
                                        <p>Already have account ? <a href="admin-register.php"> Sign up</a></p>
                                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>





</body>

</html>

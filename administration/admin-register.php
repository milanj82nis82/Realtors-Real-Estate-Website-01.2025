<?php
require_once '../include/config.inc.php';
require_once '../include/db.inc.php';
require_once 'include/class_autoloader.inc.php';

try {

    $admin = new Admin();
    if( $admin-> checkIsUserAdmin()){
        header('Location:dashboard.php');
        exit();
    }


} catch ( PDOException $e ){
    echo $e -> getMessage();
}

?>
<!doctype html>

<html class="no-js" lang="en">


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
                <h4 class="text-center">Admin Registration</h4>
<?php   

try {


    if( isset($_POST['adminRegistration'])){

        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $repeat_email = $_POST['repeat_email'];
        $password = $_POST['password'];
        $repeat_password = $_POST['repeat_password'];
        $image_url = $_POST['image_url'];
        $admin = new Admin();
        $admin -> adminRegistration ( $first_name , $last_name , $email , $repeat_email 
    , $password , $repeat_password , $image_url);

    }// main isset


} catch ( PDOException $e ){
    echo $e -> getMessage();
}

?>

                    <form action="" method="POST" >
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" placeholder="First Name" name="first_name">
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" placeholder="Last Name" name="last_name">
                        </div>
                        <div class="form-group">
                                <label>Email address</label>
                                <input type="email" class="form-control" placeholder="Email" name="email">
                        </div>                            
                        <div class="form-group">
                                <label>Repeat Email address</label>
                                <input type="email" class="form-control" placeholder="Repeat email address" name="repeat_email">
                        </div>
                        <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                        <div class="form-group">
                                    <label>Repeat Password</label>
                                    <input type="password" class="form-control" placeholder="Password" name="repeat_password">
                        </div>
                        <div class="form-group">
                                    <label>Image URL</label>
                                    <input type="text" class="form-control" placeholder="Password" name="image_url">
                        </div>
                                    
                                    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30" name="adminRegistration">Register</button>
                                    <div class="social-login-content">
                                        <div class="social-button">
                                            <button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i class="ti-facebook"></i>Register with facebook</button>
                                            <button type="button" class="btn social twitter btn-flat btn-addon mt-2"><i class="ti-twitter"></i>Register with twitter</button>
                                        </div>
                                    </div>
                                    <div class="register-link m-t-15 text-center">
                                        <p>Already have account ? <a href="admin-login.php"> Sign in</a></p>
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

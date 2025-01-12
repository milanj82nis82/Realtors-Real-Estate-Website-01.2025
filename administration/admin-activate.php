<?php
require_once '../include/config.inc.php';
require_once '../include/db.inc.php';
require_once 'include/class_autoloader.inc.php';

try {

    $admin = new Admin();
    $token = $_GET['token'];
    if(!$token && empty($token)){
        header('Location:admin-register.php');
        exit();
    }

    $admin -> activateAdminAccount($token);



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
                
<br>

<h3 class="text-center">Your account is activated.</h3><br><br>
<p class="text-center">Click on link to <a href="admin-login.php">login</a>. </p>
          
<br>
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

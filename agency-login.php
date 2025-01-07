<?php require_once 'include/config.inc.php' ?>
<?php require_once 'include/db.inc.php' ?>
<?php require_once 'include/class_autoloader.inc.php';?>

<!doctype html>
<html lang="en">

  <head>
  <?php require_once 'partials/__head.inc.php' ?>
<!-- Facebook meta tags -->

  <meta property="og:type" content="business.business">
<meta property="og:title" content="Real Estate">
<meta property="og:url" content="http://localhost/real-estate/">
<meta property="og:image" content="http://localhost/real-estate/images/hero_1.jpg">
<meta property="business:contact_data:street_address" content="Branka Miljkovića 8">
<meta property="business:contact_data:locality" content="Niš">
<meta property="business:contact_data:region" content="Nišavski okrug">
<meta property="business:contact_data:country_name" content="Serbia">
<style type="text/css">


@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif
}

body {
    height: 100vh;
   
}


.panel-heading {
    text-align: center;
    margin-bottom: 10px
}

#forgot {
    min-width: 100px;
    margin-left: auto;
    text-decoration: none
}

a:hover {
    text-decoration: none
}

.form-inline label {
    padding-left: 10px;
    margin: 0;
    cursor: pointer
}

.btn.btn-primary {
    margin-top: 20px;
    border-radius: 15px
}

.panel {
    min-height: 380px;
    box-shadow: 20px 20px 80px rgb(218, 218, 218);
    border-radius: 12px
}

.input-field {
    border-radius: 5px;
    padding: 5px;
    display: flex;
    align-items: center;
    cursor: pointer;
    border: 1px solid #ddd;
    color: #4343ff
}

input[type='text'],
input[type='password'] {
    border: none;
    outline: none;
    box-shadow: none;
    width: 100%
}

.fa-eye-slash.btn {
    border: none;
    outline: none;
    box-shadow: none
}

img {
    width: 40px;
    height: 40px;
    object-fit: cover;
    border-radius: 50%;
    position: relative
}

a[target='_blank'] {
    position: relative;
    transition: all 0.1s ease-in-out
}

.bordert {
    border-top: 1px solid #aaa;
    position: relative
}

.bordert:after {
    content: "or connect with";
    position: absolute;
    top: -13px;
    left: 33%;
    background-color: #fff;
    padding: 0px 8px
}

@media(max-width: 360px) {
    #forgot {
        margin-left: 0;
        padding-top: 10px
    }

    body {
        height: 100%
    }

    .container {
        margin: 30px 0
    }

    .bordert:after {
        left: 25%
    }
}


</style>



  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    
    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>



<?php require_once 'partials/__header.inc.php' ?>

  <?php  require_once 'partials/__cover_image_top.inc.php'?>
    

  <div class="container" style="margin: 50px 50px 50px 50px;">
    <div class="row">
        <div class="offset-md-2 col-lg-5 col-md-7 offset-lg-4 offset-md-3">
            <div class="panel border bg-white">
                <div class="panel-heading">
                    <h3 class="pt-3 font-weight-bold">Agency Login</h3>
                </div>
                <div class="panel-body p-3">
                    <form action="" method="POST">
                        <div class="form-group py-2">
                            <div class="input-field"> <span class="far fa-user p-2"></span> <input type="text" placeholder="Username or Email" required> </div>
                        </div>
                        <div class="form-group py-1 pb-2">
                            <div class="input-field"> <span class="fas fa-lock px-2"></span> <input type="password" placeholder="Enter your Password" required> <button class="btn bg-white text-muted"> <span class="far fa-eye-slash"></span> </button> </div>
                        </div>
                        <div class="form-inline"> <input type="checkbox" name="remember" id="remember"> <label for="remember" class="text-muted">Remember me</label> <a href="#" id="forgot" class="font-weight-bold">Forgot password?</a> </div>
                        <button class="btn btn-primary btn-block mt-3"  type="submit" name="adminLogin">Login</button>
                        
                        <div class="text-center pt-4 text-muted">Don't have an account? <a href="#">Sign up</a> </div>
                    </form>
                </div>
                <div class="mx-3 my-2 py-2 bordert">
                    <div class="text-center py-3"> <a href="https://wwww.facebook.com" target="_blank" class="px-2"> <img src="https://www.dpreview.com/files/p/articles/4698742202/facebook.jpeg" alt=""> </a> <a href="https://www.google.com" target="_blank" class="px-2"> <img src="https://www.freepnglogos.com/uploads/google-logo-png/google-logo-png-suite-everything-you-need-know-about-google-newest-0.png" alt=""> </a> <a href="https://www.github.com" target="_blank" class="px-2"> <img src="https://www.freepnglogos.com/uploads/512x512-logo-png/512x512-logo-github-icon-35.png" alt=""> </a> </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'partials/__testemonials.inc.php' ?> 



<?php require_once 'partials/__footer.inc.php' ?>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>

  </body>

</html>


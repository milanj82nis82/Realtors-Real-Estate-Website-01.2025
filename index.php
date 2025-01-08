<?php require_once 'include/config.inc.php' ?>
<?php require_once 'include/db.inc.php' ?>
<?php require_once 'include/class_autoloader.inc.php';?>
<?php
require_once 'include/phpFlashMessages/src/FlashMessages.php'; 
$msg = new \Plasticbrain\FlashMessages\FlashMessages(); 
?>
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
    

<?php  require_once 'partials/__advanced_search.inc.php' ?>

<?php  require_once 'partials/__about_us.inc.php'?>

<?php require_once 'partials/__latest_properties.inc.php' ?>
<?php require_once 'partials/__agents.inc.php'  ?>
<?php require_once 'partials/__testemonials.inc.php' ?> 

<?php require_once 'partials/__blog_posts_home.inc.php' ?>

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


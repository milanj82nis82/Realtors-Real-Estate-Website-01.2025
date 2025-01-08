<?php require_once 'include/config.inc.php' ?>
<?php require_once 'include/db.inc.php' ?>
<?php require_once 'include/class_autoloader.inc.php' ?>

<?php

try {


$categorySlug = $_GET['slug'];

$blog = new Blog();
$category = new Category();
$categoryTitle = $category -> getCategoryDetails($categorySlug)['name'];









} catch ( PDOException $e ){
    echo $e -> getMessage();
}



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
    







<div class="site-section bg-light">
      <div class="container">
<div class="row">
  <div class="col-md-12">
    <h2 class="text-center">Welcome to <strong><?php  echo $categoryTitle ?></strong> category</h2>
  </div>
</div>
<br><br>

        <div class="row">
          
<?php

try {

$blog = new Blog();
$admin = new Admin();
$user = new User();
foreach ( $blog -> getAllBlogPosts()['posts'] as $postSingle ) {
  
  ?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="post-entry-1 h-100">
              <a href="blog-single.php?slug=<?php echo $postSingle['slug']  ?>">
                <img src="images/img_1.jpg" alt="Image"
                 class="img-fluid">
              </a>
              <div class="post-entry-1-contents">
                
                <h2><a href="blog-single.php?slug=<?php echo $postSingle['slug']  ?>"><?php echo $postSingle['title']  ?></a></h2>
                <span class="meta d-inline-block mb-3"><?php echo $postSingle['created_at']  ?> 
                <span class="mx-2">by</span> <a href="#"><?php echo $admin -> getAdminDetailsById($postSingle['admin_id'])['first_name'] .' 
                '.  $admin -> getAdminDetailsById($postSingle['admin_id'])['last_name']  ?></a></span>
                <p><?php echo substr( $postSingle['excerpt'], 0 , 200 )  ?>...</p>
              </div>
            </div>
          </div>
         

<?php
}// end foreach




} catch ( PDOException $e ){
  echo $e -> getMessage();
}


?>

<div class="col-12 mt-5 text-center pagination-39291">
<?php  

try {

$pages = $blog -> getAllBlogPosts()['pages'];

for ( $x =1 ; $x <= $pages ; $x++ ){
    $perPage = $blog -> getAllBlogPosts()['per-page'];
?>
  
    <a  href="blog.php?page=<?php echo $x ?>&per-page=<?php echo $perPage ?>"><?php echo $x ; ?> </a>
<?php

}


} catch ( PDOException $e ){
    echo $e -> getMessage();
}


?>

         
          

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


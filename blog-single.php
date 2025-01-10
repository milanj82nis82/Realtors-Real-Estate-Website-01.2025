<?php ob_start(); ?>
<?php require_once 'include/config.inc.php' ?>
<?php require_once 'include/db.inc.php' ?>
<?php require_once 'include/class_autoloader.inc.php';?>
<?php
require_once 'include/phpFlashMessages/src/FlashMessages.php'; 
$msg = new \Plasticbrain\FlashMessages\FlashMessages(); 
?>
<?php

try{
  $blog = new Blog();
  $user = new User();
  $category = new Category();
  $admin = new Admin();
  
  $slug = $_GET['slug'];

  $blogTitle = $blog -> getBlogDetailsBySlug( $slug )['title'];
  $blogContent = $blog -> getBlogDetailsBySlug( $slug )['content'];
  $blogCategory = $blog -> getBlogDetailsBySlug( $slug )['category_id'];
  $blogAdminId = $blog -> getBlogDetailsBySlug( $slug )['admin_id'];
  $blogCreatedAt = $blog -> getBlogDetailsBySlug( $slug )['created_at'];
  $blogUpdatedAt = $blog -> getBlogDetailsBySlug( $slug )['updated_at'];
  $blogExcerpt = $blog -> getBlogDetailsBySlug( $slug )['excerpt'];
  $blogSlug = $blog -> getBlogDetailsBySlug( $slug )['slug'];
  
  



} catch ( PDOException $e){
    $error = $e -> getMessage();
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
    
  <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-8 blog-content">
          
          
<h3 class="text-center"><?php  echo $blogTitle ?></h3>
<br>

<div class="jumbotron">
 
  <p> <?php  echo $blogContent; ?></p>
 
</div>

         <hr>
         <?php require_once 'include/facebook_share.inc.php' ?>

            <div class="pt-5">
              <p>Category:  <a href="#">
      <?php 
          
echo  $category -> getBlogCategoryDetailsById($blogCategory)['name'];

?>

              </a>  |  
              Author: <a href="#">#html</a></p>
            </div>


            <div class="pt-5">
              <h3 class="mb-5">Comments</h3>
             
              <?php require_once 'partials/dusqus.inc.php' ?>
         
              
            </div>

          </div>
          <div class="col-md-4 sidebar">
            <div class="sidebar-box">
              <form action="#" class="search-form">
                <div class="form-group">
                  <span class="icon fa fa-search"></span>
                  <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                </div>
              </form>
            </div>
            <div class="sidebar-box">
              <div class="categories">
                <h3>Categories</h3>

<?php

try {


  $category = new Category();
  $blog = new Blog();

foreach( $category -> getBlogCategories() as $categorySingle ){
?>

<li><a href="view-blog-category.php?slug=<?php  echo $categorySingle['slug'] ?>"><?php  echo $categorySingle['name']  ?> <span>(
  
  <?php echo $category -> getBlogCountInCategory( $categorySingle['id'] ) ?>
  
  )</span></a></li>
<?php

}// enf foreach



} catch ( PDOException $e ){
  echo $e -> getMessage();
}




?>
                
               
              </div>
            </div>
            <div class="sidebar-box">
              <img src="images/person_1.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid mb-4 w-50 rounded-circle">
              <h3 class="text-black">About The Author</h3>
              <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
              <p><a href="#" class="btn btn-primary btn-md text-white">Read More</a></p>
            </div>

            <div class="sidebar-box">
              <h3 class="text-black">Paragraph</h3>
              <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
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
<?php ob_end_flush(); ?>

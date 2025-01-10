<?php ob_start(); ?>
<?php require_once 'include/config.inc.php' ?>
<?php require_once 'include/db.inc.php' ?>
<?php require_once 'include/class_autoloader.inc.php';?>
<?php
require_once 'include/phpFlashMessages/src/FlashMessages.php'; 
$msg = new \Plasticbrain\FlashMessages\FlashMessages(); 

try {

    $forum = new Forum();
    $postId = (int)$_GET['postId'];
    if( !$postId && empty($postId)){
        header('Location:forum.php');
        exit();
    }
    $postName = $forum -> getPostDetailsByPostId($postId)['title'];
    $postDescription = $forum -> getPostDetailsByPostId($postId)['description'];
    $forum -> updateReplyViews( $postId );


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
<link rel="stylesheet" href="include/fontawesome/css/all.css">


<style type="text/css">


.white-bg {
    background-color: #ffffff;
}
.page-heading {
    border-top: 0;
    padding: 0 10px 20px 10px;
}

.forum-post-container .media {
  margin: 10px 10px 10px 10px;
  padding: 20px 10px 20px 10px;
  border-bottom: 1px solid #f1f1f1;
}
.forum-avatar {
  float: left;
  margin-right: 20px;
  text-align: center;
  width: 110px;
}
.forum-avatar .img-circle {
  height: 48px;
  width: 48px;
}
.author-info {
  color: #676a6c;
  font-size: 11px;
  margin-top: 5px;
  text-align: center;
}
.forum-post-info {
  padding: 9px 12px 6px 12px;
  background: #f9f9f9;
  border: 1px solid #f1f1f1;
}
.media-body > .media {
  background: #f9f9f9;
  border-radius: 3px;
  border: 1px solid #f1f1f1;
}
.forum-post-container .media-body .photos {
  margin: 10px 0;
}
.forum-photo {
  max-width: 140px;
  border-radius: 3px;
}
.media-body > .media .forum-avatar {
  width: 70px;
  margin-right: 10px;
}
.media-body > .media .forum-avatar .img-circle {
  height: 38px;
  width: 38px;
}
.mid-icon {
  font-size: 66px;
}
.forum-item {
  margin: 10px 0;
  padding: 10px 0 20px;
  border-bottom: 1px solid #f1f1f1;
}
.views-number {
  font-size: 24px;
  line-height: 18px;
  font-weight: 400;
}
.forum-container,
.forum-post-container {
  padding: 30px !important;
}
.forum-item small {
  color: #999;
}
.forum-item .forum-sub-title {
  color: #999;
  margin-left: 50px;
}
.forum-title {
  margin: 15px 0 15px 0;
}
.forum-info {
  text-align: center;
}
.forum-desc {
  color: #999;
}
.forum-icon {
  float: left;
  width: 30px;
  margin-right: 20px;
  text-align: center;
}
a.forum-item-title {
  color: inherit;
  display: block;
  font-size: 18px;
  font-weight: 600;
}
a.forum-item-title:hover {
  color: inherit;
}
.forum-icon .fa {
  font-size: 30px;
  margin-top: 8px;
  color: #9b9b9b;
}
.forum-item.active .fa {
  color: #1ab394;
}
.forum-item.active a.forum-item-title {
  color: #1ab394;
}
@media (max-width: 992px) {
  .forum-info {
    margin: 15px 0 10px 0;
    /* Comment this is you want to show forum info in small devices */
    display: none;
  }
  .forum-desc {
    float: none !important;
  }
}
.ibox {
  clear: both;
  margin-bottom: 25px;
  margin-top: 0;
  padding: 0;
}
.ibox.collapsed .ibox-content {
  display: none;
}
.ibox.collapsed .fa.fa-chevron-up:before {
  content: "\f078";
}
.ibox.collapsed .fa.fa-chevron-down:before {
  content: "\f077";
}
.ibox:after,
.ibox:before {
  display: table;
}
.ibox-title {
  -moz-border-bottom-colors: none;
  -moz-border-left-colors: none;
  -moz-border-right-colors: none;
  -moz-border-top-colors: none;
  background-color: #ffffff;
  border-color: #e7eaec;
  border-image: none;
  border-style: solid solid none;
  border-width: 3px 0 0;
  color: inherit;
  margin-bottom: 0;
  padding: 14px 15px 7px;
  min-height: 48px;
}
.ibox-content {
  background-color: #ffffff;
  color: inherit;
  padding: 15px 20px 20px 20px;
  border-color: #e7eaec;
  border-image: none;
  border-style: solid solid none;
  border-width: 1px 0;
}
.ibox-footer {
  color: inherit;
  border-top: 1px solid #e7eaec;
  font-size: 90%;
  background: #ffffff;
  padding: 10px 15px;
}

.message-input {
    height: 90px !important;
}
.form-control, .single-line {
    background-color: #FFFFFF;
    background-image: none;
    border: 1px solid #e5e6e7;
    border-radius: 1px;
    color: inherit;
    display: block;
    padding: 6px 12px;
    transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
    width: 100%;
    font-size: 14px;
}
.text-navy {
    color: #1ab394;
}
.mid-icon {
    font-size: 66px !important;
}
.m-b-sm {
    margin-bottom: 10px;
}



.be-comment-block {
    margin-bottom: 50px !important;
    border: 1px solid #edeff2;
    border-radius: 2px;
    padding: 50px 70px;
    border:1px solid #ffffff;
}

.comments-title {
    font-size: 16px;
    color: #262626;
    margin-bottom: 15px;
    font-family: 'Conv_helveticaneuecyr-bold';
}

.be-img-comment {
    width: 60px;
    height: 60px;
    float: left;
    margin-bottom: 15px;
}

.be-ava-comment {
    width: 60px;
    height: 60px;
    border-radius: 50%;
}

.be-comment-content {
    margin-left: 80px;
}

.be-comment-content span {
    display: inline-block;
    width: 49%;
    margin-bottom: 15px;
}

.be-comment-name {
    font-size: 13px;
    font-family: 'Conv_helveticaneuecyr-bold';
}

.be-comment-content a {
    color: #383b43;
}

.be-comment-content span {
    display: inline-block;
    width: 49%;
    margin-bottom: 15px;
}

.be-comment-time {
    text-align: right;
}

.be-comment-time {
    font-size: 11px;
    color: #b4b7c1;
}

.be-comment-text {
    font-size: 13px;
    line-height: 18px;
    color: #7a8192;
    display: block;
    background: #f6f6f7;
    border: 1px solid #edeff2;
    padding: 15px 20px 20px 20px;
   
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
    

<br>
<div class="container">
<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInRight">

            <div class="ibox-content m-b-sm border-bottom">
                <div class="p-xs">
                    <div class="pull-left m-r-md">
                        <i class="fa fa-globe text-navy mid-icon"></i>
                    </div>
                    <h2><?php echo $postName; ?></h2>
                    <span><?php echo $postDescription; ?></span>
                </div>
            </div>

            <div class="ibox-content forum-container">
<?php

try {

    $forum = new Forum();
  $repliesInPosts = $forum -> getAllRepliesByPostId($postId);

  if( count($repliesInPosts) > 0 ){


$user = new User();
?>
	<h1 class="comments-title">Comments (3)</h1>
<?php
    foreach ( $forum -> getAllRepliesByPostId($postId) as $replieSingle){
        ?>






	



	<div class="be-comment">
		<div class="be-img-comment">	
			<a href="">
				<img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="" class="be-ava-comment">
			</a>
		</div>
		<div class="be-comment-content">
			<span class="be-comment-name">
				<a href=""><?php echo $user -> getUserDetails($replieSingle['user_id'])['first_name'] . '
                 ' .  $user -> getUserDetails($replieSingle['user_id'])['first_name'] ?></a>
			</span>
			<span class="be-comment-time">
				<i class="fa fa-clock-o"></i>
				<?php echo $replieSingle['created_at']; ?>
			</span>
			<div class="be-comment-text">
				<?php echo $replieSingle['content'] ?>
			</div>
            <div class="be-comment-text">
				<?php echo $replieSingle['likes'] ?> <i class="fa-solid fa-thumbs-up"></i> | 
                <?php echo $replieSingle['dislikes'] ?> <i class="fa-solid fa-thumbs-down"></i> 
			</div>
           
		</div>
	</div>

    <br><hr><br>




    




        
        <?php
        }// end foreach
        

  } else {

    echo '<div class="alert alert-primary" role="alert">
  This thread dont have any posts.
</div>';
  }





} catch ( PDOException $e) {
    echo $e->getMessage();
}


?>
             

                





            </div>
        </div>
    </div>
</div>
</div>

<br><br>


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
<script src="include/fontawesome/js/all.js"></script>
  </body>

</html>
<?php ob_end_flush(); ?>

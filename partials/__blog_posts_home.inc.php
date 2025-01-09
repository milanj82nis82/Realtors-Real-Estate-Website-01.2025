<div class="site-section bg-light">
      <div class="container">

        <div class="row justify-content-center mb-5">
          <div class="col-md-6 text-center">
            <h3 class="heading-29201 text-center">Latest Blog Posts</h3>
            
            <p class="mb-5">This is our last 6 blog posts.</p>
          </div>
        </div>

        <div class="row">
          
<?php

try {
  $blog = new Blog();
  $admin = new Admin();
  foreach ( $blog -> getCarouselBlogPosts() as $blogSingle ){
?>

<div class="col-lg-4 col-md-6 mb-4">
            <div class="post-entry-1 h-100">
              <a href="single.html">
                <img src="images/img_1.jpg" alt="Image"
                 class="img-fluid">
              </a>
              <div class="post-entry-1-contents">
                
                <h2><a href="blog-single.php?slug=<?php  echo $blogSingle['slug'] ?>">
                <?php  echo $blogSingle['title'] ?></a></h2>
                <span class="meta d-inline-block mb-3"><?php  echo get_time_ago( strtotime($blogSingle['created_at']) ); ?>
                 <span class="mx-2">by</span> <a href="#">
                  <?php  echo $admin -> getAdminDetailsById($blogSingle['admin_id'])['first_name'] .' 
                  '. $admin -> getAdminDetailsById($blogSingle['admin_id'])['last_name'] ?></a></span>
                <p><?php  echo substr($blogSingle['excerpt'] , 0 , 200 ) ?></p>
              </div>
            </div>
          </div>
  

<?php

  }// end foreach



} catch ( PDOException $e ){
  echo $e -> getMessage();
}




?>

          

        </div>
      </div>
    </div>

    
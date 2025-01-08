<?php require_once ( 'include/config.inc.php'); ?>
<?php require_once ( 'include/db.inc.php'); ?>
<?php require_once ( 'include/class_autoloader.inc.php'); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once ( 'partials/__head.inc.php'); ?>
    <title>Home page | <?php echo SITE_NAME ;?></title>
    </head>
    <body>

    <?php require_once ('partials/__nav.inc.php'); ?>

       
<?php require_once ( 'partials/__header.inc.php'); ?>

       
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <!-- Post preview-->
 <?php   
 try {

$blog = new Blog();
$user = new User();

foreach ($blog -> getHomeBlogPosts()['posts'] as $blogPost){
?>
                  <div class="post-preview">
                        <a href="view-posts.php?id=<?php echo $blogPost['id'] ?>">
                            <h2 class="post-title"><?php echo $blogPost['title'] ?></h2>
                            <h3 class="post-subtitle"><?php echo substr( $blogPost['content'] , 0 , 240 ) ;?></h3>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="view-user.php?id=<?php echo $blogPost['user_id'] ?>">  
                                <strong>
                            <?php  
                            echo $user -> getUserDetailsById($blogPost['user_id'])['first_name'] . ' 
                            ' . $user -> getUserDetailsById($blogPost['user_id'])['last_name'] ;   
                            
                            ?>
                                </strong>
</a>
                            on <strong><?php echo $blogPost['created_at'] ?></strong>
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
<?php
}



 } catch ( PDOException $e ){
    echo $e -> getMessage();
 }
 
 
 ?>

              
                    <!-- Pager-->
                    <div class="d-flex justify-content-end mb-4">
                    <nav aria-label="Page navigation example">

                    <ul class="pagination">
  

<?php  

try {

$pages = $blog -> getHomeBlogPosts()['pages'];

for ( $x =1 ; $x <= $pages ; $x++ ){
    $perPage = $blog -> getHomeBlogPosts()['per-page'];
?>

    <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $x ?>&per-page=<?php echo $perPage ?>"><?php echo $x ; ?> </a></li>
<?php

}


} catch ( PDOException $e ){
    echo $e -> getMessage();
}


?>

 

   
  </ul>
</nav>
                    
                    
                    </div>
                </div>
            </div>
        </div>
       
          <?php require_once ( 'partials/__footer.inc.php'); ?>
        
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>

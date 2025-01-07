
<div class="site-section bg-primary">
      <div class="container block-13">
        <div class="nonloop-block-13 owl-carousel">

<?php

try {


  $testemonial = new Testemonial();
$user = new User();
$property = new Property();
  foreach ( $testemonial -> getAllTestemonials() as $testemonialSingle ){


    ?>

<div class="testimonial-38920 d-flex align-items-start">
            <div class="pic mr-4"><img src="<?php echo $testemonialSingle['image_url'];  ?>" 
            alt="<?php echo $property -> getPropertyDetailsById($testemonialSingle['property_id'])['name']; ?>"></div>
            <div>
              <span class="meta">
      
        <?php echo $property -> getPropertyDetailsById($testemonialSingle['property_id'])['name']; ?>
      
              </span>
              <h3 class="mb-4"><?php echo $user -> getUserDetails($testemonialSingle['client_id'])['first_name'] .' 
              '.   $user -> getUserDetails($testemonialSingle['client_id'])['last_name'] ?></h3>
              <p> <?php echo $testemonialSingle['comment'];  ?></p>
              <div class="mt-4">

<?php

if( $testemonialSingle['rating'] == 1 ){
  echo '<span class="icon-star text-warning"></span>';
} else if( $testemonialSingle['rating'] == 2 ){
  echo '<span class="icon-star text-warning"></span>
  <span class="icon-star text-warning"></span>';
} else if( $testemonialSingle['rating'] == 3 ){
  echo '<span class="icon-star text-warning"></span>
  <span class="icon-star text-warning"></span>
  <span class="icon-star text-warning"></span>';
} else if( $testemonialSingle['rating'] == 4 ){
  echo '<span class="icon-star text-warning"></span>
  <span class="icon-star text-warning"></span>
  <span class="icon-star text-warning"></span>
  <span class="icon-star text-warning"></span>';
} else if( $testemonialSingle['rating'] == 5 ){
  echo '<span class="icon-star text-warning"></span>
  <span class="icon-star text-warning"></span>
  <span class="icon-star text-warning"></span>
  <span class="icon-star text-warning"></span>
  <span class="icon-star text-warning"></span>';
}

?>
    
           
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

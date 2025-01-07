<header class="site-navbar site-navbar-target" role="banner">

<div class="container">
  <div class="row align-items-center position-relative">

    <div class="col-3 ">
      <div class="site-logo">
        <a href="index.php">Realtors</a>
      </div>
    </div>

    <div class="col-9  text-right">
      

      <span class="d-inline-block d-lg-none"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>

      

      <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
        <ul class="site-menu main-menu js-clone-nav ml-auto ">
          <li><a href="index.php" class="nav-link">Home</a></li>
          <li><a href="agents.php" class="nav-link">Agents</a></li>
          <li><a href="property.php" class="nav-link">Property</a></li>
          <li><a href="about.php" class="nav-link">About</a></li>
          <li><a href="blog.php" class="nav-link">Blog</a></li>
          <li><a href="contact.php" class="nav-link">Contact</a></li>

<?php
try {

  $user = new User();
 
if( !$user -> checkLoginStatus()){
?>


<li>
<div class="dropdown">
<button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Welcome Guest
</button>
<div class="dropdown-menu">
<a class="dropdown-item" href="agent-login.php">Login as agent</a>
<a class="dropdown-item" href="agency-login.php">Login as agency</a>
<a class="dropdown-item" href="client-login.php">Login as client</a>


<div class="dropdown-divider"></div>
<a class="dropdown-item" href="forgot-password.php">Forgot password ?</a>
</div>
</div>

</li>




<?php
} else {

  if( isset($_SESSION['logged_as_admin']) ){
   ?>

<li>
<div class="dropdown">
<button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Welcome back Admin
</button>
<div class="dropdown-menu">
<a class="dropdown-item" href="agent-login.php">Blog administration</a>
<a class="dropdown-item" href="agency-login.php">Agency administration</a>
<a class="dropdown-item" href="agent-login.php">Agent administration</a>


<div class="dropdown-divider"></div>

<?php
try {

if( isset($_POST['userLogout']) ){
  $user -> logout();
}

} catch ( PDOException $e ){
  echo $e -> getMessage();
}


?>


<form action="" method="POST">

<button class="dropdown-item" name="userLogout">Logout</button>
</form>



</div>
</div>

</li>



<?php
  } else if( isset($_SESSION['logged_as_agency']) ){
    ?>  
  
<li>
<div class="dropdown">
<button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Welcome back Agency
</button>
<div class="dropdown-menu">
<a class="dropdown-item" href="agent-login.php">Agency administration</a>
<a class="dropdown-item" href="agent-login.php">Our agents</a>


<div class="dropdown-divider"></div>
<a class="dropdown-item" href="logout.php">Logout</a>
</div>
</div>

</li>



<?php
  } else if( isset($_SESSION['logged_as_agent']) ){
    ?>  
   
<li>
<div class="dropdown">
<button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Welcome back Agent
</button>
<div class="dropdown-menu">
<a class="dropdown-item" href="agent-login.php">My account</a>
<a class="dropdown-item" href="agent-login.php">My agency </a>
<a class="dropdown-item" href="agent-login.php">My properties </a>
<a class="dropdown-item" href="agent-login.php">My messages </a>


<div class="dropdown-divider"></div>
<a class="dropdown-item" href="logout.php">Logout</a>
</div>
</div>

</li>


    <?php 

  } else if( isset($_SESSION['logged_as_client']) ){
    ?>

  
<li>
<div class="dropdown">
<button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Welcome back Client
</button>
<div class="dropdown-menu">
<a class="dropdown-item" href="agent-login.php">My account</a>
<a class="dropdown-item" href="agent-login.php">My transactions </a>
<a class="dropdown-item" href="agent-login.php">Wish list </a>
<a class="dropdown-item" href="agent-login.php">My messages </a>


<div class="dropdown-divider"></div>
<a class="dropdown-item" href="logout.php">Logout</a>
</div>
</div>

</li>




<?php

}

}


} catch (Exception $e) {
  
} 

 

?>





       





        </ul>
      </nav>
    </div>

    
  </div>
</div>

</header>
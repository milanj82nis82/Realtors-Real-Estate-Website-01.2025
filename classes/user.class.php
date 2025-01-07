<?php

class User extends DbConnect {

   
public function checkLoginStatus(){


    
    if( isset($_SESSION['logged_as_admin'])   ||  isset($_SESSION['logged_as_agency'])   ||  
    isset($_SESSION['logged_as_agent'])   ||  isset($_SESSION['logged_as_client'])   ){
        return true;
    } else {
        return false;
    }

}// checkIsUserLoggedIn

public function logout(){

    session_destroy();
    header('Location: index.php');
    exit;   
}






}// User



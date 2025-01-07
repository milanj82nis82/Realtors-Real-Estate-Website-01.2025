<?php

class User extends DbConnect {

   public function getUserDetails($id){

    $sql = 'select * from clients where id = :id';
    $query = $this -> connect() -> prepare($sql);   
    $query -> bindParam(':id', $id, PDO::PARAM_INT);
    $query -> execute();        
    $user = $query -> fetch();
    return $user;   


   }// getUserDetails




   
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



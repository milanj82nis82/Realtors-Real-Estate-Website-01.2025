<?php


class Admin extends DbConnect {

public function getAdminDetailsById( $id ){

    $sql = 'select * from admins where id = ? limit 1 ';
    $query = $this -> connect() -> prepare($sql);
    $query -> execute( [ $id ] );
    $result = $query -> fetch();
    return $result;

}// getAdmnDetails

public function checkIsUserAdmin(){

        if( isset($_SESSION['logged_as_admin'])){
            return true;
        } else {
            return false;
        }


}// checkIsUserAdmin

public function addForum( $title , $description , $admin_id ){

    $sql = 'insert into forums ( name , description , admin_id , created_at , updated_at  ) values 
    ( ? , ? , ? , ? , ? )';
     $query = $this -> connect() -> prepare($sql);
     $created_at = date('Y-m-d H:i:s');
     $updated_at = date('Y-m-d H:i:s');
     $query -> execute( [   $title , $description , $admin_id , $created_at , $updated_at ]);
    header('Location:forum.php');
    exit();

}// addForum




}// Admin




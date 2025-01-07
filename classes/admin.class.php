<?php


class Admin extends DbConnect {

public function getAdminDetailsById( $id ){

    $sql = 'select * from admins where id = ? limit 1 ';
    $query = $this -> connect() -> prepare($sql);
    $query -> execute( [ $id ] );
    $result = $query -> fetch();
    return $result;



}// getAdmnDetails




}




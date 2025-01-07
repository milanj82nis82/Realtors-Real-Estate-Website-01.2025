<?php

class Property extends DbConnect {

    public function  getPropertyDetailsById($id){

            $sql = 'select * from properties where id = :id';   
            $query = $this -> connect() -> prepare($sql);
            $query -> bindParam(':id', $id, PDO::PARAM_INT);
            $query -> execute();
            $property = $query -> fetch();
            return $property;
            
    }// getPropertyDetailsById


    public function getAllProperties(){

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = isset($_GET['per-page']) && (int)$_GET['per-page'] <= 24 ? (int)$_GET['per-page'] : 24;
        $start = ( $page > 1 ) ? ( $page * $perPage ) - $perPage : 0;
        $sql = 'select * from properties order by created_at desc LIMIT :start , :perPage ';
        $query = $this -> connect() -> prepare($sql);
        $query -> bindParam( ':start' , $start , PDO::PARAM_INT);
        $query -> bindParam( ':perPage' , $perPage , PDO::PARAM_INT);
        $query -> execute();
        $posts = $query -> fetchAll();
        $sql = 'select * from properties ';
        $query = $this -> connect() -> query($sql);
        $postsCount = $query -> fetchAll();
        $AllCount = count( $postsCount);

        $pages = ceil( $AllCount / $perPage);

        return array( 'posts' => $posts , 'pages' => $pages , 'per-page' => $perPage);
     



    }// getAllProperties



}// 



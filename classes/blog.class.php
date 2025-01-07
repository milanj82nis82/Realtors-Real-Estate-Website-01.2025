<?php

class Blog extends DbConnect {


    public function getAllBlogPosts(){


        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = isset($_GET['per-page']) && (int)$_GET['per-page'] <= 12 ? (int)$_GET['per-page'] : 12;
        $start = ( $page > 1 ) ? ( $page * $perPage ) - $perPage : 0;


       $sql = 'select * from blogs order by created_at desc  LIMIT :start , :perPage ';
       $query = $this -> connect() -> prepare($sql);
       $query -> bindParam( ':start' , $start , PDO::PARAM_INT);
       $query -> bindParam( ':perPage' , $perPage , PDO::PARAM_INT);
       $query -> execute();
       $posts = $query -> fetchAll();

       $sql = 'select * from blogs order by created_at desc';
       $query = $this -> connect() -> query($sql);
       $postsCount = $query -> fetchAll();
       $AllCount = count( $postsCount);

       $pages = ceil( $AllCount / $perPage);

       return array( 'posts' => $posts , 'pages' => $pages , 'per-page' => $perPage);


    }// getAllBlogPosts

    public function getCarouselBlogPosts(){

        $sql = 'select * from blogs order by created_at desc limit 6';
        $query = $this -> connect() -> query($sql);
        $result = $query -> fetchAll();
        return $result;
        
       

    } // getCaraouselBlogPosts




}// Blog





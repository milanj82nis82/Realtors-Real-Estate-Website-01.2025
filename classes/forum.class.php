<?php


class Forum extends DbConnect {

    public function getAllForums(){

        $sql = 'select * from forums order by name asc';
        $query = $this -> connect() -> query($sql);
        $forums = $query -> fetchAll();
        return $forums;

    }// getAllForums

    public function getAllThreadsByForumId( $forumId){

        $sql = 'select * from threads where forum_id = ? order by created_at desc limit 3';
        $query = $this -> connect() -> prepare($sql);
        $query -> execute( [ $forumId]);
        $threads = $query -> fetchAll();
        return $threads;

    }// getAllThreadsByForumId

    public function getPostsCountInThreadsByThreadId($threadId){

        $sql = 'select count(*) as posts_count from posts where thread_id = ?';
        $query = $this -> connect() -> prepare($sql);
        $query -> execute( [ $threadId]);
        $postsCount = $query -> fetch();
        return $postsCount['posts_count'];



    }// getPostsCountInThreadsByThreadId
public function getAllPostsByThreadId( $thread_id){

    $sql = 'select * from posts where thread_id = ? order by created_at asc';
    $query = $this -> connect() -> prepare($sql);
    $query -> execute([$thread_id]);
    $posts = $query -> fetchAll();
    return $posts;

}//   getAllPostsByThreadId

    public function getThreadDetailsById($threadId ){
        $sql = 'select * from threads where id = ? limit 1 ';
        $query = $this -> connect() -> prepare($sql);
        $query -> execute([ $threadId]);
        $thread = $query -> fetch();
        return $thread;
    }// getThreadDetailsById


    public function getPostDetailsByPostId($postId){

        $sql = 'select * from posts where id = ? limit 1 ';
        $query = $this -> connect() -> prepare($sql);
        $query -> execute([ $postId]);
        $post = $query -> fetch();
        return $post;

    }// getPostDetailsById
    public function getAllRepliesByPostId($postId){
        $sql = 'select * from replies where post_id = ? order by created_at asc';
        $query = $this -> connect() -> prepare($sql);
        $query -> execute([$postId]);
        $replies = $query -> fetchAll();
        return $replies;


    }// getAllRepliesByPostId


}// Forum
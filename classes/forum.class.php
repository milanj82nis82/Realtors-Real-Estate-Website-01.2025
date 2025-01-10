<?php


class Forum extends DbConnect {

    public function getAllForums(){

        $sql = 'select * from forums order by name asc';
        $query = $this -> connect() -> query($sql);
        $forums = $query -> fetchAll();
        return $forums;

    }// getAllForums

    public function getAllThreadsByForumId( $forumId){

        $sql = 'select * from threads where forum_id = ? order by created_at desc';
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



}// Forum
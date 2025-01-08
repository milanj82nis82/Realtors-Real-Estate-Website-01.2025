<?php

Class Category extends DbConnect {


    public function getBlogCategories() {
        $sql = "SELECT * FROM categories order by name asc";
        $stmt = $this->connect()->query($sql);
        $results = $stmt->fetchAll();
        return $results;
    }// getBlogCategories   

    public function getBlogCountInCategory(  $category_id  ){

        $sql = 'select * from blogs where category_id = ? ';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$category_id]);
        $results = $stmt->fetchAll();
        $counts = count($results);
        return $counts;


    }// getBlogCountInCategory



}// Category




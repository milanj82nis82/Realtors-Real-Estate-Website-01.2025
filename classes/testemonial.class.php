<?php


class Testemonial extends DbConnect {

public function getAllTestemonials(){

    $sql = 'select * from testimonials order by id asc';
    $query = $this -> connect() -> query($sql);
    $testemonials = $query -> fetchAll();
    return $testemonials;


}// getAllTestemonials





}// Testemonial


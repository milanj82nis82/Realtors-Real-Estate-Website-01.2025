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



}// 



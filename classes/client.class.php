<?php
require_once 'include/phpFlashMessages/src/FlashMessages.php';

class Client extends DbConnect{
    

    function convertTitleToURL($str) { 
        
        // Convert string to lowercase 
        $str = strtolower($str); 
        
        // Replace the spaces with hyphens 
        $str = str_replace(' ', '-', $str); 
        
        // Remove the special characters 
        $str = preg_replace('/[^a-z0-9\-]/', '', $str); 
        
        // Remove the consecutive hyphens 
        $str = preg_replace('/-+/', '-', $str); 
        
        // Trim hyphens from the beginning 
        // and ending of String 
        $str = trim($str, '-'); 
        
        return $str; 
    } 
    
   
    
  
        
    private function checkIsFormEmpty($firstName, $lastName, $email, $phone, $password, $image_url){

    if( !empty($firstName) && !empty($lastName) && !empty($email) && !empty($phone) && !empty($password) && !empty($image_url) ){
        return true;
    }else{
        return false;
    }

    }// checkIsFormEmpty
    private function validateEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }// validateEmail
    private function validatePasswordStrength($password) {
        $pattern = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';
        if (!preg_match($pattern, $password)) {
            return true;
        } else {
            return false;
        }
    }// validatePasswordStrength

    private function validatePasswordLength($password) {
        if (strlen($password) >= 8) {
            return true;
        } else {
            return false;
        }
    }// validatePasswordLength

    public function clientRegistration($firstName, $lastName, $email, $phone, $password, $image_url){

        if ($this -> checkIsFormEmpty( $firstName, $lastName, $email, $phone, $password, $image_url )){
            if( $this -> validateEmail($email) ){
                if( $this -> validatePasswordLength($password) ){
                    if( $this -> validatePasswordStrength($password) ){
                        $password = password_hash($password, PASSWORD_DEFAULT);
                        $sql = "INSERT INTO clients (first_name, last_name, email, phone, password, image_url , is_active , slug) 
                        VALUES (:first_name, :last_name, :email, :phone, :password, :image_url , 0 , :slug )";
                        $stmt = $this->connect()->prepare($sql);
                        $stmt->bindParam(':first_name', $firstName);
                        $stmt->bindParam(':last_name', $lastName);
                        $stmt->bindParam(':email', $email);
                        $stmt->bindParam(':phone', $phone);
                        $stmt->bindParam(':password', $password);
                        $stmt->bindParam(':image_url', $image_url);
                        $stmt -> bindParam(':slug', $this -> convertTitleToURL($firstName . ' ' . $lastName));
                        $stmt->execute();
                        $msg = new \Plasticbrain\FlashMessages\FlashMessages();
                        $msg->success('Registration successful');
                    } else {
                        $msg = new \Plasticbrain\FlashMessages\FlashMessages();
                        $msg->error('Password must contain at least one uppercase letter, one lowercase letter, one number and one special character');
                    }// validatePasswordStrength
                } else {
                    $msg = new \Plasticbrain\FlashMessages\FlashMessages();
                    $msg->error('Password must be at least 8 characters long');
                }// validatePasswordLength
            } else {
                $msg = new \Plasticbrain\FlashMessages\FlashMessages();
                $msg->error('Please enter a valid email address');
            }// validateEmail



        } else {
            $msg = new \Plasticbrain\FlashMessages\FlashMessages();
                $msg->error('Please fill all the fields');


        }// checkIsFormEmpty
        



    }// cleintRegistration







}// Client




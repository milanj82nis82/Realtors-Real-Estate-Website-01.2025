<?php
require_once 'include/phpFlashMessages/src/FlashMessages.php';
require_once 'include/phpmailer/src/Exception.php';
require_once 'include/phpmailer/src/PHPMailer.php';
require_once 'include/phpmailer/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


Class Email extends DbConnect {

    
    private function checkIsEmailValid($email){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }// checkIsEmailValid

    private function checkIsAllFieldsFilled($first_name, $last_name, $emailAddress, $message){
        if(empty($first_name) || empty($last_name) || empty($emailAddress) || empty($message)){
            return false;
        }else{
            return true;
        }
    }// checkIsAllFieldsFilled

   

    public function sendContactEmail($first_name, $last_name, $emailAddress, $message){

        

if( $this -> checkIsAllFieldsFilled($first_name, $last_name, $emailAddress, $message) ){
if( $this -> checkIsEmailValid($emailAddress) ){



      
    $mail = new PHPMailer(true);
        
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                                                  //Send using SMTP
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = PHPMAILER_HOST;
        $mail->SMTPAuth = true;
        $mail->Port = PHPMAILER_PORT;
        $mail->Username = PHPMAILER_USERNAME;
        $mail->Password = PHPMAILER_PASSWORD;                               //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom(  $emailAddress  , $first_name . ' ' . $last_name );
        $mail->addAddress('milan82nis@gmail.com', 'Milan Janković');     //Add a recipient
       
    
       
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Message from customer';
        $mail->Body    = $message;
        $mail->AltBody = $message;
    
        $mail->send();
        $msg = new \Plasticbrain\FlashMessages\FlashMessages();
        $msg->success('Message has been sent');
        
    } catch (Exception $e) {
        $msg = new \Plasticbrain\FlashMessages\FlashMessages();
        $msg->success('Message could not be sent');
        
        
    }



} else {
    $msg = new \Plasticbrain\FlashMessages\FlashMessages();
    $msg->error('Email is not valid');
    return;
}


} else {

    $msg = new \Plasticbrain\FlashMessages\FlashMessages();
    $msg->error('All fields are required');
    return;
}


        


    }// sendContactEmail





}// 



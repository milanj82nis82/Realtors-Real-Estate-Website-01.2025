<?php
require_once 'include/phpmailer/src/Exception.php';
require_once 'include/phpmailer/src/PHPMailer.php';
require_once 'include/phpmailer/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


Class Email extends DbConnect {


    public function sendContactEmail($first_name, $last_name, $emailAddress, $message){

        
      
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
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }


        


    }// sendContactEmail





}// 



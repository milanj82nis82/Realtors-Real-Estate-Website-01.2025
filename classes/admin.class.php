<?php
require_once '../include/phpmailer/src/Exception.php';
require_once '../include/phpmailer/src/PHPMailer.php';
require_once '../include/phpmailer/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
class Admin extends DbConnect {




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
    
public function getAdminDetailsById( $id ){

    $sql = 'select * from admins where id = ? limit 1 ';
    $query = $this -> connect() -> prepare($sql);
    $query -> execute( [ $id ] );
    $result = $query -> fetch();
    return $result;

}// getAdmnDetails

public function checkIsUserAdmin(){

        if( isset($_SESSION['logged_as_admin'])){
            return true;
        } else {
            return false;
        }


}// checkIsUserAdmin

public function addForum( $title , $description , $admin_id ){

    $sql = 'insert into forums ( name , description , admin_id , created_at , updated_at  ) values 
    ( ? , ? , ? , ? , ? )';
     $query = $this -> connect() -> prepare($sql);
     $created_at = date('Y-m-d H:i:s');
     $updated_at = date('Y-m-d H:i:s');
     $query -> execute( [   $title , $description , $admin_id , $created_at , $updated_at ]);
    header('Location:forum.php');
    exit();

}// addForum

private function checkIsAdminRegistrationEmpty( $first_name , $last_name , $email , $repeat_email , $password , 
$repeat_password , $image_url ){
 if( !empty($first_name) &&  !empty($last_name) &&  !empty($email) && 
  !empty($repeat_email) &&  !empty($password) && !empty($repeat_password) &&!empty($image_url)  ){

    return true;
 } else {
    return false;
 }


}// checkIsAdminRegistrationEmpty

private function checkIsEmailValid($email){
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}// checkIsEmailValid

private function checkIsEmailExistsInDatabase($email){

    $sql = 'select email from admins where email = ? limit 1';
    $query = $this -> connect() -> prepare($sql);
    $query -> execute([ $email]);
    $result = $query -> fetch();
    if( !$result ){
        return true;
    }else {
        return false;
    }

}// checkIsEmailExistsInDatabase

private function checkIsEmailsSame( $email , $repeat_email){
    if( $email == $repeat_email ){
        return true;
    } else {
        return false;
    }

}// checkIsEmailsSame
private function checkIsPasswordsSame( $password , $repeat_password){

    if( $password == $repeat_password ){
        return true;
    } else {
        return false;
    }
}// checkIsPasswordsSame

public function adminRegistration( $first_name , $last_name , $email , $repeat_email , $password , 
$repeat_password , $image_url){

    if( $this -> checkIsAdminRegistrationEmpty($first_name , $last_name , $email , $repeat_email , $password , 
    $repeat_password , $image_url )){

if( $this -> checkIsEmailExistsInDatabase($email)){
if( $this -> checkIsEmailsSame($email , $repeat_email)){
if( $this -> checkIsPasswordsSame($password , $repeat_password )){

    $created_at = date('Y-m-d H:i:s');
    $updated_at = date('Y-m-d H:i:s');
    $slug = $this -> convertTitleToURL($email);
    $is_active = 0;
    $token = bin2hex(random_bytes(50));

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = 'insert into admins ( first_name , last_name , email , password 
    , slug , image_url , created_at , updated_at  , is_active , token) values (? , ? , ? , ? 
    , ? , ? , ?, ? , ?  , ?)';
    $query = $this->connect()->prepare($sql);
    $query->execute([$first_name, $last_name, $email, $hashed_password, $slug, 
    $image_url, $created_at, $updated_at, $is_active , $token ]);
   
    echo '<div class="alert alert-success" role="alert">
   Your account is created. Please check email to verify.
   </div>';



      
   $mail = new PHPMailer(true);
        
   try {
    
   
   
    $activation_link = "http://localhost/real-estate/administration/admin-activate.php?token=" . $token;

    $message = '
    Plese , click on link below to activate your account.
    <br><br><a href="' . $activation_link . '">Activate your account</a>';
    
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
       $mail->setFrom(  ADMIN_EMAIL  , ADMIN_NAME );
       $mail->addAddress($email , $first_name . ' ' . $last_name );     //Add a recipient
      
   
      
       //Content
       $mail->isHTML(true);                                  //Set email format to HTML
       $mail->Subject = 'Account activation';
       $mail->Body    = $message;
       $mail->AltBody = $message;
   
       $mail->send();
      
       
       
   } catch (Exception $e) {
      
       echo 'Message could not be sent';
       
       
   }









} else {
    echo '<div class="alert alert-danger" role="alert">
   Your passwords are not same
  </div>';
}// checkIsPasswordsSame

} else {

    echo '<div class="alert alert-danger" role="alert">
   Your emails are not same
  </div>';
}
} else {
    echo '<div class="alert alert-danger" role="alert">
    Email is already taken.
  </div>';
}// checkIsEmailExistsInDatabase
 
    } else {
       
        echo '<div class="alert alert-danger" role="alert">
  Please , fill all fields in form.
</div>';
       
    }
    






}// adminRegistration


public function activateAdminAccount($token){

    $is_active = 1 ;
    $sql = 'update admins set is_active = ? where token = ? limit 1';
    $query = $this -> connect() -> prepare($sql);
    $query -> execute([ $is_active , $token ]);
   


}// activateAdminAccount

private function checkIsAdminLoginFormEmpty($email , $password ){
    if( !empty($email) && !empty($password)){

        return true;

    }else {
        return false;
    }


}
public function adminlogin(  $email , $password ){
if( $this -> checkIsAdminLoginFormEmpty($email , $password )){


    $sql = 'select * from admins where email = ? limit 1';
    $query = $this->connect()->prepare($sql);
    $query->execute([$email]);
    $result = $query->fetch();

    if ($result) {
        if (password_verify($password, $result['password'])) {
            if ($result['is_active'] == 1) {
                $_SESSION['admin_id'] = $result['id'];
                $_SESSION['logged_as_admin'] = 1 ;
                header('Location: dashboard.php');
                exit();
            } else {
                echo '<div class="alert alert-danger" role="alert">
                Your account is not activated. Please check your email.
                </div>';
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">
            Invalid password.
            </div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">
        No account found with this email.
        </div>';
    }


}else {
    echo '<div class="alert alert-danger" role="alert">
    Please , fill all fields in form.
  </div>';
          
}// checkIsLoginFormEmpty


}// adminLogin









}// Admin




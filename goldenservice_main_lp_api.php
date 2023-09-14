<?php
header('Access-Control-Allow-Origin: *');

header("Content-Type:application/json");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$hostname = "localhost";
$user     = "td_lds_usr22";
$password = "Tdlds_usr22";
$database = "td_lds22";
$tbl_name = "goldenservice_main_lp_leads";
$bd = mysqli_connect($hostname, $user, $password, $database) or die("Could not connect database");

date_default_timezone_set('Asia/Kolkata');
//require "database.php";'

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    if (count($_POST) > 0) {
        
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address= $_POST['address'];
        $form_name= $_POST['form_name'];
        $subject= $_POST['subject'];
        $cmp_src= $_POST['cmp_src'];

        $city="kolkata";
       
        $brnd_name="Golden Service Center";
        
        $dos = date("Y-m-d H:i:s");

        $random = date("Y-m") . '-gsc-' . substr(md5(uniqid(rand(), true)), -20, 4);
        $rev_id = $random; 

      $store=mysqli_query($bd, "INSERT INTO {$tbl_name} SET ref_no='{$rev_id}', name='{$name}',email='{$email}',address='{$address}',city='{$city}',phone='{$phone}',service='{$subject}',form_name='{$form_name}',cmp_src='{$cmp_src}',ref_code='{$ref_code}',dos='{$dos}'");
       
        
    }
    
     if (!empty($name) && !empty($email) && !empty($phone)) {

         $mail = new PHPMailer(true);
         $mail->Mailer = 'smtp';
         $mail->SMTPDebug = 0;
         $mail->Host='smtp.gmail.com';
         $mail->Port='587';
         $mail->SMTPAuth=true;
         $mail->SMTPSecure='tls';
         
         $mail->Username='goldenservice927@gmail.com';
         $mail->Password='yperptdggumkfjrn';
        

         $mail->setFrom('goldenservice927@gmail.com', 'Golden SERVICE Website');
    
       
         $mail->addAddress($email);
        
         $mail->addAddress('contact@goldenservice.in');
         $mail->addReplyTo($_POST['email'],$_POST['name']);
    
         //$mail->addCC('sudipkumar.official@gmail.com');
         //$mail->addCC('contact@goldenservice.in');  

         //$mail->addBcc("imsandipmaji5@gmail.com");
         
        
        

         $mail->isHTML(true);
          $mail->Subject="Thanks for connecting {$brnd_name} - Ref No: {$rev_id} - {$subject}";
        
      $mail->Body="<p>Dear {$name}, <br><br>Thank you for choosing our online booking service. We appreciate your participation, and one of our dedicated executives will be contacting you shortly to assist you further.<br><br></p>
            
             <p>Kindly refer to the following details for your reference:</p>
             <p>Reference No: {$rev_id}<br>Name: {$name}<br>Email: {$email}<br>Contact: {$phone}<br>Address: {$address}<br>Request For: {$subject}<br>Date of Submission: {$dos}<br><br></p>
            
          
            
             <p>Regards, <br> Team {$brnd_name} <br></p>";


        
         if (!$mail->send()) {
            // $result="Something Went Wrong. Please Try Again";
            response(201, "Primary Fields empty! Send valid data.","", "");
           
         }
         else{
             response(200, "mail send successfully","$rev_id", "$dos");
             //header("Location: /thank-you");
         }
    
 }

    
    
    
    else {
        
        
        
        response(202, "Primary Fields empty! Send valid data.","", "");
        
        
    }

} else {
    response(203, "Please use POST valid method to call this API","", "");
    //echo "Please use POST valid method to call this API";
}




function response($response_code, $response_res, $response_id, $dos)
{
    header("HTTP/1.1 ", $response_code);
    $response['code'] = $response_code;
    $response['results'] = $response_res;
    $response['rev_id'] = $response_id;
    $response['dos'] = $dos;
    $json_response = json_encode($response);
    echo $json_response;
}

//response(201, "Primary Fields empty! Send valid data.","", "");

?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";

$mail->SMTPDebug  = 1;  
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.gmail.com";
$mail->Username   = "projectfinal142319@gmail.com";
$mail->Password   = "Project@2021";

$mail->IsHTML(true);
$mail->AddAddress("anjaligeorge231197@gmail.com", "smk");
$mail->SetFrom("projectfinal142319@gmail.com", "Admin-Agricultural Assist");
$mail->AddReplyTo("projectfinal142319@gmail.com", "Admin-Agricultural Assist");
//$mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");
$mail->Subject = "Hey, Your Account is Now Active";
$content = "<b>This is a Test Email sent via Gmail SMTP Server using PHP mailer class.</b>";

$mail->MsgHTML($content); 
if(!$mail->Send()) 
{
  echo "Error while sending Email.";
  var_dump($mail);
} else
 {
  echo "Email sent successfully";
}

?>
<?php
  $mail = $_POST['mail'];
  $phn = $_POST['phn'];
  $dress = $_POST['dress'];
  $mat = $_POST['mat'];
  $price = $_POST['price'];
  $mtr = $_POST['mtr'];
  $tot = $_POST['tot'];
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;
   require 'PHPMailer/src/Exception.php';
   require 'PHPMailer/src/PHPMailer.php';
   require 'PHPMailer/src/SMTP.php';
   $mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->Mailer = "smtp";
	$mail->SMTPDebug  = 0;  
	$mail->SMTPAuth   = TRUE;
	$mail->SMTPSecure = "tls";
	$mail->Port       = 587;
	$mail->Host       = "smtp.gmail.com";
	$mail->Username   = "etailorsite@gmail.com";
	$mail->Password   = "etailor@123";

	$mail->IsHTML(true);
	$mail->AddAddress($mail, "smk");
	$mail->SetFrom("etailorsite@gmail.com", "eTailor");
	$mail->AddReplyTo("etailorsite@gmail.com", "eTailor");
	$mail->Subject = "You have been accepted to the system.";
    $content = "<b>Email.</b>".$mail;
    $mail->MsgHTML($content);
    if(!$mail->Send())
                    {
                      echo "Error while sending Email.";
                      //var_dump($mail);
                    }
                    else
                    {
                      echo "Email sent successfully";
                    }

?>
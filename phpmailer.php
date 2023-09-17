<?php
   require 'vendor/autoload.php';
   use PHPMailer\PHPMailer\PHPMailer;
   $mail = new PHPMailer;
   $mail->isSMTP();
   $mail->SMTPDebug = 2;
   $mail->Host = 'smtp.hostinger.com';
   $mail->Port = 587;
   $mail->SMTPAuth = true;
   $mail->Username = 'premsharma@bhawaniemporiumhandicrafts.com';
   $mail->Password = 'Prem@1014219';
   $mail->setFrom('premsharma@bhawaniemporiumhandicrafts.com', 'Prem Sharma');
   $mail->addReplyTo('premsharma@bhawaniemporiumhandicrafts.com', 'Prem Sharma');
   $mail->addAddress('premsharma0699@gmail.com', 'Sharma');
   $mail->Subject = 'Checking if PHPMailer works';
   $mail->msgHTML(file_get_contents('message.html'), __DIR__);
   $mail->Body = 'This is just a plain text message body';
   //$mail->addAttachment('attachment.txt');
   if (!$mail->send()) {
       echo 'Mailer Error: ' . $mail->ErrorInfo;
   } else {
       echo 'The email message was sent.';
   }
?>
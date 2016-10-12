<?php
include('../vendor/phpmailer/phpmailer/PHPMailerAutoload.php');

$message_body = 'hey mane';
// $message_body = file_get_contents('contents.html')

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Set who the message is to be sent from
$mail->setFrom('alex@mayodot.com', 'First Last');
//Set an alternative reply-to address
// $mail->addReplyTo('replyto@example.com', 'First Last');
//Set who the message is to be sent to
$mail->addAddress($_POST['user_email'], 'Yung Mayo');
//Set the subject line
$mail->Subject = $_POST['message_title'];
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML($_POST['message_body'], dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
// $mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent to ".$_POST['user_email']."!";
}
